<?php

use App\Http\Controllers\CategoryController;
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
Route::get('/categories/{slug}', [CategoryController::class, 'show']);
Route::get('/categories/{slug}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{slug}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/{slug}/archive', [CategoryController::class, 'archive'])->name('categories.archive');
Route::post('/categories/{slug}/return', [CategoryController::class, 'return'])->name('categories.return');
