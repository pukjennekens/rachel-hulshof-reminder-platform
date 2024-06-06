<div class="space-y-4">
    <h2 class="text-3xl">Weet je het zeker?</h2>

    <p>Door deze actie uit te voeren verwijder je <span class="font-bold">{{ $weightMeasurementsCount <= 1 ? ' 1 gewichtsmeting ' : ' alle ' . $weightMeasurementsCount . ' ' . ' gewichtsmetingen ' }}</span>uit je account. Dit kan niet meer ongedaan worden gemaakt.</p>

    <div class="grid sm:grid-cols-2 gap-2">
        <x-button
            type="button" 
            class="font-bold inline-flex items-center px-6 py-2 rounded-full border border-black hover:bg-black hover:text-white transition button touch-manipulation bg-black text-primary hover:bg-white hover:!text-black ml-auto w-full"
            wire:click="$dispatch('closeModal')"
        >
            Annuleren
        </x-button>

        <div x-data="{ confirm: false }">
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
                wire:click="resetWeightMeasurements"
            >
                Zeker?
            </x-button>
        </div>
    </div>
</div>
