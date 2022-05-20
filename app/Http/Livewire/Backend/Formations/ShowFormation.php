<?php

namespace App\Http\Livewire\Backend\Formations;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ShowFormation extends Component
{


    use WithFileUploads;

    public $id_formation ;
    public $titre ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;


    public function render()
    {
        return view('livewire.backend.formations.show-formation')->layout('layouts.backend.admin');
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

   
}
