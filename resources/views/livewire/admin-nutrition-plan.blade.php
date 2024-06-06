<div>
    <form class="space-y-4" wire:submit="save">
        @isset($nutritionPlan->id)
            <h3 class="font-bold text-lg">"{{ $nutritionPlan->name }}" aanpassen</h3>
        @else
            <h3 class="font-bold text-lg">Nieuw voedingsschema</h3>
        @endif

        <label class="input input-bordered flex items-center gap-2">
            Naam
            <input type="text" class="grow" placeholder="Ontbijt" wire:model="name" />
            <x-input-errors name="name" />
        </label>

        <label class="form-control">
            <div class="label">
                <span class="label-text">Categorie A</span>
            </div>

            <textarea class="textarea textarea-bordered h-24" wire:model="category_a"></textarea>
            <x-input-errors name="category_a" />
        </label>

        <label class="form-control">
            <div class="label">
                <span class="label-text">Categorie B</span>
            </div>

            <textarea class="textarea textarea-bordered h-24" wire:model="category_b"></textarea>
            <x-input-errors name="category_b" />
        </label>

        <div class="flex justify-end">
            <button class="btn btn-neutral">Opslaan</button>
        </div>
    </form>
</div>