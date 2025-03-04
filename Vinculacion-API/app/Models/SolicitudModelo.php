<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'NumeroOficio',
        'NombreSolicitante',
        'Cargo',
        'NumeroEstudiantes',
        'AreaObservar',
        'ObjetivoVisita',
        'Turno',
        'fecha',
        'StatusSolicitud'
    ];

    protected $casts = [
        'carreras' => 'array', // Convertir JSON a array automáticamente
    ];
}

