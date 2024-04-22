@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-2xl font-bold mb-2">Aantal glazen water</h1>

            <p>
                Hoeveel water drink ik per dag?
            </p>
        </div>

        <x-icon name="glasdrinken v2" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="space-y-4">
        <p>Druk op de waterdruppel als je een glas water hebt gedronken. Eén keer teveel geklikt, klik dan op de pijl om het aan te passen.</p>

        <p class="font-bold">
            Aantal glazen gedronken:
        </p>

        @livewire('water-intake')
    </div>
@endsection