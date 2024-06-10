<form class="space-y-4 min-h-1/2" wire:submit.prevent="save">
    <x-input-group>
        <x-input-label label="Oud wachtwoord" name="currentPassword" />
        <x-input-text type="password" name="currentPassword" wire:model="currentPassword" />
        <x-input-errors name="currentPassword" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="Nieuw wachtwoord" name="password" />
        <x-input-text type="password" name="password" wire:model="password" />
        <x-input-errors name="password" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="Bevestig nieuw wachtwoord" name="password_confirmation" />
        <x-input-text type="password" name="password_confirmation" wire:model="password_confirmation" />
        <x-input-errors name="password_confirmation" />
    </x-input-group>
    
    <x-button type="submit" wire:loading.class="loading">
        Opslaan
    </x-button>
</form>
