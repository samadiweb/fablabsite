<?php

namespace App\Http\Livewire\Frontend\Formations;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithFileUploads;



class InscriptionFormation extends Component
{


    use WithFileUploads;

    public $id_formation;
    public $titre;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;




    public function render()
    {
        return view('livewire.frontend.formations.inscription-formation')->layout('layouts.frontend.site');
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
