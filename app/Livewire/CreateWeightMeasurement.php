<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateWeightMeasurement extends Component
{
    #[Validate('required|numeric|regex:/^\d+(\.\d{1})?$/')]
    public $weight = 70;

    #[Validate('required|date|before_or_equal:today')]
    public $date;

    public function save()
    {
        $this->validate();

        auth()->user()->weightMeasurements()->create([
            'weight' => $this->weight,
            'date'   => $this->date,
        ]);

        $this->weight = 60;
        $this->date   = '';

        $this->dispatch('weight-measurement-created');
    }

    public function render()
    {
        return view('livewire.create-weight-measurement');
    }
}
