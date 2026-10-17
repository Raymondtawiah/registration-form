<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;

Route::inertia('/', 'welcome')->name('home');
Route::inertia('/login', 'auth/login')->name('login');
Route::inertia('/register', 'auth/register', [
    'passwordRules' => Password::defaults()->toPasswordRulesString(),
])->name('register');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
