@php $waterIntakeGoal = 10; @endphp

@extends('layouts.app')

@section('header')
    <div class="px-6 pt-4 flex items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl mb-2">Welkom</h1>

            <p class="font-bold">
                Hoe gaat het vandaag?
            </p>
        </div>
    </div>
@endsection

@section('content')
 <div>
        <div class="space-y-4">
            <a href="{{ route('weight') }}" class="bg-[#efd6db] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <x-icon name="weegschaal" size="w-[4rem] h-[4rem]" />

                    <p class="text-lg font-bold mb-2">Mijn totale gewichtsverandering:</p>

                    <span class="text-4xl font-bold">
                        {{ auth()->user()->weightChange ? auth()->user()->weightChange > 0 ? '+' . number_format(auth()->user()->weightChange, 1, ',', '.' ) : number_format(auth()->user()->weightChange, 1, ',', '.' ) : '0' }} kg
                    </span>
                </div>

                <i class="fas fa-chevron-right text-5xl"></i>
            </a>

            <a href="{{ route('water') }}" class="bg-[#bbe7e6] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <x-icon name="glas drinken" size="w-[4rem] h-[4rem]" />

                    <p class="text-lg font-bold mb-2">Aantal glazen water dat ik heb gedronken:</p>

                    <span class="text-4xl font-bold">{{ auth()->user()->todaysWaterIntake }} / {{ $waterIntakeGoal }}</span>
                </div>

                <i class="fas fa-chevron-right text-5xl"></i>
            </a>

            <a href="{{ route('notifications') }}" class="bg-[#f7f7f7] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <x-icon name="formulier" size="w-[4rem] h-[4rem]" />

                    <p class="text-lg font-bold mb-2">Aantal eetmomenten dat ik heb afgerond:</p>

                    <span class="text-4xl font-bold">{{ auth()->user()->checkedOffNotificationsCount }} / {{ auth()->user()->enabledNotificationsCount }}</span>
                </div>

                <i class="fas fa-chevron-right text-5xl"></i>
            </a>
        </div>
    </div>
@endsection