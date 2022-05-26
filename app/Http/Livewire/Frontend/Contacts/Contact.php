<?php

namespace App\Http\Livewire\Frontend\contacts;

//use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public function render()
    {
        //$items = Message::paginate(10);
        return view('livewire.frontend.contacts.contact')->layout('layouts.frontend.site');
    } 

   

}
