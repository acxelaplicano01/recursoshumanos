<?php

namespace Database\Factories;

use App\Models\Nacionalidad;
use APP\Models\EstadoCivil;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Model;


class EmpleadosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nacionalidadId = Nacionalidad::inRandomOrder()->first()->id;
        $EstadoCivilId = EstadoCivil::inRandomOrder()->first()->id;
        return [
            'CodigoEmpleado' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'EstadoEmpleado' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'DNI' => $this->faker->regexify('[0-9]{8}[A-Z]{1}'), 
            'Nombre' => $this->faker->firstName(),
            'Apellido' => $this->faker->lastName(),
            'Correo' => $this->faker->safeEmail(),
            'FechaNacimiento' => $this->faker->date(),
            'Sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'Direccion' => $this->faker->address(),
            'Telefono' => $this->faker->phoneNumber(),
            'IdNacionalidad' => $nacionalidadId,
            'IdEstadoCivil' => $EstadoCivilId,
            'created_by' => 1
        ];
    }
}
