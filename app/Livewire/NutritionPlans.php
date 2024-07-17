<?php

namespace App\Livewire;

use App\Models\NutritionPlan;
use Livewire\Component;

class NutritionPlans extends Component
{
    public function render()
    {
        return view('livewire.nutrition-plans', [
            'nutritionPlans' => NutritionPlan::all()->sortBy('order')
        ]);
    }
}
