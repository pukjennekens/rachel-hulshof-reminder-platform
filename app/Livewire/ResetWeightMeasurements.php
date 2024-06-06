<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class ResetWeightMeasurements extends ModalComponent
{
    public function resetWeightMeasurements()
    {
        auth()->user()->weightMeasurements()->delete();

        $this->dispatch('weight-measurements-reset');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.reset-weight-measurements', [
            'weightMeasurementsCount' => auth()->user()->weightMeasurements()->count(),
        ]);
    }
}
