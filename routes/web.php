<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\web\CockTailController;
use App\Http\Controllers\web\PersonaListController;
use App\Http\Controllers\web\UserController;
use  App\Http\Controllers\ProductController;

use App\Http\Livewire\Clientes;

Route::get('/', function () {
    return view('auth.login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/cocktail', function () {

       
 
// });



Route::middleware([
    'auth:api',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('logout', [AuthController::class,'logout']);
    Route::resource('user', UserController::class);
    Route::resource('product',ProductController::class);
    Route::resource('list',PersonaListController::class);
    Route::post('product/filter', [ProductController::class,'filter'])->name('filterProduct');


});

