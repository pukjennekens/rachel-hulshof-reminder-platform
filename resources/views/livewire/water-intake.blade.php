<div class="flex gap-4 justify-between items-center">

    {{-- Reset button --}}
    <div>
        <button class="font-bold inline-flex items-center rounded-full border border-black hover:bg-black hover:text-white transition icon-button" wire:click="decrement">
            <x-icon name="glasdrinken v2" />
        </button>
    </div>

    <div class="relative rounded-full w-full max-w-80 aspect-square border-[1.5px] border-black flex flex-col items-center justify-between p-7 overflow-hidden">
        <p class="z-10 font-bold">Vandaag</p>
        <p class="z-10 text-4xl font-bold">{{ $waterIntake }} / {{ $waterIntakeGoal }}</p>
        <div class="opacity-0">-</div>

        <div class="absolute transition-all w-full h-[110%] bg-[#cfeeed] rounded-full -left-12 transform -translate-y-6" style="top: {{ max(0, 100 - ($waterIntake / $waterIntakeGoal) * 100) }}%"></div>
        <div class="absolute transition-all w-[110%] h-[110%] bg-[#bbe7e6] rounded-full left-12" style="top: {{ max(0, 100 - ($waterIntake / $waterIntakeGoal) * 100) }}%"></div>
    </div>

    {{-- Increment button --}}
    <div>
        <button class="font-bold inline-flex items-center rounded-full border border-black hover:bg-black hover:text-white transition icon-button" wire:click="increment">
            <x-icon name="hartje" />
        </button>
    </div>

</div>