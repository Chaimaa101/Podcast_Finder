<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('reset', [AuthController::class, 'reset']);



Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('podcasts', [PodcastController::class, 'index']);
    Route::get('podcasts/{podcast}', [PodcastController::class, 'show']);
    Route::get('podcasts/{podcast}/episodes', [EpisodeController::class, 'index']);
    Route::get('episodes/{episode}', [EpisodeController::class, 'show']);

    Route::get('search/podcasts', [PodcastController::class, 'search']);
    Route::get('search/episodes', [EpisodeController::class, 'search']);
});



Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::apiResource('users', UserController::class);
   
    Route::apiResource('hosts', HostController::class);

});


Route::middleware(['auth:sanctum', 'role:admin,animateur'])->group(function () {

     Route::apiResource('podcasts', PodcastController::class)->only('store','update','delete');

    Route::apiResource('podcasts.episodes', EpisodeController::class)->only('store','update','delete');
    Route::put('episodes/{id}', [EpisodeController::class, 'update']);
    Route::delete('episodes/{id}', [EpisodeController::class, 'destroy']);
});
