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
            // VALIDACIÓN DE DATOS
            // Se valida la información enviada por el formulario.
            // Nota: Si el "num-oficio" es generado automáticamente, podrías marcarlo como nullable,
            // pero aquí lo dejamos requerido para el mapeo, ya que lo vamos a recalcular.
            $validated = $request->validate([
                'num-oficio'      => 'required|string|max:255',
                'nombre-empresa'  => 'required|string|max:255',
                'fecha-visita'    => 'required|date_format:d/m/Y',
                'cargo-dirigido'  => 'required|string|max:255',
                'num-estudiantes' => 'required|integer|min:1',
                'carrera'         => 'required|string|max:255',
                'docente'         => 'required|string|max:255',
                'area'            => 'required|string|max:255',
                'objetivo'        => 'required|string',
                'turno'           => 'required|string|max:100',
                'contacto'        => 'required|string|max:255',
                'extension'       => 'required|string|max:255',
                'periodo'         => 'required|string|max:20'
            ]);

            // CALCULAR EL PERÍODO SEMESTRAL DINÁMICO
            // Utilizando Carbon y la zona "America/Hermosillo", se obtiene la fecha actual.
            // Si el mes es entre enero y junio (mes 1 a 6), el semestre es "1"; de lo contrario, "2".
            $hoy   = Carbon::now('America/Hermosillo');
            $mes   = $hoy->month;
            $anio  = $hoy->year;
            $semestre = ($mes <= 6) ? '1' : '2';
            // Se genera el período en formato "AÑO-SEMESTRE" (ej. "2025-1" o "2025-2")
            $periodoCalculado = $anio . '-' . $semestre;
            // Se asigna este valor al arreglo validado, sobreescribiendo el campo "periodo"
            $validated['periodo'] = $periodoCalculado;

            // CONVERSIÓN DE LA FECHA DE VISITA
            // Se convierte la fecha de visita del formato "dd/mm/yyyy" (como la ingresa el usuario)
            // al formato "yyyy-mm-dd" para almacenarla correctamente en MySQL.
            $fechaVisita = Carbon::createFromFormat('d/m/Y', $validated['fecha-visita'])->toDateString();

            // LÓGICA PARA GENERAR E INCREMENTAR EL NÚMERO DE OFICIO
            // Se consulta el registro único de la tabla "contador_oficios" para manejar un contador global.
            $registro = DB::table('contador_oficios')->first();

            if (!$registro) {
                // Si no existe el registro, se crea uno inicial con contador_global = 1.
                DB::table('contador_oficios')->insert([
                    'contador_global' => 1,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
                $contador = 1;
            } else {
                // Se incrementa el contador_global y se actualiza el valor.
                DB::table('contador_oficios')->increment('contador_global', 1);
                $contador = $registro->contador_global + 1;
            }
            // Se formatea el contador a 3 dígitos (ejemplo: "001", "002", etc.)
            $contadorFormateado = str_pad($contador, 3, "0", STR_PAD_LEFT);
            // Se asigna este número de oficio recién generado
            $validated['num-oficio'] = $contadorFormateado;

            // MAPEO FINAL DE CAMPOS PARA LA INSERCIÓN EN LA BASE DE DATOS
            $data = [
                'num_oficio'      => $validated['num-oficio'],
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
                'extension'       => $validated['extension'],
                'periodo'         => $validated['periodo'],  // Guarda el período semestral calculado
            ];

            // CREAR REGISTRO EN LA BASE DE DATOS
            $solicitud = Solicitud::create($data);

            // SI TODO SALE BIEN, SE RETORNA UNA RESPUESTA EXITOSA.
            return response()->json([
                'success' => true,
                'message' => 'Solicitud guardada exitosamente. Número de oficio: ' . $contadorFormateado,
                'data'    => $solicitud
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors'  => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error interno: ' . $e->getMessage()
            ], 500);
        }
    }
}