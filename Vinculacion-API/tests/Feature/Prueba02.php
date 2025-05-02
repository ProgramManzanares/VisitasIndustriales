<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Asegúrate de que tu modelo de usuario esté importado
class Prueba02 extends TestCase
{
    use RefreshDatabase;
    /**
     * Verificar la redirección a la página principal.
     * @return void
     */
    public function test_verificar_redireccion_a_la_pagina_principal()
    {
        // Enviar solicitud GET a la página principal
        $response = $this->get('/');
    
        // Verificar que la respuesta sea un código de estado 200
        $response->assertStatus(200);
    }
    /**
     * Verificar acceso a rutas protegidas.
     *
     * @return void
     */
    public function test_verificar_acceso_a_rutas_protegidas()
    {
        // Crear un usuario
        $user = User::factory()->create();
    
        // Iniciar sesión con el usuario creado
        $this->actingAs($user);
    
        // Enviar solicitud a una ruta protegida
        $response = $this->get(route('PanelAcademia')); // Usa el nombre de la ruta correcta
    
        // Verificar que el acceso fue exitoso (código 200)
        $response->assertStatus(200);
    }
    /**
     * Verificar que un usuario no autenticado no pueda acceder a una ruta protegida.
     *
     * @return void
     */
    
}
