@extends('layouts.' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Laravel Admin Dashboard Starter Kit</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
            @livewire('dashboard.section-one')
            @livewire('dashboard.section-two')
    </div>
@endsection
