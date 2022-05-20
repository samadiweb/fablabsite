<?php

namespace App\Http\Livewire\Backend\Formations;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddFormation extends Component
{


    use WithFileUploads;

    public $titre ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;

    protected $rules = [
        'titre' => 'required',
        'image' => 'required',
        'description' => '',
        'lien_wiki' => '',
        'notes' => '',
    ];

    protected $messages = [
        'titre.required' => 'Le titre est Obligatoire.',
        'image.required' => "L'image est Obligatoire.",
    ];

    public function render()
    {
        return view('livewire.backend.formations.add-formation')->layout('layouts.backend.admin');
    }


    public function store()
    {
       $this->validate();

        $formation = new Formation();


        $formation->titre = $this->titre;
        $formation->description = $this->description;
        $formation->lien_wiki = $this->lien_wiki;
        $formation->notes = $this->notes;

        $imageName = Carbon::now()->timestamp ."". $this->image->extension();
        $this->image->storeAs('formations',$imageName);
        
        $formation->image = $imageName;

        $formation->save();

        session()->flash('message', 'La formation a été ajouté avec succès');

        return redirect()->to('/backend/formations');
    }
}
