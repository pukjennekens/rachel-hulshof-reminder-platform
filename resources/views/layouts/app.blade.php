@props(['padding' => 'true'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/css/app.scss', 'resources/css/global.scss'])

        @include('layouts.global.icons')

        @livewireStyles
    </head>
    
    <body class="font-sans antialiased">
        <div
            class="fixed top-0 left-0 right-0 bg-primary p-4 text-black z-[60]"
            x-cloak
            x-data
            x-show="$store.global.notification.show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-full"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-full"
        >
            <div class="flex flex-col relative w-full">
                <strong class="font-bold text-lg" x-text="$store.global.notification.title"></strong>
                <span class="text-sm" x-text="$store.global.notification.body"></span>

                <button type="button" class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2" x-on:click="$store.global.notification.show = false">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="app-container bg-white overflow-y-auto flex flex-col">
            <header class="h-20 flex items-center justify-between px-6 pt-4" x-data="{ open: false }">
                <button type="button" class="text-[28px]" x-on:click="open = !open">
                    <i class="fas fa-bars"></i>
                </button>

                <x-button-link href="{{ route('help') }}" type="button">
                    Help!
                </x-button-link>

                <div 
                    class="z-[49] fixed bg-black bg-opacity-20 top-0 left-0 right-0 bottom-0"
                    x-cloak
                    x-show="open"
                    x-on:click="open = false"
                    x-transition:enter="duration-300 transition-all ease-in-out"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="duration-300 transition-all ease-in-out"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                ></div>
                <nav
                    class="fixed top-0 left-0 bottom-0 w-96 max-w-full h-full bg-white shadow-lg z-50 px-8 py-16 flex flex-col justify-center"
                    x-cloak
                    x-show="open"
                    x-on:click.away="open = false"
                    x-on:keydown.escape.window="open = false"
                    x-transition:enter="duration-300 transition-all ease-in-out"
                    x-transition:enter-start="transform -translate-x-full"
                    x-transition:enter-end="transform translate-x-0"
                    x-transition:leave="duration-300 transition-all ease-in-out"
                    x-transition:leave-start="transform translate-x-0"
                    x-transition:leave-end="transform -translate-x-full"
                >
                    <button type="button" class="text-3xl absolute top-5 right-8" x-on:click="open = false">
                        <i class="fas fa-times"></i>
                    </button>

                    <div class="w-full overflow-y-auto">
                        <ul class="space-y-4 pl-0 list-none">
                            {{-- underline underline-offset-4 --}}
                            <li><a href="{{ route('dashboard') }}" class="font-bold {{ request()->routeIs('dashboard') ? 'underline underline-offset-4' : '' }}">Dashboard</a></li>
                            <li><a href="{{ route('weight') }}" class="font-bold {{ request()->routeIs('weight') ? 'underline underline-offset-4' : '' }}">Mijn gewicht</a></li>
                            <li><a href="{{ route('notifications') }}" class="font-bold {{ request()->routeIs('notifications') ? 'underline underline-offset-4' : '' }}">Mijn eetmomenten</a></li>
                            <li><a href="{{ route('water') }}" class="font-bold {{ request()->routeIs('water') ? 'underline underline-offset-4' : '' }}">Water</a></li>
                            <li><a href="{{ route('nutrition-plan') }}" class="font-bold {{ request()->routeIs('nutrition-plan') ? 'underline underline-offset-4' : '' }}">Boodschappenlijstje</a></li>
                            <li><a href="{{ route('apple-day') }}" class="font-bold {{ request()->routeIs('apple-day') ? 'underline underline-offset-4' : '' }}">Appeldag</a></li>
                            <li><a href="{{ route('faq') }}" class="font-bold {{ request()->routeIs('faq') ? 'underline underline-offset-4' : '' }}">Veelgestelde vragen</a></li>
                            <li><a href="https://rachelhulshof.nl/slinc-webshop/" target="_blank" class="font-bold">Webshop</a></li>
                            <li><a href="https://rachelhulshof.nl/recepten/" target="_blank" class="font-bold">Recepten</a></li>
                            <li><a href="{{ route('contact') }}" class="font-bold {{ request()->routeIs('contact') ? 'underline underline-offset-4' : '' }}">Contact</a></li>
                            <li><a href="{{ route('account') }}" class="font-bold {{ request()->routeIs('account') ? 'underline underline-offset-4' : '' }}">Account</a></li>
                            <li><a href="{{ route('logout') }}" class="font-bold">Uitloggen</a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            @yield('header')

            <main class="h-full overflow-y-auto {{ $padding === 'true' ? 'p-6' : '' }}">
                @yield('content')
            </main>

            <div 
                class="bg-primary p-4 pb-8 flex flex-col items-center gap-2 text-center relative"
                x-data="{ helpModalOpen: false }"
                x-cloak
                x-show="$store.global.notificationsMessage.show && !notificationsNotSupportedMessageDismissed"
            >
                <x-icon name="brrrrrrr" size="w-[5rem] h-[5rem]"/>

                <h3 class="text-xl">Meldingen staan uit</h3>

                <p class="max-w-80">
                    Schakel meldingen in om op de hoogte te blijven van je eetmomenten en andere notificaties.
                </p>

                <x-button type="button" x-on:click="$store.global.requestNotificationPermission()">
                    Meldingen inschakelen
                </x-button>

                <button x-on:click="helpModalOpen = true" class="font-bold underline mt-2">Werken je meldingen niet?</button>

                <button type="button" class="absolute top-0 right-0 p-2" x-on:click="$store.global.notificationsMessage.show = false">
                    <i class="fas fa-times"></i>
                </button>

                <div
                    class="modal"
                    :class="{ 'modal-open': helpModalOpen }"
                >
                    <div class="modal-box text-left space-y-4">
                       <h2 class="text-3xl">Mijn meldingen werken niet, wat nu?</h2>

                       <p>Dit kan liggen aan een aantal dingen. Heb je een iPhone? controleer dan je IOS versie, deze moet 16.4 of hoger zijn. Heb je de toestemming voor meldingen geweigerd? <a href="https://rachelhulshof.nl/web-app-ik-heb-de-meldingen-per-ongeluk-uitgeschakeld/" target="_blank">Klik dan hier</a> voor de instructies om dit probleem op te lossen.</p>

                       <p>Heb je een Samsung/Android telefoon? Dan moet je minimaal Android versie 5.0 hebben, maar een hogere versie is altijd beter voor de werking van de meldingen.</p>

                        <p>Wil je toch doorgaan zonder meldingen? Dat is jammer, maar het kan. Houd er wel rekening mee dat je dan geen notificaties ontvangt voor je eetmomenten. Als je hiervoor kiest maar op een later moment wel weer meldingen wil inschakelen, dan moet je de webapp opnieuw installeren. <button class="font-bold underline" type="button" x-on:click="$store.global.dismissNotificationsNotSupportedMessage(); helpModalOpen = false">Doorgaan zonder meldingen</button></p>

                        <x-button type="button" x-on:click="helpModalOpen = false">
                            Sluiten
                        </x-button>
                    </div>
                </div>
            </div>

            <div 
                class="bg-primary px-6 py-8 flex flex-col items-start gap-2 text-left relative"
                x-data="{ helpModalOpen: false }"
                x-cloak
                x-show="!$store.global.notificationsSupported"
            >
                <h3 class="text-2xl">Meldingen zijn niet ondersteund op dit apparaat</h3>

                <p>
                    Helaas worden meldingen voor eetmomenten niet ondersteund op jouw apparaat, je kunt wel de rest van de functionaliteiten van de app gebruiken. Wil je ze tóch graag ontvangen? Bekijk dan de onderstaande instructies om te kijken of je hier wellicht nog iets aan kan doen
                </p>

                <x-button x-on:click="helpModalOpen = true">Mijn meldingen werken niet, wat nu?</x-button>

                <p>Wil je de app gebruiken zonder meldingen? Dat kan, maar houd er rekening mee dat je dan geen notificaties ontvangt voor je eetmomenten. Als je hiervoor kiest maar op een later moment wel weer meldingen wil inschakelen, dan moet je de webapp opnieuw installeren.</p>

                <x-button type="button" x-on:click="$store.global.dismissNotificationsNotSupportedMessage()">
                    Doorgaan zonder meldingen
                </x-button>

                <div
                    class="modal"
                    :class="{ 'modal-open': helpModalOpen }"
                >
                    <div class="modal-box text-left space-y-4">
                        <h2 class="text-3xl">Mijn meldingen werken niet, wat nu?</h2>

                        <p>Controleer eerst of je de app hebt toegevoegd aan je homescreen, zo niet dan kun je dus geen meldingen ontvangen. Om dit te doen volg dan <a href="https://rachelhulshof.nl/webapp-instructie" target="_blank">deze instructies</a>.</p>

                        <p>De meest waarschijnlijke oorzaak is dat het besturingssysteem van je telefoon niet up-to-date is. Heb je een iPhone? controleer dan of je IOS versie 16.4 of hoger is. Heb je een Samsung/Android telefoon? Dan moet je minimaal Android versie 5.0 hebben, maar een hogere versie is altijd beter voor de werking van de meldingen.</p>

                        <p>Helaas zijn er te veel android modellen die gebruik maken van versie 5.0, maar dit is een lijst van alle iPhone modellen die IOS 16.4 ondersteunen:</p>

                        <ul>
                            <li>iPhone SE (2e generatie)</li>
                            <li>iPhone SE (3e generatie)</li>
                            <li>iPhone 8 Plus</li>
                            <li>iPhone 8</li>
                            <li>iPhone X</li>
                            <li>iPhone XR</li>
                            <li>iPhone XS Max</li>
                            <li>iPhone XS</li>
                            <li>iPhone 11 Pro Max</li>
                            <li>iPhone 11 Pro</li>
                            <li>iPhone 11</li>
                            <li>iPhone 12 Pro Max</li>
                            <li>iPhone 12 Pro</li>
                            <li>iPhone 12 mini</li>
                            <li>iPhone 12</li>
                            <li>iPhone 13 Pro Max</li>
                            <li>iPhone 13 Pro</li>
                            <li>iPhone 13 mini</li>
                            <li>iPhone 13</li>
                            <li>iPhone 14 Pro Max</li>
                            <li>iPhone 14 Pro</li>
                            <li>iPhone 14 Plus</li>
                            <li>iPhone 14</li>
                            <li>En alle nieuwe modellen</li>
                        </ul>

                        <p>Heb je deze instructies gevolgd en werkt het nog steeds niet? Neem dan contact op met de klantenservice.</p>

                        <x-button type="button" x-on:click="helpModalOpen = false">
                            Sluiten
                        </x-button>
                    </div>
                </div>
            </div>

            <footer class="w-full bg-white h-24 shadow-top z-40 flex items-center justify-center gap-6 top-shadow pb-6">
                {{-- Active classes: underline font-bold underline-offset-2 --}}

                <a href="{{ route('dashboard') }}" class="inline-flex flex-col items-center">
                    <x-icon name="slinc-logo" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs {{ request()->routeIs('dashboard') ? 'underline font-bold underline-offset-2' : '' }}">Dashboard</span>
                </a>

                <a href="{{ route('weight') }}" class="inline-flex flex-col items-center">
                    <x-icon name="weegschaal" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs {{ request()->routeIs('weight') ? 'underline font-bold underline-offset-2' : '' }}">Mijn gewicht</span>
                </a>

                <a href="{{ route('water') }}" class="inline-flex flex-col items-center">
                    <x-icon name="glas-drinken" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs {{ request()->routeIs('water') ? 'underline font-bold underline-offset-2' : '' }}">Water</span>
                </a>

                <a href="{{ route('notifications') }}" class="inline-flex flex-col items-center">
                    <x-icon name="timer" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs {{ request()->routeIs('notifications') ? 'underline font-bold underline-offset-2' : '' }}">Mijn eetmomenten</span>
                </a>

                <a href="https://rachelhulshof.nl/slinc-webshop/" target="_blank" class="inline-flex flex-col items-center relative">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[0.5rem] absolute right-0 top-0"></i>

                    <x-icon name="winkelwagen" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs">Slinc shop</span>
                </a>
            </footer>

            <div
                class="fixed right-0 bottom-0 md:right-4 md:bottom-4 z-50 space-y-2 max-h-full p-4 overflow-x-auto w-full max-w-80" x-data="{ messages: [] }"
                x-on:notify.window="
                    const id = new Date().getTime();
                    messages.push({ id: id, type: $event.detail.type, message: $event.detail.message, show: false });

                    setTimeout(() => {
                        const index = messages.findIndex(message => message.id === id);
                        messages[index].show = false;
                    }, 5000);
                "
            >
                <template x-for="(message, index) in messages" :key="message.id">
                    <div
                        class="p-4 rounded-md shadow-md border-l-4 bg-white cursor-pointer"
                        :class="{ 'border-green-500': message.type === 'success', 'border-red-500': message.type === 'error', 'border-blue-500': message.type === 'info' }"
                        x-on:click="message.show = false; setTimeout(() => { messages.splice(index, 1) }, 150)"
                        x-show="message.show"
                        x-init="$nextTick(() => { message.show = true })"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 transform translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform translate-y-4"
                    >
                        <p x-text="message.message"></p>
                    </div>
                </template>
            </div>
        </div>

        @include('layouts.global.fonts')

        @livewire('wire-elements-modal')
        @livewireScriptConfig
    </body>
</html>
