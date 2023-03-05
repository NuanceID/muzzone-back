<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->name('manager.')->group(function () {
    Route::get('/', function () {
        return view('manager.index');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
