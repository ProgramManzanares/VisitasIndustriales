<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request -> validate([
            'ClaveMestro' => 'required|string',
            'Nombre' => 'required|string',
        ]);

        $maestro = Maestro::where('ClaveMaestro', $request -> ClaveMaestro) -> first();

        if(!$maestro || !Hash::check($request -> ClaveMaestro, $maestro -> ClaveMaestro)){
            return response() -> json(['error' => 'Credenciales Incorrectas'], 401);
        }
      
        $token = JWTAuth::fromUser($maestro);

        return response() -> json([
            'message' => 'Login Exitoso',
            'token' => $token,
            'maestro' => $maestro,
        ]);
    }
}
