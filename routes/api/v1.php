<?php

use App\Http\Controllers\Api\V1\MovieController;
use Illuminate\Support\Facades\Route;

Route::controller(MovieController::class)->prefix('movies')->as('movies.')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});
