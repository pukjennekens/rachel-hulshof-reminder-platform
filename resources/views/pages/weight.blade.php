@extends('layouts.app', ['padding' => false])

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-2xl font-bold mb-2">Mijn gewicht</h1>

            <p>
                Vul je gewicht en datum in
            </p>
        </div>

        <x-icon name="weegschaal" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="h-full flex flex-col justify-between gap-4">
        @livewire('create-weight-measurement')

        @livewire('weight-measurements')
    </div>
@endsection