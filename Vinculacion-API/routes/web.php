<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VinculacionController;
use App\Http\Controllers\AcademiaController;
use Illuminate\Http\Request;



// Ruta General
Route::get('/', function () {
    return view('login');
})->name('home');





// Rutas de Autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Rutas de Paneles
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
Route::get('/SubirEvidencias', [AcademiaController::class, 'subir_evidencia'])->name('subir.evidencia');

//Rutas de conexión a empresas

Route::get('/buscar-empresas', function (Request $request) {
    $query = $request->query('nombre');

    if (empty($query)) {
        // Si no se especifica ningún término, devuelve todas las empresas
        $empresas = DB::table('empresas')
                      ->select('id', 'empresa', 'contacto_nombre', 'puesto')
                      ->get();
    } else {
        // Si se proporciona un término, filtra las empresas que contienen ese texto
        $empresas = DB::table('empresas')
                      ->where('empresa', 'like', "%{$query}%")
                      ->select('id', 'empresa', 'contacto_nombre', 'puesto')
                      ->get();
    }

    return response()->json($empresas);
});

//Actualizar Información de Empresas
Route::post('/update-empresa', function (Request $request) {
    // Se espera que se envíe el id y los campos actualizados
    $id = $request->input('id');
    $data = $request->only(['empresa', 'contacto_nombre', 'puesto']);

    // (Opcional) Aquí puedes validar los datos antes de actualizar

    // Actualiza el registro correspondiente en la tabla 'empresas'
    $updated = DB::table('empresas')->where('id', $id)->update($data);

    if ($updated) {
        return response()->json(['success' => true, 'message' => 'Actualizado correctamente']);
    } else {
        return response()->json(['success' => false, 'message' => 'No se pudo actualizar la empresa'], 500);
    }
});
