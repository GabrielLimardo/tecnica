<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\web\CockTailController;
use App\Http\Controllers\web\PersonaListController;
use App\Http\Controllers\web\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/cocktail', function () {

        Route::get('logout', [AuthController::class,'logout']);
        Route::resource('user', UserController::class);
        Route::resource('cocktail',CockTailController::class);
        Route::resource('list',PersonaListController::class);
        Route::post('cocktail/filter/{type}', [CockTailController::class,'filter']);
 
});


