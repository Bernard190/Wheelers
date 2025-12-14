@extends('layout')

@section('content')
<h1>{{ __('cars.title') }}</h1>

<div class="car-grid">
    <div>
        <a href="{{ route(app()->getLocale() . '.car.detail', 1) }}">
            {{ __('cars.car') }} 1
        </a>
    </div>
    <div>
        <a href="{{ route(app()->getLocale() . '.car.detail', 2) }}">
            {{ __('cars.car') }} 2
        </a>
    </div>
    <div>
        <a href="{{ route(app()->getLocale() . '.car.detail', 3) }}">
            {{ __('cars.car') }} 3
        </a>
    </div>
</div>
@endsection
