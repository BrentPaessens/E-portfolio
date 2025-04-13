<?php

use App\Http\Middleware\ActiveUser;

use Illuminate\Support\Facades\Route;

// Users
Route::view('/', 'home')->name('home');
Route::view('about','about')->name('about');
Route::view('project', 'project')->name('projects');

// checking if the user is authenticated, verified and active
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ActiveUser::class,
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
