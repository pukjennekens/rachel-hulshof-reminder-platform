@extends('layouts.guest')

@section('title', 'Registreren')

@section('content')
    @livewire('register')

    <div class="mt-4 flex flex-wrap gap-2">
        <a href="{{ route('login') }}" class="text-sm underline">Heb je al een account? Log dan in</a>
    </div>
@endsection