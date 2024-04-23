<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisterForm;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name'     => $this->form->name,
            'email'    => $this->form->email,
            'password' => Hash::make($this->form->password),
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
