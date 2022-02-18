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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::resource('garrafas',App\Http\Controllers\GarrafaController::class);
 Route::resource('canecas',App\Http\Controllers\CanecaController::class);
 Route::resource('auditorialogs',App\Http\Controllers\AuditoriaLogController::class);
 Route::resource('auditorialogs',App\Http\Controllers\AuditorialogController::class);
 Route::resource('auditorialogs',App\Http\Controllers\AuditorialogController::class);