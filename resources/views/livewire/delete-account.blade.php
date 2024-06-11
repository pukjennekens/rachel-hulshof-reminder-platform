<div class="space-y-4" x-data="{ firstConfirm: false }">
   <h2 class="text-2xl">Account verwijderen</h2>

    <p>
        Wil je je account verwijderen? Dat kan, maar deze actie is onomkeerbaar. Je account wordt direct verwijderd en al je gegevens worden gewist. We verwijderen dus:
    </p>

    <ul>
        <li>Je account, je kan niet meer inloggen maar wel een nieuw account aanmaken met hetzelfde e-mailadres. Daarop start je dan weer vanaf nul.</li>
        <li>Alle gewichtsmetingen, dus je volledige progressie</li>
        <li>Al je waterinname registraties</li>
        <li>Al je voedingsregistraties</li>
        <li>Al je notificatie instellingen</li>
    </ul>

    <div>
        <input type="checkbox" id="confirm" x-model="firstConfirm" class="mr-2">
        <label for="confirm" class="font-bold">Ik begrijp dat dit onomkeerbaar is en ik ben er zeker van dat ik mijn account wil verwijderen.</label>
    </div>

    <div class="grid sm:grid-cols-2 gap-2">
        <x-button
            type="button" 
            class="font-bold inline-flex items-center px-6 py-2 rounded-full border border-black hover:bg-black hover:text-white transition button touch-manipulation bg-black text-primary hover:bg-white hover:!text-black ml-auto w-full"
            wire:click="$dispatch('closeModal')"
            x-bind:class="{ 'col-span-2': !firstConfirm }"
        >
            Annuleren
        </x-button>

        <div x-data="{ confirm: false }">
            <x-button 
                type="button"
                class="font-bold inline-flex items-center px-6 py-2 rounded-full border border-red-400 hover:bg-red-400 transition button touch-manipulation bg-white text-red-400 ml-auto w-full"
                x-on:click="confirm = true;"
                x-cloak
                x-show="!confirm && firstConfirm"
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
                wire:click="deleteAccount"
            >
                Zeker?
            </x-button>
        </div>
    </div>
</div>
