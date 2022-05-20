<?php

namespace App\Http\Livewire\Backend\Machines;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ShowMachine extends Component
{


    use WithFileUploads;

    public $id_machine ;
    public $nom ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;


    public function render()
    {
        return view('livewire.backend.machines.show-machine')->layout('layouts.backend.admin');
    }

    public function mount($id_machine)
    {

        $machine = Machine::where('id',  $id_machine)->first();


        $this->id_machine = $machine->id;
        $this->nom = $machine->nom;
        $this->image = $machine->image;
        $this->description = $machine->description;
        $this->lien_wiki = $machine->lien_wiki;
        $this->notes = $machine->notes;

    }

   
}
