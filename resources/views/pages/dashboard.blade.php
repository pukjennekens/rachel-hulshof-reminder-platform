@php $waterIntakeGoal = 10; @endphp

@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-3xl font-bold mb-2">Welkom</h1>

            <p>
                Hoe gaat het vandaag?
            </p>
        </div>

        <x-icon name="appel" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
 <div>
        <div class="space-y-4">
            <a href="{{ route('weight') }}" class="bg-[#efd6db] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <i class="fas fa-clipboard-list text-5xl mb-4"></i>

                    <h2 class="text-lg font-bold mb-2">Mijn totale gewichtsverandering:</h2>

                    <span class="text-4xl font-bold">{{ auth()->user()->weightChange ? auth()->user()->weightChange > 0 ? '+' . auth()->user()->weightChange : auth()->user()->weightChange : '0' }} kg</span>
                </div>

                <i class="fas fa-chevron-right text-5xl"></i>
            </a>

            <a href="{{ route('water') }}" class="bg-[#bbe7e6] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <i class="fas fa-clipboard-list text-5xl mb-4"></i>

                    <h2 class="text-lg font-bold mb-2">Aantal glazen water dat ik heb gedronken:</h2>

                    <span class="text-4xl font-bold">{{ auth()->user()->todaysWaterIntake }} / {{ $waterIntakeGoal }}</span>
                </div>

                <i class="fas fa-chevron-right text-5xl"></i>
            </a>

            <a href="{{ route('notifications') }}" class="bg-[#f7f7f7] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <i class="fas fa-clipboard-list text-5xl mb-4"></i>

                    <h2 class="text-lg font-bold mb-2">Aantal eetmomenten dat ik heb afgerond:</h2>

                    <span class="text-4xl font-bold">{{ auth()->user()->checkedOffNotificationsCount }} / {{ auth()->user()->enabledNotificationsCount }}</span>
                </div>

                <i class="fas fa-chevron-right text-5xl"></i>
            </a>
        </div>
    </div>
@endsection