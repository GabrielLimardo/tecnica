<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\web\CockTailController;
// use App\Http\Controllers\web\PersonaListController;
use App\Http\Controllers\web\UserController;
use  App\Http\Controllers\ProductController;
use App\Http\Controllers\PersonaListController;


use App\Http\Livewire\Clientes;

Route::get('/', function () {
    return view('auth.login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/cocktail', function () {

       
 
// });



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('logout', [AuthController::class,'logout']);
    Route::resource('user', UserController::class);
    Route::resource('product',ProductController::class);
    Route::resource('list',PersonaListController::class);
    Route::get('list/add/{id}', [PersonaListController::class,'add'])->name('add');
    Route::post('product/filter', [ProductController::class,'filter'])->name('filterProduct');
});

