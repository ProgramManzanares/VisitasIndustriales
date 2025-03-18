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


    //Genera un número de oficio provisional (sin actualizar el contador).
    //* Este método se usa para mostrar un número en el formulario que no incremente la base de datos al recargar.
    private function calcularNumeroOficioProvisional()
    {
        // Obtenemos la fecha actual formateada como "ymd"
        $fechaFormateada = Carbon::now('America/Hermosillo')->format('ymd');

        // Consulta el registro global en la tabla 'contador_oficios' sin incrementarlo
        $registro = DB::table('contador_oficios')->first();
        $contadorActual = $registro ? $registro->contador_global : 0;
    
        // Retorna el número de oficio provisional: la fecha concatenada con el contador actual + 1 (sin incrementar la BD)
        return $fechaFormateada . str_pad($contadorActual + 1, 3, "0", STR_PAD_LEFT);
    }
    
}
