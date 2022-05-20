<?php

namespace App\Http\Livewire\Backend\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditProject extends Component
{


    use WithFileUploads;

    public $id_project ;
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
        return view('livewire.backend.projects.edit-project')->layout('layouts.backend.admin');
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

    public function store()
    {
       $this->validate();
     
        $project = Project::where('id',  $this->id_project )->first();
        
        $project->id = $this->id_project;
        $project->titre = $this->titre;
        $project->description = $this->description;
        $project->lien_wiki = $this->lien_wiki;
        $project->notes = $this->notes;

        if ($this->newImage) {

            $imageName = Carbon::now()->timestamp . "." . $this->newImage->extension();
            $this->newImage->storeAs('projects', $imageName);
            $project->image = $imageName;
        }

        $project->update();

        session()->flash('message', 'La project a été modifé avec succès');

        return redirect()->to('/backend/projects');
    }
}
