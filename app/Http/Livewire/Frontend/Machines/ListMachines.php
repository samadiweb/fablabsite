<?php

namespace App\Http\Livewire\Frontend\Machines;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithPagination;

class ListMachines extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public function render()
    {
        $items = Machine::paginate(10);
        return view('livewire.frontend.machines.list-machines', ['items' => $items])->layout('layouts.frontend.site');
    } 

    public function search()
    {
        $items = Machine::where('nom', 'like', '%' . $this->search_word . '%')->paginate(10);
    }

}
