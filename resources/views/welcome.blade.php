@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Welcome to GitHub Profile Viewer
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    View your GitHub repositories in a clean, organized interface
                </p>
            </div>
            <div class="mt-8 space-y-6">
                <div>
                    <a href="{{ route('github.redirect') }}"
                       class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Login with GitHub
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
