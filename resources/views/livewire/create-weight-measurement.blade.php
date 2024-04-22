<form class="space-y-4 p-6 min-h-1/2" wire:submit.prevent="save">
    <x-input-group>
        <x-input-label label="Gewicht" name="weight" />
        <x-input-select name="weight" wire:model.fill="weight">
            @for ($i = 0; $i <= 320; $i++)
                @php
                    $kg = $i / 2;
                @endphp
                <option value="{{ $kg }}">{{ $kg }} kg</option>
            @endfor
        </x-input-select>
        <x-input-errors name="weight" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="Datum" name="date" />
        <x-input-text type="date" name="date" wire:model="date" />
        <x-input-errors name="date" />
    </x-input-group>
    
    <x-button type="submit" wire:loading.class="loading">
        Opslaan
    </x-button>
</form>