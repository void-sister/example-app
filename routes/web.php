<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
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
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/plants', [PlantController::class, 'index'])->name('plants.index');
Route::get('/plants/create', [PlantController::class, 'create']);
Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
Route::get('/plants/{slug}', [PlantController::class, 'show']);
Route::get('/plants/{slug}/edit', [PlantController::class, 'edit']);
Route::put('/plants/{slug}', [PlantController::class, 'update'])->name('plants.update');
Route::post('/plants/{slug}/archive', [PlantController::class, 'archive'])->name('plants.archive');
Route::post('/plants/{slug}/return', [PlantController::class, 'return'])->name('plants.return');
Route::post('/plants/{slug}/add-to-cart', [PlantController::class, 'addToCart'])->name('plants.add-to-cart');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
