<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class RepositoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $perPage = 10;
        $page = max(1, $request->get('page', 1));

        try {
            // First, fetch all repositories to allow for proper searching
            $allRepos = collect();
            $currentPage = 1;

            // Fetch all repositories (GitHub API has a limit of 100 per page)
            do {
                $response = Http::withToken(auth()->user()->github_token)
                    ->get("https://api.github.com/user/repos", [
                        'page' => $currentPage,
                        'per_page' => 100,
                        'sort' => 'updated',
                        'direction' => 'desc',
                    ]);

                if (!$response->successful()) {
                    throw new \Exception('Failed to fetch repositories');
                }

                $repos = collect($response->json());
                $allRepos = $allRepos->concat($repos);
                $currentPage++;

                // Check if there are more pages
                $linkHeader = $response->header('Link');
                $hasNextPage = str_contains($linkHeader ?? '', 'rel="next"');
            } while ($hasNextPage);

            // Apply search filter if search term exists
            if ($search) {
                $allRepos = $allRepos->filter(function ($repo) use ($search) {
                    return str_contains(strtolower($repo['name']), strtolower($search));
                });
            }

            // Create a Laravel paginator instance
            $currentPageItems = $allRepos->forPage($page, $perPage);

            $paginator = new LengthAwarePaginator(
                $currentPageItems,
                $allRepos->count(),
                $perPage,
                $page,
                [
                    'path' => $request->url(),
                    'query' => $request->query()
                ]
            );

            return view('dashboard', [
                'repositories' => $paginator,
                'user' => auth()->user(),
                'search' => $search
            ]);

        } catch (\Exception $e) {
            return back()->with('error', 'Unable to fetch repositories: ' . $e->getMessage());
        }
    }
}
