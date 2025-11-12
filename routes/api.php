<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\PodcastController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('reset',[AuthController::class,'reset']);

Route::post('logout',[AuthController::class,'logout']);

Route::apiResource('users', UserController::class)->middleware(['auth:sanctum', 'role:admin']);
Route::apiResource('podcasts.episodes', EpisodeController::class)->middleware(['auth:sanctum', 'role:admin']);
Route::apiResource('podcasts', PodcastController::class);
