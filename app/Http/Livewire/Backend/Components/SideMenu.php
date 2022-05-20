<?php

namespace App\Http\Livewire\Backend\Components;

use Livewire\Component;

class SideMenu extends Component
{


    public function render()
    {
        $menu = [
            ['title' => 'Dashboard', 'icon' => 'fas fa-th', 'link' => '/backend'],
            ['title' => 'Adherents', 'icon' => 'fas fa-user', 'link' => '/backend/adherents'],
            ['title' => 'Machines', 'icon' => 'fas fa-microchip', 'link' => '/backend/machines'],
            ['title' => 'Projets', 'icon' => 'fas fa-tasks', 'link' => '/backend/projects'],
            ['title' => 'Formations', 'icon' => 'fas fa-chalkboard-teacher', 'link' => '/backend/formations'],
            ['title' => 'SiteWeb Front', 'icon' => 'fas fa-at', 'link' => '/'],
        ];
      
        return view('livewire.backend.components.side-menu', ['menu' => $menu]);
        
    }
}
