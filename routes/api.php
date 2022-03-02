<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('users',[App\Http\Controllers\UserController::class,'store']);
Route::prefix('auth')->group(function(){    
    Route::post('login',[App\Http\Controllers\Auth\Api\LoginController::class,'login']);
    Route::post('logout',[App\Http\Controllers\Auth\Api\LoginController::class,'logout'])->middleware(['auth:sanctum']);  
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

 Route::get('modelos',[App\Http\Controllers\ModeloController::class,'index'])->middleware('auth:sanctum');
 Route::get('modelos/{id}',[App\Http\Controllers\ModeloController::class,'show'])->middleware('auth:sanctum');
 Route::post('modelos',[App\Http\Controllers\ModeloController::class,'store'])->middleware('auth:sanctum');
 Route::put('modelos/{id}',[App\Http\Controllers\ModeloController::class,'update'])->middleware('auth:sanctum');
 Route::delete('modelos/{id}',[App\Http\Controllers\ModeloController::class,'delete'])->middleware('auth:sanctum');

 Route::get('rolehaspermissions',[App\Http\Controllers\RoleHasPermissionController::class,'index'])->middleware('auth:sanctum');
 Route::get('rolehaspermissions/{id}',[App\Http\Controllers\RoleHasPermissionController::class,'show'])->middleware('auth:sanctum');
 Route::post('rolehaspermissions',[App\Http\Controllers\RoleHasPermissionController::class,'store'])->middleware('auth:sanctum');
 Route::put('rolehaspermissions/{id}',[App\Http\Controllers\RoleHasPermissionController::class,'update'])->middleware('auth:sanctum');
 Route::delete('rolehaspermissions/{id}',[App\Http\Controllers\RoleHasPermissionController::class,'delete'])->middleware('auth:sanctum');
 
 Route::get('modelhaspermissions',[App\Http\Controllers\ModelHasPermissionController::class,'index'])->middleware('auth:sanctum');
 Route::get('modelhaspermissions/{id}',[App\Http\Controllers\ModelHasPermissionController::class,'show'])->middleware('auth:sanctum');
 Route::post('modelhaspermissions',[App\Http\Controllers\ModelHasPermissionController::class,'store'])->middleware('auth:sanctum');
 Route::put('modelhaspermissions/{id}',[App\Http\Controllers\ModelHasPermissionController::class,'update'])->middleware('auth:sanctum');
 Route::delete('modelhaspermissions/{id}',[App\Http\Controllers\ModelHasPermissionController::class,'delete'])->middleware('auth:sanctum');
 
 Route::get('modelhasrolepermissions',[App\Http\Controllers\ModelHasRolePermissionController::class,'index'])->middleware('auth:sanctum');
 Route::get('modelhasrolepermissions/{id}',[App\Http\Controllers\ModelHasRolePermissionController::class,'show'])->middleware('auth:sanctum');
 Route::post('modelhasrolepermissions',[App\Http\Controllers\ModelHasRolePermissionController::class,'store'])->middleware('auth:sanctum');
 Route::put('modelhasrolepermissions/{id}',[App\Http\Controllers\ModelHasRolePermissionController::class,'update'])->middleware('auth:sanctum');
 Route::delete('modelhasrolepermissions/{id}',[App\Http\Controllers\ModelHasRolePermissionController::class,'delete'])->middleware('auth:sanctum');
 

 
 
 Route::get('roupas',[App\Http\Controllers\RoupaController::class,'index'])->middleware('auth:sanctum');
 Route::get('roupas/{id}',[App\Http\Controllers\RoupaController::class,'show'])->middleware('auth:sanctum');
 Route::post('roupas',[App\Http\Controllers\RoupaController::class,'store'])->middleware('auth:sanctum');
 Route::put('roupas/{id}',[App\Http\Controllers\RoupaController::class,'update'])->middleware('auth:sanctum');
 Route::delete('roupas/{id}',[App\Http\Controllers\RoupaController::class,'delete'])->middleware('auth:sanctum');
 

 
 Route::get('gatos',[App\Http\Controllers\GatoController::class,'index'])->middleware('auth:sanctum');
 Route::get('gatos/{id}',[App\Http\Controllers\GatoController::class,'show'])->middleware('auth:sanctum');
 Route::post('gatos',[App\Http\Controllers\GatoController::class,'store'])->middleware('auth:sanctum');
 Route::put('gatos/{id}',[App\Http\Controllers\GatoController::class,'update'])->middleware('auth:sanctum');
 Route::delete('gatos/{id}',[App\Http\Controllers\GatoController::class,'delete'])->middleware('auth:sanctum');
 
 Route::get('aviaos',[App\Http\Controllers\AviaoController::class,'index'])->middleware('auth:sanctum');
 Route::get('aviaos/{id}',[App\Http\Controllers\AviaoController::class,'show'])->middleware('auth:sanctum');
 Route::post('aviaos',[App\Http\Controllers\AviaoController::class,'store'])->middleware('auth:sanctum');
 Route::put('aviaos/{id}',[App\Http\Controllers\AviaoController::class,'update'])->middleware('auth:sanctum');
 Route::delete('aviaos/{id}',[App\Http\Controllers\AviaoController::class,'delete'])->middleware('auth:sanctum');
 
 Route::get('casas',[App\Http\Controllers\CasaController::class,'index'])->middleware('auth:sanctum');
 Route::get('casas/{id}',[App\Http\Controllers\CasaController::class,'show'])->middleware('auth:sanctum');
 Route::post('casas',[App\Http\Controllers\CasaController::class,'store'])->middleware('auth:sanctum');
 Route::put('casas/{id}',[App\Http\Controllers\CasaController::class,'update'])->middleware('auth:sanctum');
 Route::delete('casas/{id}',[App\Http\Controllers\CasaController::class,'delete'])->middleware('auth:sanctum');