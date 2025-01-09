<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\StatusLotController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/signin', [AuthController::class, 'viewSignin']);
    Route::post('/signin', [AuthController::class, 'signin']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DailyController::class, 'index']);

    Route::resource('user', UserController::class);
    Route::resource('lot', LotController::class);
    Route::resource('daily', DailyController::class);

    Route::get('/status/{status}/{status_lot}', [StatusLotController::class, 'update']);

    Route::get('/setting/{user}', [UserController::class, 'setting']);
    Route::put('/setting/{user}', [UserController::class, 'updateSetting']);

    Route::get('/signout', [AuthController::class, 'signout']);
});

