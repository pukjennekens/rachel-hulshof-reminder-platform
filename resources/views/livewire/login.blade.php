<form class="space-y-4" wire:submit.prevent="login">
    <x-input-group>
        <x-input-label label="E-mailadres" name="email" />
        <x-input-text type="email" name="email" placeholder="Vul je e-mailadres in" wire:model="form.email" />
        <x-input-errors name="form.email" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="Wachtwoord" name="password" />
        <x-input-text type="password" name="password" placeholder="Vul je wachtwoord in" wire:model="form.password" />
        <x-input-errors name="form.password" />
    </x-input-group>

    <x-input-checkbox name="remember" wire:model="form.remember">Onthoud mij</x-input-checkbox>

    <x-button type="submit">Inloggen</x-button>
</form>