<?php

use App\Http\Controllers\API\barangAPIController;
use App\Http\Controllers\API\pengrajinAPIController;
use App\Http\Controllers\API\dasborAPIController;
use App\Http\Controllers\API\homeAPIController;
use App\Http\Controllers\API\keranjangAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('dasbor', dasborAPIController::class);
Route::resource('barang', barangAPIController::class);
Route::resource('home', homeAPIController::class);
Route::resource('peng', pengrajinAPIController::class);
Route::resource('keranjang', keranjangAPIController::class);
Route::post('/barang/{id}', [barangAPIController::class, 'update']);
Route::post('/peng/{id}', [pengrajinAPIController::class, 'update']);
