<form class="space-y-4 p-6 min-h-1/2" wire:submit.prevent="save">
    <h2 class="text-3xl">Meting bewerken</h2>

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
        <x-input-text type="date" name="date" wire:model="date" />
        <x-input-errors name="date" />
    </x-input-group>
    
    <div class="grid sm:grid-cols-2 gap-2">
        <x-button
            type="button" 
            class="font-bold inline-flex items-center px-6 py-2 rounded-full border border-black hover:bg-black hover:text-white transition button touch-manipulation bg-black text-primary hover:bg-white hover:!text-black ml-auto w-full"
            wire:click="$dispatch('closeModal')"
        >
            Annuleren
        </x-button>

        <x-button type="submit" wire:loading.class="loading">
            Opslaan
        </x-button>

        <div class="sm:col-span-2" x-data="{ confirm: false }">
            <x-button 
                type="button"
                class="font-bold inline-flex items-center px-6 py-2 rounded-full border border-red-400 hover:bg-red-400 transition button touch-manipulation bg-white text-red-400 ml-auto w-full"
                x-on:click="confirm = true;"
                x-cloak
                x-show="!confirm"
            >
                Verwijderen
            </x-button>

            <x-button 
                type="button"
                class="font-bold inline-flex items-center px-6 py-2 rounded-full border border-red-400 hover:bg-red-400 transition button touch-manipulation bg-white text-red-400 ml-auto w-full"
                x-cloak
                x-show="confirm"
                x-on:click="confirm = false;"
                x-on:click.away="confirm = false;"
                x-on:keydown.escape.window="confirm = false;"
                wire:click="delete"
            >
                Zeker?
            </x-button>
        </div>
    </div>
</form>