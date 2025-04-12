<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;

Auth::routes();
Route::middleware('guest')->group(function () {
    Route::redirect('/', '/login');
    Route::get('/login', Login::class)->name('login');
});
// If you have other authentication routes (e.g., register, forgot password), add them here.
// Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');
// Route::get('/forgot-password', \App\Livewire\Auth\ForgotPassword::class)->name('password.request');
