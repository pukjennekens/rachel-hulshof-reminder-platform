@extends('layouts.admin')

@section('content')
    <div class="space-y-8">
        @livewire('notification-types')

        @livewire('admin-nutrition-plans')
    </div>
@endsection