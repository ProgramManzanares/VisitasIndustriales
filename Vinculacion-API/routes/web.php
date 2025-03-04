<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VinculacionController;
use App\Http\Controllers\AcademiaController;

// Rutas de Autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta General
Route::get('/', function () {
    return view('login');
})->name('home');

// Rutas de Paneles
// Para maestros: usamos el middleware "auth:web" o simplemente "auth" si el guard predeterminado es "web"
Route::get('/PanelAcademia', function() {
    return view('VistasAcademia.PanelAcademia');
})->middleware('auth:web')->name('PanelAcademia');

// Para jefes de departamento: usamos el middleware "auth:jefe_departamento"
Route::get('/PanelVinculacion', function() {
    return view('VistasVinculacion.PanelVinculacion');
})->middleware('auth:jefe_departamento')->name('PanelVinculacion');

// Rutas para manejar el área de Vinculación
Route::get('/FormularioVinculacion', [VinculacionController::class, 'solicitar_visita'])->name('formulario.vinculacion');
Route::get('/ArchivoVisitas', [VinculacionController::class, 'archivo_visita'])->name('archivo.visita');
Route::get('/EvidenciasVisitas', [VinculacionController::class, 'evidencia_visita'])->name('evidencia.visita');
Route::get('/InformacionEmpresas', [VinculacionController::class, 'informacion_empresa'])->name('informacion.empresa');

// Rutas para manejar el área de Academia
Route::get('/FormularioAcademia', [AcademiaController::class, 'solicitar_visita'])->name('formulario.academia');
Route::get('/AcademiaArchivo', [AcademiaController::class, 'archivo_visita'])->name('archivo.academia');
Route::get('/AcademiaEvidencias', [AcademiaController::class, 'evidencia_visita'])->name('evidencia.academia');
