@props(['icon', 'size' => 'w-[2.5em] h-[2.5em]', 'alignicon' => 'center'])

<div class="icon-wrapper {{ $size }} alignicon-{{ $alignicon }}">
    {!! $icon !!}
</div>