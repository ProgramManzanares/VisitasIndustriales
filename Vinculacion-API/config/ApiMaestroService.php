<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiMaestroService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_MAESTROS_URL', 'http://localhost:5096/api/maestro');
    }

    // Método para obtener la lista de maestros
    public function getMaestros($nombre = null)
    {
        $response = Http::withoutVerifying()->get($this->baseUrl, [
            'nombre' => $nombre
        ]);

        return $response->json();
    }

    // Método para obtener un solo maestro por su ID
    public function getMaestro($id)
    {
        $response = Http::withoutVerifying()->get("{$this->baseUrl}/{$id}");

        return $response->json();
    }

    // Método para crear un maestro
    public function createMaestro($data)
    {
        // Desactivar la verificación del SSL (solo para pruebas en entorno local)
        $response = Http::withoutVerifying()
                        ->withHeaders([
                            'Content-Type' => 'application/json',  // Asegúrate de enviar los datos como JSON
                            'Accept' => 'application/json',
                        ])
                        ->post('https://localhost:7176/api/Maestro', $data);
    
        // Verificar si la respuesta es exitosa (código de estado 2xx)
        if ($response->successful()) {
            return $response->json();  // Retorna los datos si la solicitud es exitosa
        } else {
            // Si hay un error, registramos el error y devolvemos un mensaje
            \Log::error('Error en la API de maestros: ' . $response->body());
            
            // Aquí puedes devolver una respuesta adecuada en Laravel si hubo un error
            return response()->json(['error' => 'Error al crear el maestro'], 500);
        }
    }
    
            // $response = Http::post('https://localhost:7176/api/Maestro', $data);
        //$response = Http::post($this->baseUrl, $data);

    // Método para actualizar un maestro
    public function updateMaestro($id, array $data)
    {
        $response = Http::put("{$this->baseUrl}/{$id}", $data);

        return $response->json();
    }

    // Método para eliminar un maestro
    public function deleteMaestro($id)
    {
        $response = Http::delete("{$this->baseUrl}/{$id}");

        return $response->status() === 204
            ? ['message' => 'Eliminado correctamente']
            : $response->json();
    }
}
