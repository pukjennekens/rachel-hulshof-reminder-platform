<?php

namespace App\Livewire;

use App\Models\NutritionPlan;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class AdminNutritionPlan extends ModalComponent
{
    /**
     * @var NutritionPlan
     */
    public NutritionPlan $nutritionPlan;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|string')]
    public $category_a;

    #[Validate('required|string')]
    public $category_b;

    public function mount($nutritionPlanId = null)
    {
        $this->nutritionPlan = $nutritionPlanId
            ? NutritionPlan::find($nutritionPlanId)
            : new NutritionPlan();

        $this->name       = $this->nutritionPlan->name;
        $this->category_a = $this->nutritionPlan->category_a;
        $this->category_b = $this->nutritionPlan->category_b;
    }

    public function save()
    {
        $this->validate();

        $this->nutritionPlan->name       = $this->name;
        $this->nutritionPlan->category_a = $this->category_a;
        $this->nutritionPlan->category_b = $this->category_b;
        $this->nutritionPlan->save();

        $this->dispatch('notify', type: 'success', message: 'Opgeslagen!');
        $this->dispatch('closeModal');
        $this->dispatch('nutrition-plan-updated');
    }

    public function render()
    {
        return view('livewire.admin-nutrition-plan');
    }
}
