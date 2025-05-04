<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiMaestroService;

class MaestroController extends Controller
{
    protected $apiService;

    public function __construct(ApiMaestroService $apiService)
    {
        $this->apiService = $apiService;
    }

    // Obtener todos los maestros
    public function index(Request $request)
    {
        try {
            $nombre = $request->query('nombre');
            $data = $this->apiService->getMaestros($nombre);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo cargar los datos'], 500);
        }
    }

    // Obtener un maestro específico
    public function show($id)
    {
        return $this->apiService->getMaestro($id);
    }

    // Crear un nuevo maestro
    public function store(Request $request)
    {
        $data = $request->all();
        Log::info('Datos recibidos para crear maestro:', $data);
        dd($data); 
        return $this->apiService->createMaestro($data);
    }

    // Actualizar un maestro
    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->apiService->updateMaestro($id, $data);
    }

    // Eliminar un maestro
    public function destroy($id)
    {
        return $this->apiService->deleteMaestro($id);
    }
}
