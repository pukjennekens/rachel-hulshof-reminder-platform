@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-3xl mb-2">Veelgestelde vragen</h1>

            <p class="font-bold">
                Zoek jouw vraag hier op en krijg direct antwoord
            </p>
        </div>

        <x-icon name="info" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <a href="https://rachelhulshof.nl/veelgestelde-vragen/bestellen-en-bezorgen/" target="_blank" class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="busje" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Bestellen en bezorgen</h2>
        </a>

        <a href="https://rachelhulshof.nl/veelgestelde-vragen/klachten-en-retours/#faq" target="_blank" class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="info" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Klachten en retours</h2>
        </a>

        <a href="https://rachelhulshof.nl/veelgestelde-vragen/recepten/#faq" target="_blank" class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="recepten" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Recepten</h2>
        </a>

        <a href="https://rachelhulshof.nl/veelgestelde-vragen/over-het-slinc-programma/#faq" target="_blank" class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="slinc-logo" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Over het Slinc programma</h2>
        </a>

        <a href="https://rachelhulshof.nl/veelgestelde-vragen-wat-te-doen-bij/" target="_blank" class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="medisch" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Wat te doen bij…</h2>
        </a>
    </div>
@endsection