<?php

namespace App\Http\Livewire\Frontend\Formations;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithPagination;

class ListFormations extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public function render()
    {
        $items = Formation::paginate(10);
        return view('livewire.frontend.formations.list-formations', ['items' => $items])->layout('layouts.frontend.site');
    } 

    public function search()
    {
        $items = Formation::where('nom', 'like', '%' . $this->search_word . '%')->paginate(10);
    }

}
