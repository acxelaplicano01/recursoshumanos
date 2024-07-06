<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('CodigoEmpleado');
            $table->string('EstadoEmpleado');
            $table->string('DNI');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->date('Fecha de nacimiento');
            $table->string('Sexo');
            $table->string('Direccion');
            $table->string('Telefono');
            $table->unsignedBigInteger('IdNacionalidad');
            $table->unsignedBigInteger('IdEstadoCivil');
            $table->integer("created_by");
            $table->integer("deleted_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('IdNacionalidad')->references('id')->on('nacionalidads')->onDelete('restrict');
            $table->foreign('IdEstadoCivil')->references('id')->on('estadosciviles')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
