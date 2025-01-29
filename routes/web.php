<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{ProductController, CategoryController, AdminController, BrandController, CouponController, BannerController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('admin.pages.about');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        // Route::get('dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');
        // Route::get('dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');
    });

    Route::group(['prefix' => 'brand', 'as' => 'brands.'], function () {
        Route::get('/', [BrandController::class, 'brandList'])->name('list');
        Route::match(['get', 'post'], '/add', [BrandController::class, 'addBrand'])->name('add');

    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'list'])->name('list');

    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'list'])->name('list');
        
    });

    Route::group(['prefix' => 'coupon', 'as' => 'coupon.'], function () {
        Route::get('/', [CouponController::class, 'list'])->name('list');

    });

    Route::group(['prefix' => 'banner', 'as' => 'banner.'], function () {
        Route::get('/', [BannerController::class, 'list'])->name('list');

        Route::group(['prefix' => 'label', 'as' => 'label.'], function () {
            Route::get('/', [AdminController::class, 'list'])->name('list');
            
        });
    });
});
