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

 


 
 Route::get('roles',[App\Http\Controllers\RoleController::class,'index'])->middleware('auth:sanctum');
 Route::get('roles/{id}',[App\Http\Controllers\RoleController::class,'show'])->middleware('auth:sanctum');
 Route::post('roles',[App\Http\Controllers\RoleController::class,'store'])->middleware('auth:sanctum');
 Route::put('roles/{id}',[App\Http\Controllers\RoleController::class,'update'])->middleware('auth:sanctum');
 Route::delete('roles/{id}',[App\Http\Controllers\RoleController::class,'delete'])->middleware('auth:sanctum');
 
 Route::get('permissions',[App\Http\Controllers\PermissionController::class,'index'])->middleware('auth:sanctum');
 Route::get('permissions/{id}',[App\Http\Controllers\PermissionController::class,'show'])->middleware('auth:sanctum');
 Route::post('permissions',[App\Http\Controllers\PermissionController::class,'store'])->middleware('auth:sanctum');
 Route::put('permissions/{id}',[App\Http\Controllers\PermissionController::class,'update'])->middleware('auth:sanctum');
 Route::delete('permissions/{id}',[App\Http\Controllers\PermissionController::class,'delete'])->middleware('auth:sanctum');

 
 Route::get('cachorros',[App\Http\Controllers\CachorroController::class,'index'])->middleware('auth:sanctum');
 Route::get('cachorros/{id}',[App\Http\Controllers\CachorroController::class,'show'])->middleware('auth:sanctum');
 Route::post('cachorros',[App\Http\Controllers\CachorroController::class,'store'])->middleware('auth:sanctum');
 Route::put('cachorros/{id}',[App\Http\Controllers\CachorroController::class,'update'])->middleware('auth:sanctum');
 Route::delete('cachorros/{id}',[App\Http\Controllers\CachorroController::class,'delete'])->middleware('auth:sanctum');

 
 Route::get('modelos',[App\Http\Controllers\ModeloController::class,'index'])->middleware('auth:sanctum');
 Route::get('modelos/{id}',[App\Http\Controllers\ModeloController::class,'show'])->middleware('auth:sanctum');
 Route::post('modelos',[App\Http\Controllers\ModeloController::class,'store'])->middleware('auth:sanctum');
 Route::put('modelos/{id}',[App\Http\Controllers\ModeloController::class,'update'])->middleware('auth:sanctum');
 Route::delete('modelos/{id}',[App\Http\Controllers\ModeloController::class,'delete'])->middleware('auth:sanctum');
 

 
 Route::get('role_has_permissions',[App\Http\Controllers\Role_has_permissionController::class,'index'])->middleware('auth:sanctum');
 Route::get('role_has_permissions/{id}',[App\Http\Controllers\Role_has_permissionController::class,'show'])->middleware('auth:sanctum');
 Route::post('role_has_permissions',[App\Http\Controllers\Role_has_permissionController::class,'store'])->middleware('auth:sanctum');
 Route::put('role_has_permissions/{id}',[App\Http\Controllers\Role_has_permissionController::class,'update'])->middleware('auth:sanctum');
 Route::delete('role_has_permissions/{id}',[App\Http\Controllers\Role_has_permissionController::class,'delete'])->middleware('auth:sanctum');