@props(['title'])

<li 
    class="grid items-center justify-center gap-2"
    style="grid-template-columns: auto 1fr;"
    x-data="{ open: false }"
>
    <i 
        class="fa-solid fa-chevron-down transition-all"
        x-on:click="open = !open"
        x-bind:class="{ 'transform -rotate-90': open }"
    ></i>
    <p class="font-bold" x-on:click="open = !open">{{ $title }}</p>

    <div 
        class="col-start-2 py-2 space-y-2"
        x-cloak
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
    >
        {{ $slot }}
    </div>
</li>