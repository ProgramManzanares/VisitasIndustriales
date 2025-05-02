<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Maestro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class LoginTest extends TestCase
{
    use RefreshDatabase; // Habilita el refresco de base de datos entre pruebas
    /** @test */
    public function maestro_can_login_with_correct_credentials()
    {
        Auth::shouldReceive('guard')
            ->with('web')
            ->once()
            ->andReturnSelf();

        Auth::shouldReceive('attempt')
            ->once()
            ->with([
                'Nombre' => 'Edgar',
                'password' => '123',
            ])
            ->andReturn(true);

        // Ejecutar el request de login
        $response = $this->post('/login', [
            'Nombre' => 'Edgar',
            'ClaveMaestro' => '123',
        ]);

        // Verificar redirección correcta
        $response->assertRedirect(route('PanelAcademia'));
    }

    public function test_maestro_can_login_successfully()
    {
        // 1. Mock de Auth para Maestro
        Auth::shouldReceive('guard')
            ->with('web')
            ->once()
            ->andReturnSelf();
        Auth::shouldReceive('attempt')
            ->once()
            ->with([
                'Nombre' => 'Edgar',
                'password' => '123'
            ])
            ->andReturn(true);
        // 2. Mock de Log de autenticación correcta
        Log::shouldReceive('info')
            ->once()
            ->with('Usuario maestro autenticado: Edgar');
        // 3. Hacer la petición POST
        $response = $this->post('/login', [
            'Nombre' => 'Edgar',
            'ClaveMaestro' => '123',
        ]);
        // 4. Verificar redirección al PanelAcademia
        $response->assertRedirect(route('PanelAcademia'));
    }

    public function test_jefe_departamento_can_login_successfully()
    {
        // 1. Mock de Auth para Jefe Departamento
        Auth::shouldReceive('guard')
            ->with('jefe_departamento')
            ->once()
            ->andReturnSelf();

        Auth::shouldReceive('attempt')
            ->once()
            ->with([
                'nombre' => 'Luis',
                'password' => '4567'
            ])
            ->andReturn(true);

        // 2. Mock de Log de autenticación correcta
        Log::shouldReceive('info')
            ->once()
            ->with('Usuario jefe departamento autenticado: Luis');

        // 3. Hacer la petición POST
        $response = $this->post('/login', [
            'Nombre' => 'Luis',
            'numeroTarjeta' => '4567',
        ]);

        // 4. Verificar redirección al PanelVinculacion
        $response->assertRedirect(route('PanelVinculacion'));
    }



    public function test_validation_errors_when_fields_missing()
    {
        // Realizar la petición sin los campos obligatorios
        $response = $this->post('/login', [
            // No mandamos campos intencionalmente
        ]);

        // Verificar que se generen errores de validación
        $response->assertSessionHasErrors([
            'Nombre',
            'ClaveMaestro',
            'numeroTarjeta',
        ]);
    }
}
