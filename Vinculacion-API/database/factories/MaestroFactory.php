<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maestro>
 */
class MaestroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'id' => $this -> faker -> unique() -> id(),
            'Nombre' => $this -> faker -> name(),
            'ApellidoPaterno' => $this -> faker -> ApellidoPaterno(),
            'ApellidoMaterno' => $this -> faker -> ApellidoMaterno(),
            'ClaveMaestro' => $this -> faker -> unique() ->  ClaveMaestro(),
            'CorreoElectronico' => $this -> faker -> unique() -> safeEmail(),
            'Telefono' => $this -> faker -> Telefono(),
        
        ];
    }
}
