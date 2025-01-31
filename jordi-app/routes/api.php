<?php

use App\Http\Controllers\DamController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dams', [DamController::class,'index']);
Route::get('/dams/{dam}', [DamController::class,'show']);
Route::post('/dams', [DamController::class, 'store']);
//Route::post('/dams', [DamController::class, 'storeBodyReq']);
Route::put('/dams/{dam}', [DamController::class, 'update']);
Route::delete('/dams/{id}', [DamController::class, 'destroy']);