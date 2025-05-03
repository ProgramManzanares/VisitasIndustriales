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

    // Cerrar Sesión
    public function logout(Request $request)
    {
    Auth::guard('web')->logout(); // Cierra sesión solo de maestros

    $request->session()->invalidate(); // Invalida la sesión
    $request->session()->regenerateToken(); // Genera un nuevo token CSRF para seguridad

    return redirect()->route('login.form'); // Redirige al login
    }

    
    // Procesar Formulario de Login
    public function login(Request $request)
    {
        // Validar credenciales: dependiendo de si es maestro o jefe de departamento
        $credentials = $request->validate([
            'Nombre'        => 'required|string|max:255',
            // Hacer que ClaveMaestro sea requerido solo si no se usa numeroTarjeta
            'ClaveMaestro'  => 'required_without:numeroTarjeta|string|max:255',
            // Hacer que numeroTarjeta sea requerido solo si no se usa ClaveMaestro
            'numeroTarjeta' => 'required_without:ClaveMaestro|string|max:255',
        ]);
    
        // Intentar autenticación para maestros usando el guard "web" (provider: Maestro)
        if (!empty($credentials['ClaveMaestro'])) {
            if (Auth::guard('web')->attempt([
                'Nombre'   => $credentials['Nombre'],
                'password' => $credentials['ClaveMaestro']
            ])) {
                \Log::info('Usuario maestro autenticado: ' . $credentials['Nombre']); // Log de autenticación
                return redirect()->route('PanelAcademia');
            } else {
                \Log::warning('Fallo autenticación maestro: ' . $credentials['Nombre']); // Log de fallo de autenticación
            }
        }
    
        // Intentar autenticación para jefes de departamento usando el guard "jefe_departamento"
        if (!empty($credentials['numeroTarjeta'])) {
            if (Auth::guard('jefe_departamento')->attempt([
                'nombre'   => $credentials['Nombre'], // Asegúrate de que 'nombre' esté en minúsculas en el modelo JefeDepartamento
                'password' => $credentials['numeroTarjeta']
            ])) {
                \Log::info('Usuario jefe departamento autenticado: ' . $credentials['Nombre']); // Log de autenticación
                return redirect()->route('PanelVinculacion');
            } else {
                \Log::warning('Fallo autenticación jefe departamento: ' . $credentials['Nombre']); // Log de fallo de autenticación
            }
        }
    
        // En caso de fallo, devolver un mensaje de error
        \Log::error('Credenciales incorrectas para: ' . $credentials['Nombre']); // Log de error
        return back()->withErrors(['name' => 'El nombre o clave proporcionados son incorrectos']);
    }
}
