<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{AuthController, UserController};

Route::match(['GET', 'POST'], '/login', [AuthController::class, 'loginForm'])->name('user.login');
Route::match(['GET', 'POST'], '/signup', [AuthController::class, 'signupForm'])->name('signup');
Route::match(['GET', 'POST'], '/sigforgetPassword', [AuthController::class, 'signupForm'])->name('forget.password.get');

Route::group(['middleware' => 'auth'], function () {
    Route::get('chat', [UserController::class, 'chat'])->name('chat');
});