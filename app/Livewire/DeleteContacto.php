<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteContacto extends Component
{
    public $contacto;

    public function mount($contacto)
    {
        $this->contacto = $contacto;
    }

    public function delete()
    {
        $this->contacto->delete();
        $this->dispatch('contactoEliminado');
        // Mensaje de toastify
    }

    public function render()
    {
        return view('livewire.delete-contacto');
    }
}
