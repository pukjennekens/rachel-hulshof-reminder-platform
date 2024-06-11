<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/css/guest.scss', 'resources/css/global.scss'])

        @include('layouts.global.icons')

        @livewireStyles
    </head>
    <body class="min-h-screen flex justify-center items-center bg-gray-100">

        <div class="bg-white px-8 py-6 rounded-lg shadow-md w-full mx-4 max-w-96">
            <h1 class="text-3xl mb-4">@yield('title')</h1>
            
            @yield('content')
        </div>

        @include('layouts.global.fonts')

        @livewireScriptConfig

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
    </body>
</html>