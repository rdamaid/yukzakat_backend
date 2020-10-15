<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function(){
    
    Route::group(['prefix' => 'auth'], function () {
        
        Route::post('login', [AuthController::class, 'login']);
        Route::post('signup', [AuthController::class, 'signup']);
      
        Route::group(['middleware' => 'auth:api'], function() {
            Route::get('user', [AuthController::class, 'user']);
            Route::get('logout', [AuthController::class, 'logout']);
        });
    });

    Route::group(['middleware' => 'auth:api'], function() {
        
        Route::prefix('users')->group(function(){
            Route::get('/show', [UserController::class, 'index']);
            Route::get('/show/{id}', [UserController::class, 'show']);
            Route::post('/create', [UserController::class, 'store']);
            Route::put('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'destroy']);
        });

        Route::prefix('transactions')->group(function(){    
            Route::get('/show', [TransactionController::class, 'index']);
            Route::get('/show/{id}', [TransactionController::class, 'show']);
            Route::post('/create', [TransactionController::class, 'store']);
            Route::put('/update/{id}', [TransactionController::class, 'update']);
            Route::delete('/delete/{id}', [TransactionController::class, 'destroy']);
        });

    });

});