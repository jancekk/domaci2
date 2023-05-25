<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\API\AuthController;

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

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/buyers', [BuyerController::class, 'index']);
Route::get('/items', [ItemController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);

Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/profile', function(Request $request){
        return auth()->user();
    });
    Route::resource('item', ItemController::class)->only('update', 'store', 'destroy');

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('item', ItemController::class)->only(['index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
