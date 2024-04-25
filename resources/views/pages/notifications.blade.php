@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-2xl font-bold mb-2">Mijn eetmomenten</h1>

            <p>
                Houd je eetmomenten bij door ze af te vinken.
            </p>
        </div>

        <x-icon name="formulier" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <button 
                class="font-bold inline-flex items-center rounded-full border border-black hover:bg-black hover:text-white transition icon-button"
                type="button"
                x-data
                x-on:click="$store.global.notificationsDrawerOpen = true"
            >
                <x-icon name="wekker v2" />
            </button>

            <button class="font-bold inline-flex items-center rounded-full border border-black hover:bg-black hover:text-white transition icon-button">
                <x-icon name="appel" />
            </button>
        </div>

        <p>
            Wil je op tijd een herinnering? Stel het hier in. Is het appeldag? Klik op het appeltje.
        </p>

        @livewire('notifications-panel')
    </div>

    <div
        x-data
        x-cloak
        x-show="$store.global.notificationsDrawerOpen"
        class="absolute top-0 left-0 bottom-0 right-0 bg-black bg-opacity-50 z-40"
        x-transition:enter="duration-300 transition-all ease-in-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="duration-300 transition-all ease-in-out"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-on:click="$store.global.notificationsDrawerOpen = false"
    ></div>

    <div
        x-data
        x-cloak
        x-show="$store.global.notificationsDrawerOpen"
        class="absolute top-16 left-0 bottom-0 right-0 bg-white shadow-lg z-50 p-8 rounded-t-xl overflow-y-auto"
        x-transition:enter="duration-300 transition-all ease-in-out"
        x-transition:enter-start="transform translate-y-full"
        x-transition:enter-end="transform translate-y-0"
        x-transition:leave="duration-300 transition-all ease-in-out"
        x-transition:leave-start="transform translate-y-0"
        x-transition:leave-end="transform translate-y-full"
    >
        <div class="flex items-center justify-between gap-4">
            <x-button type="button" x-on:click="$store.global.requestNotificationPermission()">
                Meldingen inschakelen
            </x-button>

            <x-button type="button" class="bg-black text-primary hover:bg-white hover:!text-black" x-on:click="$store.global.notificationsDrawerOpen = false">
                Gereed
            </x-button>
        </div>
        
       @livewire('notification-settings')
    </div>
@endsection
