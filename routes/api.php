<?php

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

Route::post('register', [\App\Http\Controllers\RegisterController::class, 'register']);
Route::post('login', [\App\Http\Controllers\RegisterController::class, 'login']);

Route::middleware('auth:api')->group( function () {
    Route::apiResource('posts', \App\Http\Controllers\PostController::class);
    Route::apiResource('comments', \App\Http\Controllers\CommentController::class);
    Route::get('activities', [\App\Http\Controllers\ActivitiesController::class, 'index']);
});

