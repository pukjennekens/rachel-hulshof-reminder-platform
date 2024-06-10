<form class="space-y-4 min-h-1/2" wire:submit.prevent="save">
    <x-input-group>
        <x-input-label label="Naam" name="name" />
        <x-input-text type="text" name="name" wire:model="name" />
        <x-input-errors name="name" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="E-mailadres" name="email" />
        <x-input-text type="email" name="email" wire:model="email" />
        <x-input-errors name="email" />
    </x-input-group>

    <x-button type="submit" wire:loading.class="loading">
        Opslaan
    </x-button>
</form>