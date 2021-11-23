<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/book',[BookController::class, 'getAllBooks']);
Route::post('/book',[BookController::class, 'createBook']);
Route::get('/book/{id}',[BookController::class, 'getOneBook']);
Route::put('/book/{id}',[BookController::class, 'update']);
Route::delete('/book/{id}',[BookController::class, 'deleteBook']);

