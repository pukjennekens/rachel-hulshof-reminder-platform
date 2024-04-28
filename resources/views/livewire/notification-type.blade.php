<div x-data="{ name: @entangle('name'), default_time: @entangle('default_time'), heading: @entangle('heading'), subheading: @entangle('subheading') }">
    <form class="space-y-4" wire:submit="save">
        @isset($notificationType->id)
            <h3 class="font-bold text-lg">"{{ $notificationType->name }}" aanpassen</h3>
        @else
            <h3 class="font-bold text-lg">Nieuw notificatie type</h3>
        @endif

        <label class="input input-bordered flex items-center gap-2">
            Naam
            <input type="text" class="grow" placeholder="Ontbijt" wire:model="name" />
            <x-input-errors name="name" />
        </label>

        <label class="input input-bordered flex items-center gap-2">
            Standaard tijd
            <input type="time" class="grow" wire:model="default_time" />
            <x-input-errors name="default_time" />
        </label>

        <label class="input input-bordered flex items-center gap-2">
            Heading
            <input type="text" class="grow" placeholder="Van Slinc" wire:model="heading" />
            <x-input-errors name="heading" />
        </label>

        <label class="input input-bordered flex items-center gap-2">
            Subheading
            <input type="text" class="grow" placeholder="Lorem ipsum" wire:model="subheading" />
            <x-input-errors name="subheading" />
        </label>

        <div class="flex justify-end">
            <button class="btn btn-neutral">Opslaan</button>
        </div>
    </form>

    <div class="space-y-4 mt-6">
        <h3 class="font-bold text-lg">Voorbeeld van de notificatie:</h3>

        <div class="bg-neutral-100 p-4 rounded-lg shadow-md flex items-center gap-4">
            <img src="{{ asset('/images/logos/slinc-logo-192-192.png') }}" alt="Slinc logo" class="w-12 h-12" />

            <div class="flex flex-col">
                <p class="font-bold text-sm" x-text="heading"></p>
                <p class="font-bold text-sm">Van Slinc</p>
                <p class="text-sm" x-text="subheading"></p>
            </div>

            <div class="flex-grow"></div>

            <p class="text-sm" x-text="default_time"></p>
        </div>
    </div>
</div>