<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
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

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'viewLogin']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn() => redirect('/daily'));
    Route::get('/daily', [IndexController::class, 'index']);

    Route::get('/users', [IndexController::class, 'user']);
    Route::get('/users/create', [IndexController::class, 'createUser']);
    Route::post('/users/create', [IndexController::class, 'insertUser']);
    Route::get('/user/edit/{user}', [IndexController::class, 'viewEditUser']);
    Route::post('/user/edit/{user}', [IndexController::class, 'editUser']);
    Route::get('/user/delete/{user}', [IndexController::class, 'deleteUser']);

    Route::get('/daily', [IndexController::class, 'daily']);
    Route::get('/daily/create', [IndexController::class, 'createDaily']);
    Route::post('/daily/create', [IndexController::class, 'insertDaily']);
    Route::get('/daily/delete/{daily}', [IndexController::class, 'deleteDaily']);

    Route::get('/lot', [IndexController::class, 'lot']);
    Route::get('/lot/create', [IndexController::class, 'createLot']);
    Route::post('/lot/create', [IndexController::class, 'insertLot']);
    Route::get('/lot/edit/{lot}', [IndexController::class, 'viewEditLot']);
    Route::post('/lot/edit/{lot}', [IndexController::class, 'editLot']);
    Route::get('/lot/delete/{lot}', [IndexController::class, 'deleteLot']);

    Route::get("/daily/status/notavailable/{status_lot}", [IndexController::class, "notAvailableStatus"]);
    Route::get("/daily/status/pending/{status_lot}", [IndexController::class, "pendingStatus"]);
    Route::get("/daily/status/sent/{status_lot}", [IndexController::class, "sentStatus"]);


    Route::put('/update/name/{user}', [IndexController::class, 'updateName']);
});
