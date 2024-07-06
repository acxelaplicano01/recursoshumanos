<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EstadosCiviles;  

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstadoCivil>
 */
class EstadosCivilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NombreEstadoCivil' => $this->faker->firstName(),
            'created_by' => 1
        ];
    }
}
