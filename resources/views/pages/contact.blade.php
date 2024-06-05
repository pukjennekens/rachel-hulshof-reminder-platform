@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-3xl mb-2">Contact</h1>

            <p class="font-bold">
                Heb je een vraag?
            </p>
        </div>

        <x-icon name="info" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="space-y-4">
        <p>Je kunt hier direct een WhatsApp bericht sturen. Deze dienst is bereikbaar binnen kantoortijden ma t/m vrij van 09.00 uur tot 18.00 uur. Ik sta je persoonlijk te woord.</p>

        <div>
            <a href="https://wa.me/message/RBZSISBCLV2NB1" target="_blank" class="bg-[#efd6db] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <x-icon name="telefoon" size="w-16 h-16" />

                    <p class="text-lg font-bold mt-2">Whatsapp</p>
                </div>

                <i class="fa-solid fa-arrow-up-right-from-square text-3xl"></i>
            </a>
        </div>
    </div>
@endsection