<?php

use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');

Route::get('auth/google/callback', [SocialiteController::class, 'googleAuthentication'])->name('auth.google.callback');
