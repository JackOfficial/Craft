<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductsController as Products;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home'])->name("home");
Route::get('/product/{id}', [ProductDetailsController::class, 'details']);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware("auth");
Route::resource('products', Products::class);

//Google oauth
Route::get('redirect', [SocialController::class, 'redirect'])->name('redirect');
Route::get('callback', [SocialController::class, 'callback'])->name('callback');

//ADMIN ROUTES
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name("index");
    Route::resource('product-categories', ProductCategoriesController::class);
    Route::resource('products', ProductsController::class);
}); 