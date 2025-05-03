<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class VinculacionController extends Controller
{
    public function solicitar_visita() {
        
        $numeroOficio = $this->calcularNumeroOficioProvisional();
        return view('VistasVinculacion.FormularioVinculacion', compact('numeroOficio'));
    }

    public function archivo_visita() {
        return view('./VistasVinculacion/ArchivoVisitas');
    }

    public function evidencia_visita() {
        return view('./VistasVinculacion/EvidenciasVisitas');
    }

    public function informacion_empresa() {
        return view('./VistasVinculacion/InformacionEmpresas');
    }



    private function calcularNumeroOficioProvisional()
{
    // Consulta el registro global en la tabla 'contador_oficios' sin incrementarlo
    $registro = DB::table('contador_oficios')->first();
    $contadorActual = $registro ? $registro->contador_global : 0;

    // Retorna el número de oficio provisional: el contador actual + 1 (sin incrementar la BD)
    return str_pad($contadorActual + 1, 3, "0", STR_PAD_LEFT);
}
    
}
