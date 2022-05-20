<?php

namespace App\Http\Livewire\Backend\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddProject extends Component
{


    use WithFileUploads;

    public $titre ;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;

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
        return view('livewire.backend.projects.add-project')->layout('layouts.backend.admin');
    }


    public function store()
    {
       $this->validate();

        $project = new Project();


        $project->titre = $this->titre;
        $project->description = $this->description;
        $project->lien_wiki = $this->lien_wiki;
        $project->notes = $this->notes;

        $imageName = Carbon::now()->timestamp .".". $this->image->extension();
        $this->image->storeAs('projects',$imageName);
        
        $project->image = $imageName;

        $project->save();

        session()->flash('message', 'La project a été ajouté avec succès');

        return redirect()->to('/backend/projects');
    }
}
