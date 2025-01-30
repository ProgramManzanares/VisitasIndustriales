<?php

namespace App\Console\Commands;

use App\Models\Maestro;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class EncryptPasswords extends Command
{
     //Creacion de un comando para la encriptacion de las contraseñas 
    protected $signature = 'maestros:encrypt-passwords';
   
    //Encripta todas las contraseñas que no esten encriptadas.
    protected $description = 'Encripta todas las contraseñas de los maestros que no estan encriptadas.';

   public function handler()
   {
    //Busca todo dentro de la tabla de maestros. 
    $maestros = Maestro::all();

    //Itera en cada maestro hasta que encuentre uno que necesite un hash de contraseña.
     foreach ($maestros as $maestro) {

        if (!Hash::needsRehash($maestro -> ClaveMaestro)) {
            continue;
        }

        //Si encuentra un maestro que su contraseña no este encriptada la encripta.
        $maestro -> ClaveMaestro = Hash::make($maestro -> ClaveMaestro);
        $maestro -> save(); //Guarda la contraseña.

        //Mensaje de que la contraseña a sido encriptada.
        $this -> info("Contraseña encriptada para: {$maestro -> Nombre}");
     }

     $this -> info('Todas las contraseñas han sido encriptadas');
   }

   //Metodo que se usa para invocar al metodo handler.
   public function __invoke()
    {
        $this->handler();
    }
}
