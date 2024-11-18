<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConfigProfile extends Component
{
    public $password;
    public $email;
    public $username;
    
    public function rules()
    {
        return [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function update()
    {
        Gate::authorize('viewContacto', Auth::user());
        
        $this->validate();
        
        $user = Auth::user();
        
        $user->name = $this->username;
        
        $user->email = $this->email;

        $user->password = bcrypt($this->password);

        $user->save();

        $this->reset(['email', 'username', 'password']);

        $this->dispatch('Done');
    }

    public function render()
    {
        return view('livewire.config-profile');
    }
}
