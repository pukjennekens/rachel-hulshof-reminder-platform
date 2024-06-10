<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateProfileInformation extends Component
{
    public $name;
    public $email;

    public function mount()
    {
        $this->name  = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function save()
    {
        $this->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->forceFill([
            'name'  => $this->name,
            'email' => $this->email,
        ])->save();

        $this->dispatch('notify', type: 'success', message: 'Je profiel is bijgewerkt');
    }

    public function render()
    {
        return view('livewire.update-profile-information');
    }
}
