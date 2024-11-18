<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contacto;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class CreateContacto extends Component
{
    public $number;
    public $password;
    
    public function rules()
    {
        return [
            'number' => 'required',
            'password' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.create-contacto');
    }

    public function save()
    {
        Gate::authorize('viewContacto', Auth::user());
        
        $this->validate();
        
        if (Hash::check($this->password, Auth::user()->password)) {
            
            Contacto::create([
                'user_id' => Auth::id(),
                'numero' => $this->number,
            ]);

            $this->dispatch('contactoAgregado');
    
            $this->reset(['number', 'password']);

        } else {
            $this->dispatch('passwordIncorrecta');
        }
    }
}
