<?php

namespace App\Console\Commands;

use App\Models\JefeDepartamento;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class EncryptJefePasswords extends Command
{
    // Firmar del comando para ejecutarlo desde artisan
    protected $signature = 'jefes:encrypt-passwords';

    // Descripción del comando
    protected $description = 'Encripta todas las contraseñas de los jefes de departamento que no están encriptadas.';

    public function handle()
    {
        // Obtiene todos los registros de jefes de departamento
        $jefes = JefeDepartamento::all();

        foreach ($jefes as $jefe) {
            // Verifica si la contraseña necesita ser hasheada.
            // Hash::needsRehash devolverá true si el valor no es un hash válido.
            if (!Hash::needsRehash($jefe->numeroTarjeta)) {
                continue;
            }

            // Hashea el valor del campo numeroTarjeta
            $jefe->numeroTarjeta = Hash::make($jefe->numeroTarjeta);
            $jefe->save();

            // Muestra un mensaje para ese jefe
            $this->info("Contraseña encriptada para: {$jefe->Nombre}"); // o usa $jefe->nombre según corresponda
        }

        $this->info('Todas las contraseñas han sido encriptadas');
    }

    // Método que permite invocar el comando directamente
    public function __invoke()
    {
        $this->handle();
    }
}
