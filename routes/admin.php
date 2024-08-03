<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController, AdminController};

// Auth Routes
Route::match(['GET', 'POST'], '/login', [AuthController::class, 'loginForm'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
    Route::get('user-list', [AdminController::class, 'userList'])->name('user.list');
    Route::match(['GET', 'POST'], 'profile/{id}', [AdminController::class, 'profileForm'])->name('profile');
    Route::get('sign-out', [AuthController::class, 'signOut'])->name('logout');
    Route::get('delete-user/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
});