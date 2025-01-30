<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Mostrando Form Login
   public function showloginForm()
   {
        return view('Login');
   }

   //Procesando el Formulario
   public function login(Request $request)
   {
      //dd($request -> all());
      //Credenciales que usaremos.
       $credentials = $request -> validate([
        'Nombre' => 'required|string|max:255',
        'ClaveMaestro' => 'required|string|max:255',
       ]);

       //Hace un intento para comprobar que todo este correcto.
       if (Auth::attempt ([
        'Nombre' => $credentials ['Nombre'], 
        'password' => $credentials ['ClaveMaestro']])) {

            //dd('Autenticacion exitosa');
            //Si fue exitosa, deveulve la ruta de Panel de Vinculacion.
            if (Auth::check()) {

                return redirect()->route('PanelVinculacion');
            }
    }

   //dd('Autenticacion fallida');
   //En caso de que no, devuelve un mensaje de error.
    return back() -> withErrors(['name' => 'El nombre o clave proporcionados son incorrectos']);
   }
}
