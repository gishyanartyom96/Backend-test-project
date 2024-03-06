<?php

use App\Http\Controllers\Task\TaskCreateController;
use App\Http\Controllers\Task\TaskDeleteController;
use App\Http\Controllers\Task\TaskIndexController;
use App\Http\Controllers\Task\TaskUpdateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/task')->group(function () {
    Route::get('/', TaskIndexController::class);
    Route::post('/', TaskCreateController::class);
    Route::put('/{id}', TaskUpdateController::class);
    Route::delete('/{id}', TaskDeleteController::class);
});
