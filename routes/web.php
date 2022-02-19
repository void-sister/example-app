<?php

use App\Http\Controllers\admin\{AuthController,
    CustomerController,
    DashboardController,
    PermissionController,
    PlantController,
    ProductController,
    UserController};
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

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [AuthController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'role:admin'], function() {
    Route::post('/users/{user}/soft-delete', [UserController::class, 'softDelete'])->name('users.soft-delete');
    Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::get('/users/archive', [UserController::class, 'trashed'])->name('users.trashed');
    Route::resource('users', UserController::class)->except(['show']);

    Route::post('/plants/{plant}/archive', [PlantController::class, 'archive'])->name('plants.archive');
    Route::post('/plants/{plant}/return', [PlantController::class, 'return'])->name('plants.return');
    Route::resource('plants', PlantController::class)->except(['index', 'destroy']);

    Route::get('/products/plants', [ProductController::class, 'plants'])->name('plants.index');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
});
