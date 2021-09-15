<?php

use App\Http\Controllers\AuthController;
//use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlantController;
//use App\Http\Controllers\ShopController;
//use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'role:admin'], function() {
    Route::resource('users', UserController::class)->except(['show']);
    Route::post('/users/{user}/soft-delete', [UserController::class, 'softDelete'])->name('users.soft-delete');
    Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');

    Route::resource('plants', PlantController::class);
    Route::post('/plants/{plant}/archive', [PlantController::class, 'archive'])->name('plants.archive');
    Route::post('/plants/{plant}/return', [PlantController::class, 'return'])->name('plants.return');
});


//Route::post('/plants/{slug}/add-to-cart', [PlantController::class, 'addToCart'])->name('plants.add-to-cart');

//Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

//Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
//Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
