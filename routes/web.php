<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('users', UserController::class);
Route::resource('groups', GroupController::class)->except(['show']);
Route::resource('brands', BrandController::class)->except(['show']);
Route::resource('stores', StoreController::class)->except(['show']);
Route::resource('categories', CategoryController::class)->except(['show']);
Route::resource('attributes', AttributeController::class)->except(['show']);
Route::resource('attributes.values', AttributeValueController::class)->except(['show']);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
