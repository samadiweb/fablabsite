<?php

namespace App\Http\Livewire\Backend\Adherents;

use App\Models\Adherent;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditAdherent extends Component
{


    use WithFileUploads;

    public $id_adherent ;
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
        return view('livewire.backend.adherents.edit-adherent')->layout('layouts.backend.admin');
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

    public function store()
    {
       $this->validate();
     
        $adherent = Adherent::where('id',  $this->id_adherent )->first();
        
        $adherent->id = $this->id_adherent;
        $adherent->titre = $this->titre;
        $adherent->description = $this->description;
        $adherent->lien_wiki = $this->lien_wiki;
        $adherent->notes = $this->notes;

        if ($this->newImage) {

            $imageName = Carbon::now()->timestamp . "." . $this->newImage->extension();
            $this->newImage->storeAs('adherents', $imageName);
            $adherent->image = $imageName;
        }

        $adherent->update();

        session()->flash('message', 'La adherent a été modifé avec succès');

        return redirect()->to('/backend/adherents');
    }
}
