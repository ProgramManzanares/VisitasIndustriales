<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Maestro extends Authenticatable
{
    use HasFactory;

    // Hacemos que todos los campos sean opcionales
    protected $fillable = ['Nombre', 'ClaveMaestro', 'CorreoElectronico']; 
    protected $table = 'maestros';

    // Este método es usado para autenticar al usuario
    public function getAuthPassword()
    {
        return $this->ClaveMaestro;
    }
}