<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class DeleteAccount extends ModalComponent
{
    public function deleteAccount()
    {
        auth()->user()->delete();
        redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.delete-account');
    }
}
