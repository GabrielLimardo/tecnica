<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CockTailController;
use App\Http\Controllers\PersonaListController;
use App\Http\Controllers\UserController;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login',  [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
   

    Route::group([
      'middleware' => 'auth:api'
    ], function() {

        Route::get('logout', [AuthController::class,'logout']);
        Route::resource('user', UserController::class);
        Route::resource('cocktail',CockTailController::class);
        Route::resource('list',PersonaListController::class);
        Route::post('cocktail/filter/{type}', [CockTailController::class,'filter']);
 
    });
});