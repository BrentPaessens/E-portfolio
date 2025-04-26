<?php

use App\Http\Middleware\ActiveUser;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Routes
Route::view('/', 'home')->name('home');
Route::view('about','about')->name('about');
Route::view('project', 'projects')->name('projects');


Route::get('/symlink', function () {
    Artisan::call('storage:link');
});



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
