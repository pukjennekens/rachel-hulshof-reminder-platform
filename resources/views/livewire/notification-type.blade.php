<form class="space-y-4" wire:submit="save">
    @isset($notificationType->id)
        <h3 class="font-bold text-lg">"{{ $notificationType->name }}" aanpassen</h3>
    @else
        <h3 class="font-bold text-lg">Nieuw notificatie type</h3>
    @endif

    <label class="input input-bordered flex items-center gap-2">
        Naam
        <input type="text" class="grow" placeholder="Ontbijt" wire:model="name" />
    </label>

     <label class="input input-bordered flex items-center gap-2">
        Standaard tijd
        <input type="time" class="grow" wire:model="default_time" />
    </label>

    <div class="flex justify-end">
        <button class="btn btn-neutral">Opslaan</button>
    </div>
</form>
