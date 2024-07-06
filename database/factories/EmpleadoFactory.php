<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'CodigoEmpleado' => $this->faker->word,
            'EstadoEmpleado' => $this->faker->word,
            'DNI' => $this->faker->word,
            'nombre' => $this->faker->word,
            'apellido' => $this->faker->word,
            'correo' => $this->faker->word,
            'Fecha de nacimiento' => $this->faker->date,
            'Sexo' => $this->faker->word,
            'Direccion' => $this->faker->word,
            'Telefono' => $this->faker->word,
            'IdNacionalidad' => 2,
            'IdEstadoCivil' => 3,
            'created_by' => 1,
           

        ];
    }
}
