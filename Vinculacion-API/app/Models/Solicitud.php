<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'num_oficio',
        'nombre_empresa',
        'fecha_visita',
        'cargo_dirigido',
        'num_estudiantes',
        'carrera',
        'docente',
        'area',
        'objetivo',
        'turno',
        'contacto',
        'extension'
    ];

    
}
