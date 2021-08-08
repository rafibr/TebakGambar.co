<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
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

Route::get('/', [LandingController::class, 'index']);
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);



Route::group(['middleware' => 'auth'], function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('home', [DashboardController::class, 'homeView']);
    Route::get('cabang', [DashboardController::class, 'userView']);
    Route::get('profile', [DashboardController::class, 'profileView']);

});
