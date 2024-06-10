@php $waterIntakeGoal = 10; @endphp

@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4">
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
                    <x-icon name="weegschaal" size="w-[4rem] h-[4rem]" alignicon="left" />

                    <p class="text-lg font-bold mb-2">Mijn totale gewichtsverandering:</p>

                    <span class="text-4xl font-bold">
                        {{ auth()->user()->weightChange ? auth()->user()->weightChange > 0 ? '+' . number_format(auth()->user()->weightChange, 1, ',', '.' ) : number_format(auth()->user()->weightChange, 1, ',', '.' ) : '0' }} kg
                    </span>
                </div>

                <x-icon name="pijl" size="w-[3rem] sm:w-[4rem] h-[3rem] sm:h-[4rem]" alignicon="left" />
            </a>

            <a href="{{ route('water') }}" class="bg-[#bbe7e6] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <x-icon name="glas-drinken" size="w-[4rem] h-[4rem]" alignicon="left" />

                    <p class="text-lg font-bold mb-2">Aantal glazen water dat ik heb gedronken:</p>

                    <span class="text-4xl font-bold">{{ auth()->user()->todaysWaterIntake }} / {{ $waterIntakeGoal }}</span>
                </div>

                <x-icon name="pijl" size="w-[3rem] sm:w-[4rem] h-[3rem] sm:h-[4rem]" alignicon="left" />
            </a>

            <a href="{{ route('notifications') }}" class="bg-[#f7f7f7] px-8 py-6 rounded-lg flex justify-between items-end gap-4">
                <div>
                    <x-icon name="checklist" size="w-[4rem] h-[4rem]" alignicon="left" />

                    <p class="text-lg font-bold mb-2">Aantal eetmomenten dat ik heb afgerond:</p>

                    <span class="text-4xl font-bold">{{ auth()->user()->checkedOffNotificationsCount }} / {{ auth()->user()->enabledNotificationsCount }}</span>
                </div>

                <x-icon name="pijl" size="w-[3rem] sm:w-[4rem] h-[3rem] sm:h-[4rem]" alignicon="left" />
            </a>

            <a href="https://rachelhulshof.nl/slinc-webshop/" target="_blank" class="bg-[#f7f7f7] px-8 py-6 rounded-lg flex gap-8 justify-between">
                <div class="flex gap-4 flex-col">
                    <p class="text-lg font-bold mb-2">Slinc Shop</p>

                    <img src="{{ asset('images/slinc-potjes.png') }}" alt="Slinc Shop" class="w-1/2 rounded-lg min-w-36">
                </div>

                <div class="flex items-end justify-end">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[1.5rem]"></i>
                </div>
            </a>
        </div>
    </div>
@endsection