<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-bold inline-flex justify-center items-center px-6 py-2 rounded-full border border-black hover:bg-black hover:text-white transition button touch-manipulation']) }}>
    {{ $slot }}
</button>
