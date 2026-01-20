<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return view('cinema');
})->name('cinema');

Route::middleware('auth')->group(function () {
    Route::resource('genres', GenreController::class);

    Route::get('movies', 'MovieController@moviesCrud')->name('movies');
});

require __DIR__ . '/auth.php';
