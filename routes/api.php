<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\AuthController;

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('/proyectos', [RutaController::class, 'index']);
    Route::post('/proyectos', [RutaController::class, 'store']);
    Route::get('/proyectos/{proyecto}', [RutaController::class, 'show']);
    Route::put('/proyectos/{proyecto}', [RutaController::class, 'update']);
    Route::delete('/proyectos/{proyecto}', [RutaController::class, 'destroy']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
