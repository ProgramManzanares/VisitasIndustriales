<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Maestro;
use App\Models\JefeDepartamento;

class AuthController extends Controller
{
    // Mostrar Formulario de Login
    public function showLoginForm()
    {
        return view('Login');
    }

    // Procesar Formulario de Login
    public function login(Request $request)
    {
        // Validar credenciales: se espera que se envíe "Nombre" y, de acuerdo al tipo de usuario,
        // se envíe "ClaveMaestro" (para maestros) o "numeroTarjeta" (para jefes de departamento)
        $credentials = $request->validate([
            'Nombre'        => 'required|string|max:255',
            'ClaveMaestro'  => 'nullable|string|max:255',
            'numeroTarjeta' => 'nullable|string|max:255',
        ]);

        // Intentar autenticación para maestros usando el guard "web" (provider: Maestro)
        if (!empty($credentials['ClaveMaestro'])) {
            if (Auth::guard('web')->attempt([
                'Nombre'   => $credentials['Nombre'],
                'password' => $credentials['ClaveMaestro']
            ])) {
                return redirect()->route('PanelAcademia');
            }
        }

        // Intentar autenticación para jefes de departamento usando el guard "jefe_departamento"
        if (!empty($credentials['numeroTarjeta'])) {
            if (Auth::guard('jefe_departamento')->attempt([
                // Aquí usamos "nombre" (minúscula) en lugar de "Nombre" para coincidir con el modelo JefeDepartamento
                'nombre'   => $credentials['Nombre'],
                'password' => $credentials['numeroTarjeta']
            ])) {
                return redirect()->route('PanelVinculacion');
            }
        }

        // En caso de fallo, devolver un mensaje de error
        return back()->withErrors(['name' => 'El nombre o clave proporcionados son incorrectos']);
    }
}
