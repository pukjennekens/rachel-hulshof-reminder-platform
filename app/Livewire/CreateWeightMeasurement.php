<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateWeightMeasurement extends Component
{
    #[Validate('required|numeric|regex:/^\d+(\.\d{1})?$/')]
    public $weight = 70;

    #[Validate('required|numeric|regex:/^\d+(\.\d{1})?$/')]
    public $weightDecimal = 0;

    #[Validate('required|date|before_or_equal:today')]
    public $date;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
    }

    public function save()
    {
        $this->validate();

        auth()->user()->weightMeasurements()->create([
            'weight' => $this->weight + $this->weightDecimal / 10,
            'date'   => $this->date,
        ]);

        $this->weight        = 70;
        $this->weightDecimal = 0;
        $this->date          = now()->format('Y-m-d');

        $this->dispatch('weight-measurement-created');
    }

    public function render()
    {
        return view('livewire.create-weight-measurement');
    }
}
