<?php

use App\Http\Controllers\Api\ArtistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('movies', App\Http\Controllers\MovieController::class);

Route::prefix('api')->name('api.')->group(function () {
    Route::apiResource('artists', ArtistController::class);
});
