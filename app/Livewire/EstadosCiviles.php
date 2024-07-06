<?php

namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\EstadoCivil;

class EstadosCiviles extends Component
{
    use WithPagination;
    public $NombreEstadoCivil, $estadocivil_id, $search;
    public $isOpen = 0;
    public function render()
    {
        $estadosciviles = EstadoCivil::where('NombreEstadoCivil', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.EstadoCivil.estadosciviles', ['estadosciviles' => $estadosciviles]);
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
        $this->NombreEstadoCivil = '';
    }

    public function store()
    {
        $this->validate([
            'NombreEstadoCivil' => 'required',
        ]);
   
        EstadoCivil::updateOrCreate(['id' => $this->estadocivil_id], [
            'NombreEstadoCivil' => $this->NombreEstadoCivil,
        ]);
  
        session()->flash('message', 
            $this->nacionalidad_id ? 'Estado civil Actualizado correctamente!' : 'Estado civil creado correctamente!');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $estadocivil = EstadoCivil::findOrFail($id);
        $this->estadocivil_id = $id;
        $this->NombreEstadoCivil = $estadocivil->NombreEstadoCivil;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        EstadoCivil::find($id)->delete();
        session()->flash('message', 'Registro Eliminado correctamente!');
    }
}
