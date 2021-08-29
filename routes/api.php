<?php

use App\Http\Controllers\Api\CabangController;
use App\Http\Controllers\Api\DompetController;
use App\Http\Controllers\Api\historyValidasiController;
use App\Http\Controllers\Api\PenebakController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SaveDataController;
use App\Http\Controllers\Api\ValidasiController;
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
Route::get('cabang_profile/{id}', [CabangController::class, 'getCabangProfile']);

Route::post('save_cabang_profile/', [SaveDataController::class, 'saveCabangProfile']);
Route::post('delete_penebak/', [SaveDataController::class, 'deletePenebak']);

Route::post('save_penebak/', [SaveDataController::class, 'savePenebak']);
Route::post('add_penebak/', [SaveDataController::class, 'addPenebak']);
Route::post('save_history/', [SaveDataController::class, 'saveHistory']);
Route::post('edit_history/', [SaveDataController::class, 'editHistory']);
Route::post('delete_history/', [SaveDataController::class, 'deleteHistory']);

Route::post('save_ssdompet/', [SaveDataController::class, 'saveSSDompet']);

Route::get('dompet', [DompetController::class, 'getDompet']);
Route::post('add_dompet/', [SaveDataController::class, 'addDompet']);
Route::post('edit_dompet/', [SaveDataController::class, 'editDompet']);
Route::post('delete_dompet/', [SaveDataController::class, 'deleteDompet']);

Route::get('validasi', [ValidasiController::class, 'getValidasi']);
Route::post('add_validasi/', [SaveDataController::class, 'addValidasi']);
Route::post('edit_validasi/', [SaveDataController::class, 'editValidasi']);
Route::post('delete_validasi/', [SaveDataController::class, 'deleteValidasi']);

Route::get('history/{id}', [historyValidasiController::class, 'getHistory']);

Route::post('sync/{id}', [SaveDataController::class, 'syncData']);
Route::post('edit_status_bayar/', [SaveDataController::class, 'editStatusPembayaran']);
