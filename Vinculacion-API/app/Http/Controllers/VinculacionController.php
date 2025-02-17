<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VinculacionController extends Controller
{
    public function solicitar_visita() {
        return view('./VistasVinculacion/FormularioVinculacion');
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
}
