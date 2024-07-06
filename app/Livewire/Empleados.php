<?php

namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Empleado;

class Empleados extends Component
{
    use WithPagination;
    public  $CodigoEmpleado, $EstadoEmpleado, $DNI, $Nombre, $Apellido, $Correo, $FechaNacimiento, $Sexo, $Direccion, $Telefono, $IdNacionalidad, $IdEstadoCivil, $empleado_id, $search;
    public $isOpen = 0;
    public function render()
    {
        $empleados = Empleado::where('Nombre', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.Empleado.empleados', ['empleados' => $empleados]);
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    private function resetInputFields(){
        $this -> CodigoEmpleado = '';
        $this -> EstadoEmpleado = '';
        $this -> DNI = '';
        $this -> Nombre = '';
        $this -> Apellido = '';
        $this -> Correo = '';
        $this -> FechaNacimiento = '';
        $this -> Sexo = '';
        $this -> Direccion = '';
        $this -> Telefono = '';
        $this -> IdNacionalidad = '';
        $this -> IdEstadoCivil = '';
        $this -> empleado_id = '';
    }

    public function store()
    {
        $this->validate([
            'CodigoEmpleado' => 'required',
            'EstadoEmpleado' => 'required',
            'DNI' => 'required',
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Correo' => 'required',
            'FechaNacimiento' => 'required',
            'Sexo' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'IdNacionalidad' => 'required',
            'IdEstadoCivil' => 'required',
        ]);
   
        Empleado::updateOrCreate(['id' => $this->empleado_id], [
            'CodigoEmpleado' => $this->CodigoEmpleado,
            'EstadoEmpleado' => $this->EstadoEmpleado,
            'DNI' => $this->DNI,
            'Nombre' => $this->Nombre,
            'Apellido' => $this->Apellido,
            'Correo' => $this->Correo,
            'FechaNacimiento' => $this->FechaNacimiento,
            'Sexo' => $this->Sexo,
            'Direccion' => $this->Direccion,
            'Telefono' => $this->Telefono,
            'IdNacionalidad' => $this->IdNacionalidad,
            'IdEstadoCivil' => $this->IdEstadoCivil,
        ]);
  
        session()->flash('message', 
            $this->nacionalidad_id ? 'Empleado Actualizado correctamente!' : 'Empleado creado correctamente!');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $this->empleado_id = $id;
        $this->CodigoEmpleado = $empleado->CodigoEmpleado;
        $this->EstadoEmpleado = $empleado->EstadoEmpleado;
        $this->DNI = $empleado->DNI;
        $this->Nombre = $empleado->Nombre;
        $this->Apellido = $empleado->Apellido;
        $this->Correo = $empleado->Correo;
        $this->FechaNacimiento = $empleado->FechaNacimiento;
        $this -> Sexo = $empleado -> Sexo;
        $this -> Direccion = $empleado -> Direccion;
        $this -> Telefono = $empleado -> Telefono;
        $this -> IdNacionalidad = $empleado -> IdNacionalidad;
        $this -> IdEstadoCivil = $empleado -> IdEstadoCivil;
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Empleado::find($id)->delete();
        session()->flash('message', 'Registro Eliminado correctamente!');
    }
}
