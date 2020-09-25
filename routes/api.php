<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Transaction;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function(){
    
    Route::post('register', [UserController::class, 'store']);
    
    Route::prefix('users')->group(function(){
        Route::get('/show', [UserController::class, 'index']);
        Route::get('/show/{id?}', [UserController::class, 'show']);
        Route::put('/update/{id?}', [UserController::class,'update']);
        Route::delete('/delete/{id?}', [UserController::class,'destroy']);
    });

    Route::prefix('transactions')->group(function(){
        Route::get('/show', [TransactionController::class, 'index']);
        Route::get('/show/{id?}', [TransactionController::class, 'show']);
        Route::post('/create', [TransactionController::class, 'store']);
        Route::put('/update/{id?}', [TransactionController::class, 'update']);
        Route::delete('/delete/{id?}', [TransactionController::class, 'destroy']);
    });
});