<?php

namespace App\Livewire;

use Livewire\Component;

class AdminControl extends Component
{
    public $currentView = 'usuarios'; 

    public function switchView($view)
    {
        $this->currentView = $view;
    }

    public function exportPdf()
    {
        return redirect()->route('export.pdf', ['currentView' => $this->currentView]);
    }

    public function render()
    {
        return view('livewire.admin-control');
    }
}
