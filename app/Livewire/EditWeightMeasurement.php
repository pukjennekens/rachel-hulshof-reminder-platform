<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class EditWeightMeasurement extends ModalComponent
{
    #[Validate('required|numeric|min:30|max:160')]
    public $weight = 70;

    #[Validate('required|numeric|min:0|max:9')]
    public $weightDecimal = 0;

    #[Validate('required|date|before_or_equal:today')]
    public $date;

    /**
     * @var \App\Models\WeightMeasurement $weightMeasurement
     */
    public $weightMeasurement;

    public function mount($weightMeasurementId)
    {
        $this->weightMeasurement = auth()->user()->weightMeasurements()->findOrFail($weightMeasurementId);

        $this->weight            = floor($this->weightMeasurement->weight);
        $this->weightDecimal     = $this->weightMeasurement->weight * 10 % 10;
        $this->date              = $this->weightMeasurement->date->format('Y-m-d');
    }

    public function save()
    {
        $this->validate();

        $this->weightMeasurement->update([
            'weight' => $this->weight + $this->weightDecimal / 10,
            'date'   => $this->date,
        ]);

        $this->dispatch('weight-measurement-updated');
        $this->dispatch('closeModal');
    }

    public function delete()
    {
        $this->weightMeasurement->delete();

        $this->dispatch('weight-measurement-deleted');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.edit-weight-measurement');
    }
}
