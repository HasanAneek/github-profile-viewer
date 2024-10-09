@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Profile Section -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <div class="flex items-center">
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full">
                <div class="ml-4">
                    <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->bio }}</p>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <form action="{{ route('dashboard') }}" method="GET" class="flex gap-4">
                <input type="text"
                       name="search"
                       placeholder="Search repositories..."
                       class="flex-1 p-2 border rounded"
                       value="{{ $search }}">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Search
                </button>
                @if($search)
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Repositories List -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-4">Public Repositories</h3>

            @if($repositories->isEmpty())
                <div class="text-center py-4">
                    <p class="text-gray-600">No repositories found.</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($repositories as $repo)
                        <div class="border rounded p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="text-lg font-semibold">
                                        <a href="{{ $repo['html_url'] }}" target="_blank"
                                           class="text-blue-500 hover:underline">
                                            {{ $repo['name'] }}
                                        </a>
                                    </h4>
                                    <p class="text-gray-600">{{ $repo['description'] }}</p>
                                </div>
                                <a href="{{ $repo['html_url'] }}" target="_blank"
                                   class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded text-sm">
                                    View on GitHub
                                </a>
                            </div>
                            <div class="mt-2 flex gap-4 text-sm text-gray-500">
                                <span>⭐ {{ $repo['stargazers_count'] }} stars</span>
                                <span>🍴 {{ $repo['forks_count'] }} forks</span>
                                @if($repo['language'])
                                    <span>📝 {{ $repo['language'] }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $repositories->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
