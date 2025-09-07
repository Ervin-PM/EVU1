<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProyectoApiController;
use App\Http\Controllers\AuthController;

Route::middleware([\App\Http\Middleware\JwtMiddleware::class])->group(function () {
    Route::get('/proyectos', [ProyectoApiController::class, 'index']);
    Route::post('/proyectos', [ProyectoApiController::class, 'store']);
    Route::get('/proyectos/{id}', [ProyectoApiController::class, 'show']);
    Route::match(['put','patch'],'/proyectos/{id}', [ProyectoApiController::class, 'update']);
    Route::delete('/proyectos/{id}', [ProyectoApiController::class, 'destroy']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
