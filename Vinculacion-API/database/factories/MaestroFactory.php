<?php

namespace Database\Factories;

use App\Models\Maestro;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaestroFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a esta fábrica.
     *
     * @var string
     */
    protected $model = Maestro::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre' => $this->faker->name,
            'ClaveMaestro' => $this->faker->password,
            // Otros campos de la tabla `maestros`, como email, etc.
        ];
    }
}
