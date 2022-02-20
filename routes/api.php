<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('users',[App\Http\Controllers\UserController::class,'store']);
Route::prefix('auth')->group(function(){    
    Route::post('login',[App\Http\Controllers\Auth\Api\LoginController::class,'login']);
    Route::post('logout',[App\Http\Controllers\Auth\Api\LoginController::class,'logout'])->middleware(['auth:sanctum']);  
});


Route::resource('roupas',App\Http\Controllers\RoupaController::class)->middleware(['auth:sanctum']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {         
    return $request->user();
});
//Route::resource('garrafas',App\Http\Controllers\GarrafaController::class)->middleware(['auth:sanctum']);


 
 