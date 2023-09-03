<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware(\App\Http\Middleware\AccountTokenIsValid::class)->group(function () {
    Route::get('/orders', [\App\Http\Controllers\Api\V1\OrderController::class, 'index']);
    Route::get('/sales', [\App\Http\Controllers\Api\V1\SaleController::class, 'index']);
    Route::get('/incomes', [\App\Http\Controllers\Api\V1\IncomeController::class, 'index']);
    Route::get('/stocks', [\App\Http\Controllers\Api\V1\StockController::class, 'index']);
});
