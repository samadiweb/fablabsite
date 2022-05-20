<?php

namespace App\Http\Livewire\Backend\Machines;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditMachine extends Component
{


    use WithFileUploads;

    public $id_machine ;
    public $nom ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;


    public $newImage;

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
        return view('livewire.backend.machines.edit-machine')->layout('layouts.backend.admin');
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

    public function store()
    {
       $this->validate();

       $machine = Machine::where('id',  $this->id_machine )->first();

        $machine->nom = $this->nom;
        $machine->description = $this->description;
        $machine->lien_wiki = $this->lien_wiki;
        $machine->notes = $this->notes;

        if ($this->newImage) {

            $imageName = Carbon::now()->timestamp . "." . $this->newImage->extension();
            $this->newImage->storeAs('machines', $imageName);
            $machine->image = $imageName;
        }

        $machine->update();

        session()->flash('message', 'La machine a été modifé avec succès');

        return redirect()->to('/backend/machines');
    }
}
