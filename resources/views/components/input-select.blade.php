@props(['name', 'placeholder' => ''])
<select
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ $placeholder }}"
    class="py-2 px-4 bg-gray-100 rounded-lg border-none"
    {{ $attributes }}
>
    {{ $slot }}
</select>