<?php

namespace Tests\Feature;

use App\Models\Maestro;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class Prueba03 extends TestCase
{
    use RefreshDatabase;
    /**
     * Verificar la creación de un nuevo maestro
     * @return void
     */
    public function test_creacion_de_nuevo_maestro()
    {
        // Crear un usuario autenticado (si es necesario para acceder a las rutas)
        $user = User::factory()->create();
        $this->actingAs($user);
        // Datos de ejemplo para crear un nuevo maestro
        $data = [
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
            'direccion' => 'Calle Ficticia 123',
            // Agrega aquí cualquier otro campo necesario
        ];
        // Enviar solicitud POST para crear el nuevo maestro
        $response = $this->post(route('maestros.store'), $data);
        // Verificar que la respuesta sea una redirección a la ruta de la lista de maestros o detalle
        $response->assertRedirect(route('maestros.index'));
        // Verificar que el maestro fue creado en la base de datos
        $this->assertDatabaseHas('maestros', [
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
        ]);
    }

    /**
     * Verificar la actualización de un maestro.
     *
     * @return void
     */
    public function test_actualizacion_de_maestro()
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();
        $this->actingAs($user);
        // Crear un maestro existente
        $maestro = Maestro::factory()->create();
        // Datos de ejemplo para actualizar el maestro
        $data = [
            'nombre' => 'Carlos Gonzalez',
            'email' => 'carlos.gonzalez@example.com',
            'telefono' => '987654321',
            'direccion' => 'Avenida Ejemplo 456',
        ];
        // Enviar solicitud PUT para actualizar el maestro
        $response = $this->put(route('maestros.update', $maestro->id), $data);
        // Verificar que la respuesta sea una redirección a la ruta de la lista de maestros o detalle
        $response->assertRedirect(route('maestros.index'));
        // Verificar que la base de datos tiene los nuevos datos del maestro
        $this->assertDatabaseHas('maestros', [
            'nombre' => 'Carlos Gonzalez',
            'email' => 'carlos.gonzalez@example.com',
        ]);
    }
}
