<?php

use App\Http\Controllers\DamController;
use App\Http\Controllers\DamControllerWebRoutes;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dia 07/02/2025
Route::resource('dams', DamControllerWebRoutes::class);
Route::get('/dams', [DamControllerWebRoutes::class, 'getDamsFromApi']);

// Dia 11/02/2025
Route::get('/DamToDestroy/{id}', [DamControllerWebRoutes::class, 'destroyDamByIdFromApi']);
Route::get('/DamToUpdate/{id}', [DamControllerWebRoutes::class, 'updateDamByIdFromApi']);
Route::get('/DamToCreate', [DamControllerWebRoutes::class, 'createDamWithJsonBodyReqFromApi']);
Route::get('/DamToCreateFull', [DamControllerWebRoutes::class, 'createDamWithBearerJsonBodyReqFromApi']);
require __DIR__.'/auth.php';
