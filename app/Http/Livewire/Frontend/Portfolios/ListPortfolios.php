<?php

namespace App\Http\Livewire\Frontend\Portfolios;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithPagination;

class ListPortfolios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public function render()
    {
        //$items = Machine::paginate(10);
        return view('livewire.frontend.portfolios.list-portfolios')->layout('layouts.frontend.site');
    } 

   

}
