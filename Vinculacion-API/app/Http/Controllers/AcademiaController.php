<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademiaController extends Controller
{
    public function solicitar_visita() {
        return view('./VistasAcademia/FormularioAcademia');
    }
    
    public function archivo_visita() {
        return view('./VistasAcademia/AcademiaArchivo');
    }

    public function evidencia_visita() {
        return view('./VistasAcademia/AcademiaEvidencias');
    }

    public function subir_evidencia() {
        return view('./VistasAcademia/SubirEvidencias');
    }

    public function solicitar_visita2()
    {
    return view('./VistasAcademia/FormularioAcademia2'); 
    }

    public function panel_academia()
    {
    return view('./VistasAcademia/PanelAcademia'); 
    }
    
}
