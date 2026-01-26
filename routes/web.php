<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CinemaController;

Route::get('/', 'CinemaController@index')->name('cinema');

Route::get('show/{movie}', 'CinemaController@show')->name('show');

Route::middleware('auth')->group(function () {
    Route::resource('genres', GenreController::class);

    Route::resource('movies', MovieController::class);

    Route::resource('promotions', PromotionController::class);
});

require __DIR__ . '/auth.php';
