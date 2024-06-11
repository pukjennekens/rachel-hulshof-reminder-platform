@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-3xl mb-2">Account</h1>

            <p class="font-bold">
                Hier kun je je persoonlijke gegevens aanpassen en je wachtwoord wijzigen
            </p>
        </div>

        <x-icon name="account" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl mb-2">Jouw persoonlijke gegevens</h2>
            @livewire('update-profile-information')
        </div>

        <div>
            <h2 class="text-2xl mb-2">Wachtwoord wijzigen</h2>
            @livewire('change-password')
        </div>

        <div>
            <h2 class="text-2xl mb-2">Account verwijderen</h2>

            <p class="mb-2">
                Wil je je account verwijderen? Dat kan, maar deze actie is onomkeerbaar. Je account wordt direct verwijderd en al je gegevens worden gewist.
            </p>

            <div x-data="{ confirm: false }">
                <x-button type="button" x-on:click="confirm = true;" x-cloak x-show="!confirm">
                    Account verwijderen
                </x-button>

                <x-button 
                    type="button"
                    x-cloak
                    x-show="confirm"
                    x-on:click="confirm = false; Livewire.dispatch('openModal', {component: 'delete-account'});"
                    x-on:click.away="confirm = false;"
                    x-on:keydown.escape.window="confirm = false;"
                >
                    Weet je het zeker?
                </x-button>
            </div>
        </div>
    </div>
@endsection