<?php

namespace App\Http\Livewire\Frontend\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ListProjects extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public function render()
    {
        $items = Project::paginate(10);
        return view('livewire.frontend.projects.list-projects', ['items' => $items])->layout('layouts.frontend.site');
    } 

    public function search()
    {
        $items = Project::where('nom', 'like', '%' . $this->search_word . '%')->paginate(10);
    }

}
