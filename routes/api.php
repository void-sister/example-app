<?php

use App\Http\Controllers\api\v1\{
    PlantController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/v1/plant/list', [PlantController::class, 'getListForClient']);
Route::post('/v1/plant/getBySlug', [PlantController::class, 'getOne']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
