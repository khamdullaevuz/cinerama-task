<?php

use App\Http\Controllers\Api\AuthController;
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

Route::get('/', function(){
    return response()->json([
        'message' => 'Cinerama API'
    ]);
});

Route::controller(AuthController::class)->prefix('auth')->as('auth.')->group(function(){
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout')->name('logout')->middleware('auth:sanctum');
});

Route::name('api.v1.')->prefix('v1')->group(__DIR__ . '/api/v1.php');
