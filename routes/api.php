<?php

use App\Http\Controllers\OrderController;
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

Route::get('/orders', [OrderController::class, 'getOrders']);
Route::get('/orders/find', [OrderController::class, 'getOrder']);
Route::get('/orders/created', [OrderController::class, 'getOrdersCreated']);
Route::get('/orders/pending', [OrderController::class, 'getOrdersPending']);
Route::get('/orders/delivered', [OrderController::class, 'getOrdersDelivered']);
Route::patch('/orders/update/state', [OrderController::class, 'updateState']);
