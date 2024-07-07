<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['CodigoEmpleado', 'EstadoEmpleado', 'DNI', 'Nombre', 'Apellido', 'Correo', 'FechaNacimiento', 'Sexo', 'Direccion', 'Telefono', 'IdNacionalidad', 'IdEstadoCivil'];
    public function estadocivil()
    {
        return $this->belongsTo(EstadoCivil::class, 'IdEstadoCivil');
    }

    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class, 'IdNacionalidad');
    }
}
