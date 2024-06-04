<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/js/admin.js', 'resources/css/admin.scss', 'resources/css/global.scss'])

    @livewireStyles
</head>
<body class="min-h-screen font-sans antialiased bg-gray-100">
 
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
        </div>

        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>

                <li>
                    <a href="{{ route('dashboard') }}" target="_blank">App <i class="fas fa-external-link-alt"></i></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container mt-4">
        @yield('content')
    </div>

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

    @include('layouts.global.fonts')

    @livewireScripts
    @livewire('wire-elements-modal')
</body>
</html>