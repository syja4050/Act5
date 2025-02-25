<?php

use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', [SocialiteController::class, 'ShowLogInForm'])->name('loginForm');
Route::post('/login', [SocialiteController::class, 'login'])->name('login');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [SocialiteController::class, 'logout'])->name('logout');
});


Route::get('/register', [RegisterController::class, 'ShowRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'Register']);

Route::controller(SocialiteController::class)->group(function(){
    Route::get('/auth/{provider}', 'ridirectToProvider')->name('auth.redirect');
    Route::get('/auth/{provider}/callback', 'providerAuth')->name('auth.provider');
});
