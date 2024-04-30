@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-2xl font-bold mb-2">Veelgestelde vragen</h1>

            <p>
                Meestgestelde vragen
            </p>
        </div>

        <x-icon name="info" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <a class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="appel" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Bestellen en bezorgen</h2>
        </a>

        <a class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="info" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Klachten en retours</h2>
        </a>

        <a class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="formulier" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Over het Slinc programma</h2>
        </a>

        <a class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="hartslag" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Medische vragen</h2>
        </a>

        <a class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="appel" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Recepten</h2>
        </a>

        <a class="p-2 rounded-lg bg-gray-100 text-center inline-flex flex-col justify-center items-center aspect-square">
            <x-icon name="laptop" size="w-[4rem] h-[3.5rem]" />
            <h2 class="text-sm font-bold mt-2">Mijn account</h2>
        </a>
    </div>
@endsection