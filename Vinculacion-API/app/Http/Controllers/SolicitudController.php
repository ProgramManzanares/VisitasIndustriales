<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('FormularioAcademia');
    }

    // Método para guardar la solicitud en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre_solicitante' => 'required|string|max:255',
            'correo_maestro' => 'required|email|max:255',
            'telefono_maestro' => 'required|digits:10',
            'cargo_maestro' => 'required|string|max:255',
            'nombre_empresa' => 'required|string|max:255',
            'modalidad' => 'required|string',
            'carreras' => 'required|array',
            'grupo' => 'required|string|max:255',
            'asignatura' => 'required|string|max:255',
            'fecha_visita' => 'required|date',
        ]);

        // Verificar los valores de 'carreras'
        dd($request->input('carreras'));

        Solicitud::create([
            'nombre_solicitante' => $request->input('nombre_solicitante'),
            'correo_maestro' => $request->input('correo_maestro'),
            'telefono_maestro' => $request->input('telefono_maestro'),
            'cargo_maestro' => $request->input('cargo_maestro'),
            'nombre_empresa' => $request->input('nombre_empresa'),
            'modalidad' => $request->input('modalidad'),
            'carreras' => $request->input('carreras'),
            'grupo' => $request->input('grupo'),
            'asignatura' => $request->input('asignatura'),
            'fecha_visita' => $request->input('fecha_visita'),
        ]);

        return redirect()->back()->with('success', 'Solicitud guardada exitosamente.');
    }
}
