<?php

namespace App\Http\Livewire\Backend\Machines;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithPagination;

class ListMachines extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $machine_id;
    public $nom;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;

    public $form_title = "test";
    public $formMode = "ajouter";
    public $showForm = false;



    public $search_word;

    public function render()
    {
        $items = Machine::paginate(10);
        return view('livewire.backend.machines.list-machines', ['items' => $items])->layout('layouts.backend.admin');
    }

    public function search()
    {
        $items = Machine::where('nom', 'like', '%' . $this->search_word . '%')->paginate(10);
    }


    public function deleteMachine($id)
    {

        $machine = Machine::find($id);

        $machine->delete();
        session()->flash('message', 'La machine a été supprimer avec succès');
    }
}
