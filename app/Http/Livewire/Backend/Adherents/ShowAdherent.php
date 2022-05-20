<?php

namespace App\Http\Livewire\Backend\Adherents;

use App\Models\Adherent;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ShowAdherent extends Component
{


    use WithFileUploads;

    public $id_adherent ;
    public $titre ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;


    public function render()
    {
        return view('livewire.backend.adherents.show-adherent')->layout('layouts.backend.admin');
    }

    public function mount($id_adherent)
    {

        $adherent = Adherent::where('id',  $id_adherent)->first();


        $this->id_adherent = $adherent->id;
        $this->titre = $adherent->titre;
        $this->image = $adherent->image;
        $this->description = $adherent->description;
        $this->lien_wiki = $adherent->lien_wiki;
        $this->notes = $adherent->notes;

    }

   
}
