<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\WidgetController;
use App\Http\Controllers\TestController;
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
    Route::get('test', [TestController::class, 'index']);
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('login', [AuthController::class, 'getLogin']);
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::match(['GET', 'POST'], '/add', [ProductController::class, 'add']);
        Route::match(['GET', 'POST'], '/edit/{id}', [ProductController::class, 'edit']);
        Route::get('delete/{id}', [ProductController::class, 'delete']);
    });
    Route::group(['prefix' => 'category-product'], function () {
        Route::get('/', [CategoryProductController::class, 'index']);
        Route::match(['GET', 'POST'], '/add', [CategoryProductController::class, 'add']);
        Route::match(['GET', 'POST'], '/edit/{id}', [CategoryProductController::class, 'edit']);
        Route::get('delete/{id}', [CategoryProductController::class, 'delete']);
    });
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/', [BannerController::class, 'index']);
        Route::match(['GET', 'POST'], '/add', [BannerController::class, 'add']);
        Route::match(['GET', 'POST'], '/edit/{id}', [BannerController::class, 'edit']);
        Route::get('delete/{id}', [BannerController::class, 'delete']);
    });
    Route::group(['prefix' => 'category-post'], function () {
        Route::get('/', [CategoryPostController::class, 'index']);
        Route::match(['GET', 'POST'], '/add', [CategoryPostController::class, 'add']);
        Route::match(['GET', 'POST'], '/edit/{id}', [CategoryPostController::class, 'edit']);
        Route::get('delete/{id}', [CategoryPostController::class, 'delete']);
    });
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', [PostController::class, 'index']);
        Route::match(['GET', 'POST'], '/add', [PostController::class, 'add']);
        Route::match(['GET', 'POST'], '/edit/{id}', [PostController::class, 'edit']);
        Route::get('delete/{id}', [PostController::class, 'delete']);
    });
    Route::group(['prefix' => 'widget'], function () {
        Route::get('/', [WidgetController::class, 'index']);
        Route::match(['GET', 'POST'], '/add', [WidgetController::class, 'add']);
        Route::match(['GET', 'POST'], '/edit/{id}', [WidgetController::class, 'edit']);
        Route::get('delete/{id}', [WidgetController::class, 'delete']);
    });
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', [MenuController::class, 'index']);
        Route::match(['GET', 'POST'], '/add', [MenuController::class, 'add']);
        Route::match(['GET', 'POST'], '/edit/{id}', [MenuController::class, 'edit']);
        Route::get('delete/{id}', [MenuController::class, 'delete']);
    });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index']);
        Route::match(['GET', 'POST'], '/add', [ContactController::class, 'add']);
        Route::match(['GET', 'POST'], '/edit/{id}', [ContactController::class, 'edit']);
        Route::get('delete/{id}', [ContactController::class, 'delete']);
    });
    //Tool
    Route::post('/ajax-upload-file', [DashboardController::class, 'ajax_upload_file']);
});
