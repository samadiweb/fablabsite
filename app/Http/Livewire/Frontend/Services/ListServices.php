<?php

namespace App\Http\Livewire\Frontend\Services;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithPagination;

class ListServices extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public function render()
    {
        //$items = Machine::paginate(10);
        return view('livewire.frontend.services.list-services')->layout('layouts.frontend.site');
    } 

   

}
