<form class="space-y-4" wire:submit.prevent="register">
     <x-input-group>
        <x-input-label label="Naam" name="name" />
        <x-input-text type="text" name="name" placeholder="Vul je naam in" wire:model="form.name" />
        <x-input-errors name="form.name" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="E-mailadres" name="email" />
        <x-input-text type="email" name="email" placeholder="Vul je e-mailadres in" wire:model="form.email" />
        <x-input-errors name="form.email" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="Wachtwoord" name="password" />
        <x-input-password name="password" placeholder="Vul je wachtwoord in" wire:model="form.password" />
        <x-input-errors name="form.password" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="Bevestig wachtwoord" name="passwordConfirmation" />
        <x-input-password name="passwordConfirmation" placeholder="Bevestig je wachtwoord" wire:model="form.passwordConfirmation" />
        <x-input-errors name="form.passwordConfirmation" />
    </x-input-group>

    <x-button type="submit">Registreren</x-button>
</form>