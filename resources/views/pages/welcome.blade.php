<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="theme-color" content="#efd6db">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/css/guest.scss', 'resources/css/welcome.scss'])

        @include('layouts.global.icons')

        @livewireStyles
    </head>
    <body>
        <div class="app-container bg-cover overflow-y-auto flex flex-col">
            <div class="app-container-content flex flex-col">
                <header class="flex items-start justify-between mb-8">
                    <img src="{{ asset('images/tuna-plates.png') }}" alt="Tuna Plate" class="w-full max-w-52" />

                    <img src="{{ asset('images/btc-logo.svg') }}" alt="BTC Logo" class="w-full max-w-11" />
                </header>

                <main class="flex flex-col h-full justify-between gap-8">
                    <div class="h-full flex items-center">
                        <div class="space-y-4">
                            <h1 class="text-4xl">Installeer de app</h1>

                            <p>
                                Je bent slechts 2 stappen verwijderd van de Slinc app op jouw telefoon. Bekijk hier de instructie om de app te gebruiken.
                            </p>

                            <x-button-link href="https://rachelhulshof.nl/webapp-instructie" target="_blank">Hoe installeer ik de app?</x-button-link>
                        </div>
                    </div>

                    <a 
                        class="continue-button font-bold inline-flex items-center justify-center px-6 py-2 rounded-full border border-black hover:bg-black hover:text-white transition button touch-manipulation"
                        href="{{ route('login') }}"
                        x-data="{ enabled: false }"
                        x-bind:class="{ 'disabled': !enabled }"
                        x-init="() => { setTimeout(() => { enabled = true }, 8000) }"
                    >
                        <span>Doorgaan</span>
                    </a>
                </main>
            </div>
        </div>

        @livewireScriptConfig
    </body>
</html>