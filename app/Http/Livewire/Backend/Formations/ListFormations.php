<?php

namespace App\Http\Livewire\Backend\Formations;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithPagination;

class ListFormations extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $formation_id;
    public $titre;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;

    public $form_title = "test";
    public $formMode = "ajouter";
    public $showForm = false;

    public $search;

    public function render()
    {
        $items = Formation::paginate(10);
        return view('livewire.backend.formations.list-formations', ["items" => $items])->layout('layouts.backend.admin');
    }


    public function deleteFormation($id){

        $formation = Formation::find($id);

        $formation->delete();
        session()->flash('message', 'La formation a été supprimer avec succès');

    }


}
