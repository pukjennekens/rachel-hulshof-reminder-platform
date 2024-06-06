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
            <ul>
                <li>1,5 appel</li>
                <li>1 glas water om de Slinc Fit in te nemen</li>
            </ul>
        </div>

        <div>
            <p class="font-bold">Tussendoortje*</p>
            <ul>
                <li>1 appel</li>
            </ul>
        </div>

        <div>
            <p class="font-bold">Lunch*</p>
            <ul>
                <li>1,5 appel</li>
                <li>1 glas water om de Slinc Fit in te nemen</li>
            </ul>
        </div>

        <div>
            <p class="font-bold">Tussendoortje</p>
            <ul>
                <li>1 appel</li>
                <li>neem als je hier behoefte aan hebt een opkikkertje van Maggi</li>
            </ul>
        </div>

        <div>
            <p class="font-bold">Avondeten*</p>
            <ul>
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

        <div>
            <p class="font-bold">
                Waar moet je je aan houden?
            </p>
            
            <ul>
                <li>Je mag kiezen uit Granny Smith, Golden Delicious of Junami. Deze laatste is een seizoensappel en is niet altijd verkrijgbaar. Kies voor een van deze appels of maak een mix</li>
                <li>Sla geen eetmoment over en vergeet niet de voedingssupplementen in te nemen</li>
                <li>Om het proces te versterken, is het raadzaam om op deze dag naast water en kruidenthee geen andere dranken (zoals koffie) te nuttigen</li>
                <li>Indien je je slap voelt, neem dan een opkikkertje van Maggi</li>
                <li>Drink 1,5 tot 2 liter water</li>
                <li>Bak of grill vlees / vis in olijfolie (één theelepel)</li>
            </ul>
        </div>
    </div>
@endsection