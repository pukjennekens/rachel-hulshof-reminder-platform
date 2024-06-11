<div class="flex items-center gap-4 bg-gray-100 rounded-lg" x-data="{ type: 'password' }">
    <input x-bind:type="type" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" class="py-2 px-4 bg-gray-100 rounded-l-lg w-full" {{ $attributes }}>

    <button class="px-2" type="button">
        <i x-show="type === 'password'" @click="type = 'text'" class="fas fa-eye-slash"></i>
        <i x-show="type === 'text'" @click="type = 'password'" class="fas fa-eye"></i>
    </button>
</div>