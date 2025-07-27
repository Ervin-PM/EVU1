<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('proyectos', RutaController::class);

Route::get('proyectos/{proyecto}/delete', [RutaController::class, 'destroyConfirm'])
     ->name('proyectos.delete');

Route::delete('/proyectos/{proyecto}', [RutaController::class, 'destroy'])->name('proyectos.destroy');