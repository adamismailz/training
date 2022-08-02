<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\LoginController;

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
Route::middleware('auth:sanctum')->group(function () {
Route::get('/allmaklumat', [PostController::class, 'getAllPost'])->name('api.allMaklumat');
Route::post('/created', [PostController::class, 'created'])->name('api.created');
Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('api.delete');
Route::patch('/update/{id}', [PostController::class, 'update'])->name('api.update');
});
Route::middleware('auth:sanctum')->group(function () {

Route::get('/logout', [LoginController::class, 'logout']);
});

Route::post('/login', [LoginController::class, 'login']);
