<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Maestro extends Authenticatable
{
    protected $fillable = ['Nombre', 'ClaveMaestro'];
    protected $table = 'maestros';

    public function getAuthPassword()
    {
        return $this -> ClaveMaestro;
    }
}
