<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{slug}', [CategoryController::class, 'show']);
Route::get('/categories/{slug}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{slug}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/{slug}/archive', [CategoryController::class, 'archive'])->name('categories.archive');
Route::post('/categories/{slug}/return', [CategoryController::class, 'return'])->name('categories.return');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{slug}', [ProductController::class, 'show']);
Route::get('/products/{slug}/edit', [ProductController::class, 'edit']);
Route::put('/products/{slug}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{slug}/archive', [ProductController::class, 'archive'])->name('products.archive');
Route::post('/products/{slug}/return', [ProductController::class, 'return'])->name('products.return');
