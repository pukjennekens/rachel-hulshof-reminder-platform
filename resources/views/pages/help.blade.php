@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-2xl font-bold mb-2">Contact</h1>

            <p>
                Heb je een vraag?
            </p>
        </div>

        <x-icon name="info" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="space-y-4">
        <p>Afvallen doen we samen, je staat er niet allen voor! Voor het beste resultaat volg je Slinc onder persoonlijke begeleiding van en Slinc coach. Een Slinc coach is een stok achter de deur, kan je wekelijks tips geven en weer motiveren als het even tegenzit. Afvallen onder begeleiding geeft het hoogste resultaat in gewichtsafname.</p>

        <div>
            <a href="https://rachelhulshof.nl/contact/" target="_blank" class="bg-[#efd6db] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <x-icon name="telefoon" size="w-16 h-16" />

                    <h2 class="text-lg font-bold my-2">Mijn Slinc coach</h2>

                    <p>Heb je vragen? Neem contact op met je Slinc coach. We helpen je graag verder.</p>
                </div>

                <i class="fa-solid fa-arrow-up-right-from-square text-2xl"></i>
            </a>
        </div>
    </div>
@endsection