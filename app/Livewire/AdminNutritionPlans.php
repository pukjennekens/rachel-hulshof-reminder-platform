<?php

namespace App\Livewire;

use App\Models\NutritionPlan;
use Illuminate\Database\Eloquent\Collection;
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
        $this->nutritionPlans = NutritionPlan::all()->sortBy('order');
    }

    public function deleteNutritionPlan($nutritionPlanId)
    {
        NutritionPlan::find($nutritionPlanId)->delete();

        $this->dispatch('nutrition-plan-deleted');
        $this->dispatch('notify', type: 'success', message: 'Voedingsschema succesvol verwijderd');
    }

    public function updateOrder($nutritionPlanId, $newOrder)
    {
        $nutritionPlan = NutritionPlan::find($nutritionPlanId);

        $newOrder = (int) $newOrder;

        if (NutritionPlan::where('order', $newOrder)->exists()) {
            $this->resolveOrderConflict($newOrder);
        }

        $nutritionPlan->order = $newOrder;
        $nutritionPlan->save();

        $this->nutritionPlans = NutritionPlan::all()->sortBy('order');
    }

    private function resolveOrderConflict($order)
    {
        // Fetch all nutrition plans ordered by current order
        $plans = NutritionPlan::orderBy('order')->get();

        // Loop through each plan and adjust the order if there is a conflict
        foreach ($plans as $plan) {
            if ($plan->order >= $order) {
                $plan->order = $plan->order + 1;
                $plan->save();
            }
        }
    }


    public function render()
    {
        return view('livewire.admin-nutrition-plans');
    }
}
