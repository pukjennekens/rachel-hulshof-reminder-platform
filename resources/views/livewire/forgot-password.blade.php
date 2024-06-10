<form class="space-y-4" wire:submit.prevent="send">
    <x-input-group>
        <x-input-label label="E-mailadres" name="email" />
        <x-input-text type="email" name="email" placeholder="Vul je e-mailadres in" wire:model="email" />
        <x-input-errors name="email" />
    </x-input-group>

    <x-button type="submit">Wachtwoord herstellen</x-button>
</form>