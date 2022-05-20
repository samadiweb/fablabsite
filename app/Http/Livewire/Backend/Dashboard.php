<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.backend.dashboard')->layout('layouts.backend.admin');
    }
}
