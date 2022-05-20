<?php

namespace App\Http\Livewire\Backend\Machines;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddMachine extends Component
{


    use WithFileUploads;

    public $nom ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;

    protected $rules = [
        'nom' => 'required',
        'image' => 'required',
        'description' => '',
        'lien_wiki' => '',
        'notes' => '',
    ];

    protected $messages = [
        'nom.required' => 'Le nom est Obligatoire.',
        'image.required' => "L'image est Obligatoire.",
    ];

    public function render()
    {
        return view('livewire.backend.machines.add-machine')->layout('layouts.backend.admin');
    }


    public function store()
    {
       $this->validate();

        $machine = new Machine();


        $machine->nom = $this->nom;
        $machine->description = $this->description;
        $machine->lien_wiki = $this->lien_wiki;
        $machine->notes = $this->notes;

        $imageName = Carbon::now()->timestamp ."". $this->image->extension();
        $this->image->storeAs('machines',$imageName);
        
        $machine->image = $imageName;

        $machine->save();

        session()->flash('message', 'La machine a été ajouté avec succès');

        return redirect()->to('/backend/machines');
    }
}
