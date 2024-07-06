<?php

namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Nacionalidad;

class Nacionalidades extends Component
{
    use WithPagination;
    public $NombreNacionalidad, $nacionalidad_id, $search;
    public $isOpen = 0;
    public function render()
    {
        $nacionalidades = Nacionalidad::where('NombreNacionalidad', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.Nacionalidad.nacionalidades', ['nacionalidades' => $nacionalidades]);
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
        $this->NombreNacionalidad = '';
    }

    public function store()
    {
        $this->validate([
            'NombreNacionalidad' => 'required',
        ]);
   
        Nacionalidad::updateOrCreate(['id' => $this->nacionalidad_id], [
            'NombreNacionalidad' => $this->NombreNacionalidad,
        ]);
  
        session()->flash('message', 
            $this->nacionalidad_id ? 'Nacionalidad Actualizada correctamente!' : 'Nacionalidad creada correctamente!');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $nacionalidad = Nacionalidad::findOrFail($id);
        $this->nacionalidad_id = $id;
        $this->NombreNacionalidad = $nacionalidad->NombreNacionalidad;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Nacionalidad::find($id)->delete();
        session()->flash('message', 'Registro Eliminado correctamente!');
    }
}
