<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use APP\Http\Controllers\Auth\LoginController;

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

// 会員登録
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// ログイン / ログアウト
Route::prefix('auth')->group(function () {
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
