<?php

namespace App\Livewire;

use Livewire\Component;

class WaterIntake extends Component
{
    public $waterIntakeGoal = 10;
    public $waterIntake     = 0;

    public function mount()
    {
        $this->waterIntake = auth()->user()->todaysWaterIntake;
    }

    public function increment()
    {
        $this->waterIntake++;
        auth()->user()->incrementTodaysWaterIntake();
    }

    public function decrement()
    {
        if ($this->waterIntake === 0) {
            return;
        }
         
        $this->waterIntake--;
        auth()->user()->setTodaysWaterIntake($this->waterIntake);
    }

    public function render()
    {
        return view('livewire.water-intake');
    }
}
