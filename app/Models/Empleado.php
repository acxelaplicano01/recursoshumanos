<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['CodigoEmpleado', 'EstadoEmpleado', 'DNI', 'Nombre', 'Apellido', 'Correo', 'FechaNacimiento', 'Sexo', 'Direccion', 'Telefono', 'Nacionalidad_id', 'EstadoCivil_id', 'created_by'];
    
}
