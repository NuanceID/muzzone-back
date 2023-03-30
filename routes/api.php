<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Album\AlbumController;
use App\Http\Controllers\Api\V1\Artist\ArtistController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Category\CategoryController;
use App\Http\Controllers\Api\V1\Genre\GenreController;
use App\Http\Controllers\Api\V1\Playlist\PlaylistController;
use App\Http\Controllers\Api\V1\Track\TrackController;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'login']);
Route::post('sms-check', [LoginController::class, 'checkAuthCode']);

Route::name('api')->middleware(['auth:sanctum'])->group(static function () {
    Route::apiResource('albums', AlbumController::class)->only(['index', 'show']);
    Route::apiResource('artists', ArtistController::class)->only(['index', 'show']);
    Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);
    Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
    Route::apiResource('playlists', PlaylistController::class)->only(['index', 'show']);
    Route::apiResource('tracks', TrackController::class)->only(['index', 'show']);
});
