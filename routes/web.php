<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->prefix('manager')->name('manager.')->group(function () {
    Route::get('/', function () {
        return view('manager.index');
    });

    Route::name('tracks.')->prefix('tracks')->group(function () {
        Route::get('list', );
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
