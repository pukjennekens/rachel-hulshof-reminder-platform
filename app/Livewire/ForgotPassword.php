<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;

    public function send()
    {
        $this->validate();

        // First check if exists
        $user = User::where('email', $this->email)->first();
        if($user) {
            $token = Password::createToken($user);
            $user->sendPasswordResetNotification($token);
        }

        $this->email = '';
        $this->dispatch('notify', type: 'success', message: 'Mits het e-mailadres bestaat, is er een e-mail verstuurd met instructies om het wachtwoord te resetten');
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
