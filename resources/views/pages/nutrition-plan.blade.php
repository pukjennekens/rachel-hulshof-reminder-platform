@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-3xl mb-2">Voedingsprogramma</h1>

            <p class="font-bold">
                Wat mag ik eten?
            </p>
        </div>

        <x-icon name="appel" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="space-y-4">
        <p>
            De voedingsmiddelen zijn verdeeld in 'categorie A en B'. Wil je een zo goed mogelijk resultaat behalen, kies dan zoveel mogelijk voor producten uit categorie A. Wil je eens een keer afwisselen kies dan voor categorie B. Groenten en fruit zijn hierin een uitzondering. Variatie in Categorie A en B van groenten en fruit is juist een betere keuze dan eenzijdige keuzes uit Categorie A.
        </p>

        <ul class="faq-list">
            <li>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-chevron-down"></i>
                    <p class="font-bold">Test vraag</p>
                </div>

                <div>
                    <p>
                        Test antwoord
                    </p>
                </div>
            </li>

            <li class="flex items-start gap-2">
                <div>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </li>

            <li class="flex items-start gap-2">
                <div>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </li>
        </ul>
    </div>
@endsection