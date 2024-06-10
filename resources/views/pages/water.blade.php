@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-3xl mb-2">Aantal glazen water</h1>

            <p class="font-bold">
                Hoeveel water drink ik per dag?
            </p>
        </div>

        <x-icon name="glas-drinken" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="flex flex-col gap-6 justify-between min-h-full">
        <div class="space-y-4">
            <p>Druk op de waterdruppel als je een glas water hebt gedronken. Eén keer teveel geklikt, klik dan op de pijl om het aan te passen.</p>

            <p class="font-bold">
                Aantal glazen gedronken:
            </p>

            @livewire('water-intake')
        </div>

        {{-- @livewire('water-history') --}}
    </div>
@endsection