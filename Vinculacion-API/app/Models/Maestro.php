<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Maestro extends Authenticatable implements JWTSubject
{
    protected $fillable = ['ClaveMaestro', 'Nombre'];
    protected $hidden = ['ClaveMaestro'];

    public function getJWTIdentifier()
    {
     return $this -> getKey();   
    }

    public function getJWTCustomClaims()
    {
        return[];
    }
}
