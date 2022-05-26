<?php

namespace App\Http\Livewire\Frontend\Presentation;

use Livewire\Component;
use Livewire\WithPagination;

class Presentation extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public function render()
    {
        //$items = Machine::paginate(10);
        return view('livewire.frontend.presentation.presentation')->layout('layouts.frontend.site');
    } 

   

}
