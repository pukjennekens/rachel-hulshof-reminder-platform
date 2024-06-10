<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ResetPassword extends Component
{
    #[Validate('required|min:8')]
    public $password;

    #[Validate('required_with:password|min:8|same:password')]
    public $passwordConfirmation;

    public $email;
    public $token;
    public $user;

    public function mount($token, $email) {
        $this->token = $token;
        $this->email = $email;
        $this->user  = User::where('email', $email)->first();

        if (! $this->user) {
            $this->dispatch('notify', type: 'error', message: 'Ongeldige token');
        }
    }

    public function resetPassword()
    {
        $this->validate();

        if (!Password::tokenExists($this->user, $this->token)) {
            $this->dispatch('notify', type: 'error', message: 'Ongeldige token');
            return;
        }

        $this->user->update([
            'password' => Hash::make($this->password),
        ]);

        Password::deleteToken($this->user);

        $this->redirect(route('login'));
        $this->dispatch('notify', type: 'success', message: 'Wachtwoord is gereset');
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
