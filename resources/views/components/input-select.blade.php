@props(['name', 'placeholder' => ''])
<select
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'py-2 px-4 bg-gray-100 rounded-lg border-none']) }}
>
    {{ $slot }}
</select>