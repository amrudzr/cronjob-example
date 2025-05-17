<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::view('/register', 'register')->name('register');
    Route::post('/register', 'register')->name('register');
    Route::view('/login', 'login')->name('login');
    Route::post('/login', 'login')->name('login');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/subscribe', [\App\Http\Controllers\SubscriptionController::class, 'subscribe']);
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

