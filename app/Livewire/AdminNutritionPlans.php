<?php

namespace App\Livewire;

use App\Models\NutritionPlan;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminNutritionPlans extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $nutritionPlans;

    #[On('nutrition-plan-created')]
    #[On('nutrition-plan-updated')]
    #[On('nutrition-plan-deleted')]
    public function mount()
    {
        $this->nutritionPlans = NutritionPlan::all();
    }

    public function deleteNutritionPlan($nutritionPlanId)
    {
        NutritionPlan::find($nutritionPlanId)->delete();

        $this->dispatch('nutrition-plan-deleted');
        $this->dispatch('notify', type: 'success', message: 'Voedingsschema succesvol verwijderd');
    }

    public function render()
    {
        return view('livewire.admin-nutrition-plans');
    }
}
