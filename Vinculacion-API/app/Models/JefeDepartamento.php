<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class JefeDepartamento extends Authenticatable
{
    protected $fillable = ['nombre', 'numeroTarjeta'];
    protected $table = 'jefesdepartamento';

    public function getAuthPassword()
    {
        return $this->numeroTarjeta;
    }
}
