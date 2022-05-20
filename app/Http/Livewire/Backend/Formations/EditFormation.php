<?php

namespace App\Http\Livewire\Backend\Formations;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditFormation extends Component
{


    use WithFileUploads;

    public $id_formation ;
    public $titre ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;


    public $newImage;

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
        return view('livewire.backend.formations.edit-formation')->layout('layouts.backend.admin');
    }

    public function mount($id_formation)
    {

        $formation = Formation::where('id',  $id_formation)->first();


        $this->id_formation = $formation->id;
        $this->titre = $formation->titre;
        $this->image = $formation->image;
        $this->description = $formation->description;
        $this->lien_wiki = $formation->lien_wiki;
        $this->notes = $formation->notes;

    }

    public function store()
    {
       $this->validate();
     
        $formation = Formation::where('id',  $this->id_formation )->first();
        
        $formation->id = $this->id_formation;
        $formation->titre = $this->titre;
        $formation->description = $this->description;
        $formation->lien_wiki = $this->lien_wiki;
        $formation->notes = $this->notes;

        if ($this->newImage) {

            $imageName = Carbon::now()->timestamp . "." . $this->newImage->extension();
            $this->newImage->storeAs('formations', $imageName);
            $formation->image = $imageName;
        }

        $formation->update();

        session()->flash('message', 'La formation a été modifé avec succès');

        return redirect()->to('/backend/formations');
    }
}
