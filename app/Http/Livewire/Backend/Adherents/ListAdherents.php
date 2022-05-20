<?php

namespace App\Http\Livewire\Backend\Adherents;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListAdherents extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

   

    public $search;

    public function render()
    {
        $items = User::where('user_type','user')->paginate(10);
        return view('livewire.backend.adherents.list-adherents', ["items" => $items])->layout('layouts.backend.admin');
    }


    public function deleteAdherent($id){

        $adherent = User::find($id);

        $adherent->delete();
        session()->flash('message', "L'adherent a été supprimer avec succès");

    }


}
