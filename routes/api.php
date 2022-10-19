<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\api\CockTailController;
use App\Http\Controllers\api\PersonaListController;
use App\Http\Controllers\api\UserController;



Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login',  [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
   

    Route::group([
      'middleware' => 'auth:api'
    ], function() {

        Route::get('logout', [AuthController::class,'logout']);
        Route::resource('apiuser', UserController::class);
        Route::resource('apicocktail',CockTailController::class);
        Route::resource('apilist',PersonaListController::class);
        Route::post('apicocktail/filter/{type}', [CockTailController::class,'filter']);
 
    });
});