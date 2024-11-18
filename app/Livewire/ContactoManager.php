<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContactoManager extends Component
{
    use AuthorizesRequests;

    public $currentView = 'create';

    public function switchView($view)
    {
        $this->currentView = $view;
    }

    public function render()
    {
        Gate::authorize('viewContacto', Auth::user());
        return view('livewire.contacto-manager');
    }
}
