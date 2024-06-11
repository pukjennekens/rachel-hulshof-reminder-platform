<form class="space-y-4" wire:submit.prevent="resetPassword">
    <x-input-group>
        <x-input-label label="Wachtwoord" name="password" />
        <x-input-password name="password" placeholder="Vul je wachtwoord in" wire:model="password" />
        <x-input-errors name="password" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="Bevestig wachtwoord" name="passwordConfirmation" />
        <x-input-password name="passwordConfirmation" placeholder="Bevestig je wachtwoord" wire:model="passwordConfirmation" />
        <x-input-errors name="passwordConfirmation" />
    </x-input-group>

    <x-button type="submit">Wachtwoord resetten</x-button>
</form>