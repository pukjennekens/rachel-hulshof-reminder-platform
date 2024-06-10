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
    </div>
@endsection