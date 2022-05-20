<?php

namespace App\Http\Livewire\Backend\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ShowProject extends Component
{


    use WithFileUploads;

    public $id_project ;
    public $titre ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;


    public function render()
    {
        return view('livewire.backend.projects.show-project')->layout('layouts.backend.admin');
    }

    public function mount($id_project)
    {

        $project = Project::where('id',  $id_project)->first();


        $this->id_project = $project->id;
        $this->titre = $project->titre;
        $this->image = $project->image;
        $this->description = $project->description;
        $this->lien_wiki = $project->lien_wiki;
        $this->notes = $project->notes;

    }

   
}
