<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->validate();

        $this->form->authenticate();
    
        Session::regenerate();
    
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.login');
    }
}
