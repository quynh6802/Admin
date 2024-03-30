<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\WidgetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('login', [AuthController::class, 'getLogin']);
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/add', [ProductController::class, 'add']);
        Route::get('/edit', [ProductController::class, 'edit']);
    });
    Route::get('/category-product', [ProductController::class, 'category']);
    Route::get('/category-product/add', [ProductController::class, 'addCategory']);
    Route::get('/category-product/edit', [ProductController::class, 'editCategory']);
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/', [BannerController::class, 'index']);
        Route::get('/add', [BannerController::class, 'add']);
        Route::get('/edit', [BannerController::class, 'edit']);
    });
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', [PostController::class, 'index']);
        Route::get('/add', [PostController::class, 'add']);
        Route::get('/edit', [PostController::class, 'edit']);
    });
    Route::group(['prefix' => 'widget'], function () {
        Route::get('/', [WidgetController::class, 'index']);
        Route::get('/add', [WidgetController::class, 'add']);
        Route::get('/edit', [WidgetController::class, 'edit']);
    });
});
