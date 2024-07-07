<?php

namespace Database\Factories;
use App\Models\Nacionalidad;
use App\Models\EstadoCivil;
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
        $Nacionalidad = Nacionalidad::inRandomOrder()->first()->id;
        $EstadoCivil = EstadoCivil::inRandomOrder()->first()->id;
        return [
            'CodigoEmpleado' => $this->faker->word,
            'EstadoEmpleado' => $this->faker->word,
            'DNI' => $this->faker->word,
            'Nombre' => $this->faker->word,
            'Apellido' => $this->faker->word,
            'Correo' => $this->faker->email(),
            'FechaNacimiento' => $this->faker->date,
            'Sexo' => $this->faker->word,
            'Direccion' => $this->faker->word,
            'Telefono' => $this->faker->numerify('########'),
            'IdNacionalidad' => $Nacionalidad,
            'IdEstadoCivil' => $EstadoCivil,
            'created_by' => 1,
           

        ];
    }
}
