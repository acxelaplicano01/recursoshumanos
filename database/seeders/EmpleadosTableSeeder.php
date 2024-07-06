<?php

namespace Database\Seeders;

use Database\Factories\EmpleadosFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmpleadosFactory::factory()->count(50)->create();
    }
}
