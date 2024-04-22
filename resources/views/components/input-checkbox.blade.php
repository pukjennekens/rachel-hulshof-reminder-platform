@props(['name'])

<label for="{{ $name }}" class="flex items-center">
    <input id="{{ $name }}" type="checkbox" class="rounded" {{ $attributes }}>
    <span class="ml-2 text-sm text-gray-600">{{ $slot }}</span>
</label>