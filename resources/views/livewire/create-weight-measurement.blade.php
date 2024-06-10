<form class="space-y-4 p-6 min-h-1/2" wire:submit.prevent="save">
    <x-input-group>
        <x-input-label label="Gewicht" name="weight" />

        <div class="flex items-center gap-2" x-data="{ weight: $wire.entangle('weight'), weightDecimal: $wire.entangle('weightDecimal') }">
            <x-input-select name="weight" wire:model.fill.change="weight" class="w-full">
                @for ($i = 30; $i <= 160; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </x-input-select>

            <span class="font-bold">,</span>

            <x-input-select name="weightDecimal" wire:model.fill.change="weightDecimal" class="w-full">
                @for ($i = 0; $i <= 9; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </x-input-select>

            <span class="font-bold">kg</span>
        </div>

        <p><span class="font-bold">Gewicht:</span> {{ $weight }},{{ $weightDecimal }} kg</p>

        <x-input-errors name="weight" />
    </x-input-group>

    <x-input-group>
        <x-input-label label="Datum" name="date" />
        <x-input-text type="date" name="date" wire:model="date" class="w-full" />
        <x-input-errors name="date" />
    </x-input-group>
    
    <x-button type="submit" wire:loading.class="loading">
        Opslaan
    </x-button>
</form>