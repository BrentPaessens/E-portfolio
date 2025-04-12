<?php

use App\Http\Middleware\ActiveUser;
use App\Http\Middleware\Admin;
use App\Livewire\Admin\Events;
use App\Livewire\Admin\Genres;
use App\Livewire\Admin\Users;
use App\Livewire\Basket;
use App\Livewire\ShopSection;
use Illuminate\Support\Facades\Route;

// Users
Route::view('/', 'home')->name('home');
Route::get('shop', ShopSection::class)->name('shop');
Route::view('contact', 'contact')->name('contact');
Route::get('basket', Basket::class)->name('basket');

// Admin
Route::middleware(['auth', Admin::class, ActiveUser::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('genres', Genres::class)->name('genres');
    Route::get('events',  Events::class)->name('events');
    Route::get('users', Users::class)->name('users');
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
