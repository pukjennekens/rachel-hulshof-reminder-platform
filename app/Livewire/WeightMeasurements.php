<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class WeightMeasurements extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Relations\HasMany $weightMeasurements
     */
    public $weightMeasurements;

    public function mount()
    {
        $this->weightMeasurements = auth()->user()->weightMeasurements;
    }

    public function resetWeightMeasurements()
    {
        auth()->user()->weightMeasurements()->delete();
        $this->weightMeasurements = auth()->user()->weightMeasurements;
        $this->dispatch('notify', type: 'success', message: 'Je gewicht logboek is gereset!');
    }

    #[On('weight-measurement-created')]
    public function onWeightMeasurementCreated()
    {
        $this->weightMeasurements = auth()->user()->weightMeasurements;
    }

    public function render()
    {
        return view('livewire.weight-measurements');
    }
}
