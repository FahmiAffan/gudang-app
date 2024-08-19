<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(
    function () {
        Route::resource('/users', UserController::class);
        Route::resource('/barang', BarangController::class);
        Route::resource('/mutasi', MutasiController::class);
        Route::get('/historyUser', [HistoryController::class, 'getHistoryByUser']);
        Route::get('/historyBarang', [HistoryController::class, 'getHistoryByBarang']);
        Route::post('/checkUser', [AuthController::class, 'checkUser']);
        Route::post('/logout', [AuthController::class, 'logout']);
    }
);

Route::post('/login', [AuthController::class, 'login']);
