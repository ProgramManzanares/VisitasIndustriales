<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class Prueba01 extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function no_se_dejan_campos_vacios()
    {
        // Enviar una solicitud con los campos vacíos
        $response = $this->post('/login', [
            'Nombre' => '',
            'ClaveMaestro' => '',
            'numeroTarjeta' => '',
        ]);

        // Verificar que se devuelvan errores para todos los campos
        $response->assertSessionHasErrors(['Nombre', 'ClaveMaestro', 'numeroTarjeta']);
    }
    /** @test */
    public function no_se_autentica_con_datos_incorrectos()
    {
        // Enviar una solicitud con los campos correctos pero con datos incorrectos
        $response = $this->post('/login', [
            'Nombre' => 'usuarioIncorrecto',
            'ClaveMaestro' => 'ClaveIncorrecta',
        ]);

        // Verificar que el login falla y se muestra el mensaje de error adecuado
        $response->assertSessionHasErrors(['name' => 'El nombre o clave proporcionados son incorrectos']);
    }
}
