<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required|min:3')]
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:8')]
    public string $password = '';

    #[Validate('required|min:8|same:password')]
    public string $passwordConfirmation = '';
}
