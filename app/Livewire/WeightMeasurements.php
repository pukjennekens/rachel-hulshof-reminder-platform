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

    /**
     * @var array $editing
     */
    public $editing = [];

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
    #[On('weight-measurement-updated')]
    #[On('weight-measurement-deleted')]
    #[On('weight-measurements-reset')]
    public function onWeightMeasurementCreated()
    {
        $this->weightMeasurements = auth()->user()->weightMeasurements;
    }

    public function toggleEdit($id)
    {
        if (isset($this->editing[$id])) {
            unset($this->editing[$id]);
        } else {
            $this->editing[$id] = true;
        }
    }

    public function render()
    {
        return view('livewire.weight-measurements');
    }
}
