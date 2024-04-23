@extends('layouts.guest')

@section('title', 'Inloggen')

@section('content')
    @livewire('login')

    <div class="mt-4 flex flex-wrap gap-2">
        <a href="" class="text-sm underline">Wachtwoord vergeten?</a>
        <a href="{{ route('register') }}" class="text-sm underline">Registreren</a>
    </div>
@endsection