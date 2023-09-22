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

Route::prefix('v1')->group(function () {
    Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login']);
    Route::post('token', [App\Http\Controllers\API\AuthController::class, 'token']);
});

Route::middleware('auth:sanctum')
    ->post('v1/event/create', [App\Http\Controllers\API\EventController::class, 'create']);
Route::middleware('auth:sanctum')
    ->get('v1/event/list', [App\Http\Controllers\API\EventController::class, 'list']);
Route::middleware('auth:sanctum')
    ->post('v1/event/subscribe', [App\Http\Controllers\API\EventController::class, 'subscribe']);
Route::middleware('auth:sanctum')
    ->post('v1/event/unsubscribe', [App\Http\Controllers\API\EventController::class, 'unsubscribe']);
Route::middleware('auth:sanctum')
    ->post('v1/event/delete', [App\Http\Controllers\API\EventController::class, 'delete']);


Route::middleware('auth:sanctum')->get('v1/user', function (Request $request) {
    return $request->user();
});
