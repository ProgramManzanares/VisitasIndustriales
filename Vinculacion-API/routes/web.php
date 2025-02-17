<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VinculacionController;
use App\Http\Controllers\AcademiaController;

//Ruta para el Login
Route::get('/login', [AuthController::class, 'showloginForm'])->name('login.form');
Route::post('/Login', [AuthController::class, 'login'])->name('login.post');

//Ruta general
Route::get('/', function () {
    return view('./VistasAcademia/PanelAcademia');
});

// Rutas para manejar el area de Vinculacion
Route::get('/FormularioVinculacion', [VinculacionController::class, 'solicitar_visita'])->name('formulario.vinculacion');

Route::get('/ArchivoVisitas', [VinculacionController::class, 'archivo_visita'])->name('archivo.visita');

Route::get('/EvidenciasVisitas', [VinculacionController::class, 'evidencia_visita'])->name('evidencia.visita');

Route::get('/InformacionEmpresas', [VinculacionController::class, 'informacion_empresa'])->name('informacion.empresa');

// Rutas para manejar el area de Academia
Route::get('/FormularioAcademia', [AcademiaController::class, 'solicitar_visita'])->name('formulario.academia');

Route::get('/AcademiaArchivo', [AcademiaController::class, 'archivo_visita'])->name('archivo.academia');

Route::get('/AcademiaEvidencias', [AcademiaController::class, 'evidencia_visita'])->name('evidencia.academia');