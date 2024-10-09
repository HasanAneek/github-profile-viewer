<?php

use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\Auth\RepositoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('auth/github', [GitHubController::class, 'redirect'])->name('github.redirect');
Route::get('auth/github/callback', [GitHubController::class, 'callback'])->name('github.callback');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [RepositoryController::class, 'index'])->name('dashboard');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});
