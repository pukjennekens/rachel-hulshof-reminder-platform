@extends('layouts.guest')

@section('title', 'Wachtwoord instellen')

@section('content')
    @livewire('reset-password', ['token' => $token, 'email' => $email])
@endsection