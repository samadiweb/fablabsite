<?php

namespace App\Http\Livewire\Backend\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ListProjects extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $project_id;
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
        $items = Project::paginate(10);
        return view('livewire.backend.projects.list-projects', ["items" => $items])->layout('layouts.backend.admin');
    }


    public function deleteProject($id){

        $project = Project::find($id);

        $project->delete();
        session()->flash('message', 'La project a été supprimer avec succès');

    }


}
