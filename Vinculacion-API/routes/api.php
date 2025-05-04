<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaestroController;

Route::middleware('api')->group(function () {
    Route::get('/maestros', [MaestroController::class, 'index']);         // Obtener todos los maestros
    Route::get('/maestros/{id}', [MaestroController::class, 'show']);     // Obtener un maestro por ID
    Route::post('/maestros', [MaestroController::class, 'store']);        // Crear un nuevo maestro
    Route::put('/maestros/{id}', [MaestroController::class, 'update']);   // Actualizar un maestro existente
    Route::delete('/maestros/{id}', [MaestroController::class, 'destroy']); // Eliminar un maestro
});
