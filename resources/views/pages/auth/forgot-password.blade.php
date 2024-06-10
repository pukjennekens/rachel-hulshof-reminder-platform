@extends('layouts.guest')

@section('title', 'Wachtwoord vergeten')

@section('content')
    @livewire('forgot-password')

    <div class="mt-4 flex flex-wrap gap-2">
        <a href="{{ route('login') }}" class="text-sm underline">Inloggen</a>
        <a href="{{ route('register') }}" class="text-sm underline">Registreren</a>
    </div>
@endsection