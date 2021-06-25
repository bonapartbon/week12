<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\AuthController;

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

// public
Route::post('/register', [AuthController::class, 'register']);
Route::get('/todo', [ToDoController::class, 'index']);

// private
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/todo', [ToDoController::class, 'store']);
    Route::put('/todo/{id}', [ToDoController::class, 'update']);
    Route::delete('/todo/{id}', [ToDoController::class, 'destory']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
