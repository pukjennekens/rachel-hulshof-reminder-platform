@props(['padding' => 'true'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="theme-color" content="#efd6db">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/css/app.scss'])

        <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>

        <link rel="apple-touch-icon" href="/images/logos/slinc-logo-192x192.png">
        <link rel="apple-touch-startup-image" href="/images/logos/slinc-logo-192x192.png">
        <link rel="manifest" href="/manifest.json">

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
                    class="fixed top-0 left-0 bottom-0 w-96 max-w-full h-full bg-white shadow-lg z-50 px-8 py-16"
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
                    <button type="button" class="text-2xl absolute top-5 right-8" x-on:click="open = false">
                        <i class="fas fa-times"></i>
                    </button>

                    <div class="w-full h-full overflow-y-auto">
                        
                    </div>
                </nav>
            </header>

            @yield('header')

            <main class="h-full overflow-y-auto {{ $padding === 'true' ? 'p-6' : '' }}">
                @yield('content')
            </main>

            <div 
                class="bg-primary p-4 flex flex-col items-center gap-2 text-center relative"
                x-data
                x-cloak
                x-show="$store.global.notificationsMessage.show"
            >
                <x-icon name="brrrrrrr" size="w-[5rem] h-[5rem]"/>

                <h3 class="text-xl font-bold">Meldingen staan uit</h3>

                <p class="max-w-80">
                    Schakel meldingen in om op de hoogte te blijven van je eetmomenten en andere notificaties.
                </p>

                <x-button type="button" x-on:click="$store.global.requestNotificationPermission()">
                    Meldingen inschakelen
                </x-button>

                <button type="button" class="absolute top-0 right-0 p-2" x-on:click="$store.global.notificationsMessage.show = false">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <footer class="w-full bg-white h-24 shadow-top z-40 flex items-center justify-center gap-6 top-shadow pb-6">
                {{-- Active classes: underline font-bold underline-offset-2 --}}

                <a href="{{ route('dashboard') }}" class="inline-flex flex-col items-center">
                    <x-icon name="hartslag" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs {{ request()->routeIs('dashboard') ? 'underline font-bold underline-offset-2' : '' }}">Dashboard</span>
                </a>

                <a href="{{ route('weight') }}" class="inline-flex flex-col items-center">
                    <x-icon name="weegschaal" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs {{ request()->routeIs('weight') ? 'underline font-bold underline-offset-2' : '' }}">Mijn gewicht</span>
                </a>

                <a href="{{ route('water') }}" class="inline-flex flex-col items-center">
                    <x-icon name="glas drinken" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs {{ request()->routeIs('water') ? 'underline font-bold underline-offset-2' : '' }}">Water</span>
                </a>

                <a href="{{ route('notifications') }}" class="inline-flex flex-col items-center">
                    <x-icon name="timer" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
                    <span class="text-[0.6rem] sm:text-xs {{ request()->routeIs('notifications') ? 'underline font-bold underline-offset-2' : '' }}">Mijn eetmomenten</span>
                </a>

                <a href="https://rachelhulshof.nl/slinc-webshop/" target="_blank" class="inline-flex flex-col items-center relative">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[0.5rem] absolute right-0 top-0"></i>

                    <x-icon name="telefoon" size="w-[1.75rem] h-[1.7rem] sm:w-[2rem] sm:h-[2rem]" />
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

        @livewireScriptConfig
    </body>
</html>
