<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChangePassword extends Component
{
    #[Validate('required')]
    public $currentPassword;

    #[Validate('required')]
    public $password;

    #[Validate('required_with:password|same:password')]
    public $password_confirmation;

    public function save()
    {
        $this->validate();
        if(!Hash::check($this->currentPassword, auth()->user()->password)) return $this->addError('currentPassword', 'Het huidige wachtwoord in onjuist');

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        $this->currentPassword       = null;
        $this->password              = null;
        $this->password_confirmation = null;

        $this->dispatch('notify', type: 'success', message: 'Wachtwoord is gewijzigd');
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
