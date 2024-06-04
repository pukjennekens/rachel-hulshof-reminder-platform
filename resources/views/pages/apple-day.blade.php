@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-3xl mb-2">Appeldag info</h1>

            <p class="font-bold">
                Alles wat je moet weten over de appeldag.
            </p>
        </div>

        <x-icon name="appel" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="space-y-4">
        <div>
            <p class="font-bold">Ontbijt*</p>
            <ul class="list-disc pl-4">
                <li>1,5 appel</li>
                <li>1 glas water om de Slinc Fit in te nemen</li>
            </ul>
        </div>

        <div>
            <p class="font-bold">Tussendoortje*</p>
            <ul class="list-disc pl-4">
                <li>1 appel</li>
            </ul>
        </div>

        <div>
            <p class="font-bold">Lunch*</p>
            <ul class="list-disc pl-4">
                <li>1,5 appel</li>
                <li>1 glas water om de Slinc Fit in te nemen</li>
            </ul>
        </div>

        <div>
            <p class="font-bold">Tussendoortje</p>
            <ul class="list-disc pl-4">
                <li>1 appel</li>
                <li>neem als je hier behoefte aan hebt een opkikkertje van Maggi</li>
            </ul>
        </div>

        <div>
            <p class="font-bold">Avondeten*</p>
            <ul class="list-disc pl-4">
                <li>100 tot 125 gram vlees of vis</li>
                <li>onbeperkt groente (minimaal 200 gr)</li>
                <li>1 glas water om de Slinc Fit in te nemen</li>
            </ul>
        </div>

        <p class="font-bold">
            * Vergeet niet een halfuur tot een uur voor het ontbijt, lunch en avondeten eenmaal de Slinc Shaper in te nemen met een glas water.
        </p>

        <p>
            Bovenstaande appeldag is zowel geschikt voor een vrouw als een man
        </p>

        <p class="font-bold">
            Waar moet je je aan houden?
        </p>
    </div>
@endsection