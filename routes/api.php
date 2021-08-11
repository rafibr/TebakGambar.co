<?php

use App\Http\Controllers\Api\CabangController;
use App\Http\Controllers\Api\PenebakController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SaveDataController;
use App\Models\Penebak;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'getUsers']);
Route::get('cabang/{id}', [UserController::class, 'getPenebakCabang']);
Route::get('penebak/{id}', [PenebakController::class, 'getPenebak']);

Route::get('penebak/{id}', [PenebakController::class, 'getPenebak']);
Route::get('penebakcount/{id}', [CabangController::class, 'getCountPenebak']);

Route::post('save_penebak/', [SaveDataController::class, 'savePenebak']);
Route::post('add_penebak/', [SaveDataController::class, 'addPenebak']);

Route::post('save_ssdompet/', [SaveDataController::class, 'saveSSDompet']);
