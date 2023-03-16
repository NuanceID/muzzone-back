<?php

declare(strict_types=1);

use App\Http\Controllers\Manager\Album\AlbumController;
use App\Http\Controllers\Manager\Artist\ArtistController;
use App\Http\Controllers\Manager\Category\CategoryController;
use App\Http\Controllers\Manager\Dashboard\DashboardController;
use App\Http\Controllers\Manager\Dictionary\DictionaryController;
use App\Http\Controllers\Manager\Genre\GenreController;
use App\Http\Controllers\Manager\Playlist\PlayListController;
use App\Http\Controllers\Manager\Track\TrackController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [DashboardController::class, 'main'])->middleware('auth');

Route::middleware('auth')->prefix('manager')->name('manager.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'main'])->name('dashboard');
    Route::resource('albums', AlbumController::class);
    Route::resource('artists', ArtistController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('playlists', PlayListController::class);
    Route::resource('tracks', TrackController::class);

    Route::get('dictionary/{dictionary}/{search?}', [DictionaryController::class, 'search'])
        ->name('dictionary.search');
});
