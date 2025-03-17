<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SolicitudController extends Controller
{
    public function store(Request $request)
    {   
        try {
            // Validación de datos
            $validated = $request->validate([
                'num-oficio'      => 'required|string|max:255',
                'nombre-empresa'  => 'required|string|max:255',
                'fecha-visita'    => 'required|date_format:d/m/Y',
                'cargo-dirigido'  => 'required|string|max:255',
                'num-estudiantes' => 'required|integer|min:1',
                'carrera'        => 'required|string|max:255',
                'docente'         => 'required|string|max:255',
                'area'            => 'required|string|max:255',
                'objetivo'        => 'required|string',
                'turno'           => 'required|string|max:100',
                'contacto'        => 'required|string|max:255',
                'extension'       => 'required|string|max:255'
            ]);



            // Validación de fecha: se convierte del formato dd/mm/YYYY a YYYY-MM-DD para MySQL
            $fechaVisita = Carbon::createFromFormat('d/m/Y', $validated['fecha-visita'])->toDateString();

            // ================================
            // Lógica para generar e incrementar el número de oficio
            // ================================
            // Obtiene la fecha actual formateada como "ymd" en la zona horaria de Hermosillo
            $fechaFormateada = Carbon::now('America/Hermosillo')->format('ymd'); // ej: "160325" para el 16 de marzo de 2025
           
            // Consulta el registro único de la tabla contador_oficios que maneja el contador global
            $registro = DB::table('contador_oficios')->first();

            if (!$registro) {
                // Si no existe, crea un registro inicial con contador_global = 1
                DB::table('contador_oficios')->insert([
                    'contador_global' => 1,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
                $contador = 1;
            } else {
                // Incrementa el contador global y asume que el nuevo valor es el anterior + 1
                DB::table('contador_oficios')->increment('contador_global', 1);
                $contador = $registro->contador_global + 1;
            }

            // Formatea el contador a 3 dígitos (por ejemplo "001", "002", etc.)
            $contadorFormateado = str_pad($contador, 3, "0", STR_PAD_LEFT);
            // Genera el número de oficio concatenando la fecha formateada y el contador
            $numeroOficio = $fechaFormateada . $contadorFormateado;

            // Ahora, sobreescribimos o asignamos el número de oficio generado al campo
            $validated['num-oficio'] = $numeroOficio;
            // ================================

            // Mapeo final de campos para la inserción en la BD
            $data = [
                'num_oficio'       => $validated['num-oficio'],
                'nombre_empresa'  => $validated['nombre-empresa'],
                'fecha_visita'    => $fechaVisita,
                'cargo_dirigido'  => $validated['cargo-dirigido'],
                'num_estudiantes' => $validated['num-estudiantes'],
                'carrera'         => $validated['carrera'],
                'docente'         => $validated['docente'],
                'area'            => $validated['area'],
                'objetivo'        => $validated['objetivo'],
                'turno'           => $validated['turno'],
                'contacto'        => $validated['contacto'],
                'extension'       => $validated['extension']
            ];

            // Crear registro en la base de datos
            $solicitud = Solicitud::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Solicitud guardada exitosamente. Número de oficio: ' . $numeroOficio,
                'data' => $solicitud
            ], 201);
    
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error interno: ' . $e->getMessage() // Detalle del error
            ], 500);
        }
    }
}
