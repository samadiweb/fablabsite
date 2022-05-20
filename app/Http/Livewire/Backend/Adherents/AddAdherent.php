<?php

namespace App\Http\Livewire\Backend\Adherents;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Hash; 
use Illuminate\Validation\Rules\Password;

class AddAdherent extends Component
{


    use WithFileUploads;

    public $numero_adherent ;
    public $nom ;
    public $prenom;
    public $telephone;
    public $email;
    public $password;

    protected $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'telephone' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'password_confirmation' => 'same:password',
    ];

    protected $messages = [
        'nom.required' => 'Le nom est Obligatoire.',
        'prenom.required' => "Le prenom est Obligatoire.",
        'email.required' => "L'email est Obligatoire.",
        'email.email' => "L'email non valide .",
        'password.required' => "Le password est Obligatoire.",
        'password.min' => "Le password doit etre composé de  >= 8 caractères.",

    ];

    public function render()
    {
        return view('livewire.backend.adherents.add-adherent')->layout('layouts.backend.admin');
    }


    public function store()
    {
       $this->validate();

        $adherent = new User();


        $adherent->numero_adherent = $this->numero_adherent;
        $adherent->nom = $this->nom;
        $adherent->prenom = $this->prenom;
        $adherent->telephone = $this->telephone;
        $adherent->email = $this->email;

        $adherent->password = Hash::make($this->password);  


        $adherent->save();

        session()->flash('message', "L'adherent a été ajouté avec succès");

        return redirect()->to('/backend/adherents');
      

 


    }
}
