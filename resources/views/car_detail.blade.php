@extends('layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ $car->name }}</h1>

    <div class="mb-4">
        <img src="https://via.placeholder.com/400x200" alt="Car Image" class="img-fluid">
    </div>

    <div class="mb-4">
        <p>
            <strong>{{ __('car.description') }}:</strong>
            {{ $car->description }}
        </p>
    </div>

    <div>
        <p><strong>{{ __('car.speed') }}:</strong> {{ $car->speed ?? '-' }}</p>
        <p><strong>{{ __('car.durability') }}:</strong> {{ $car->durability ?? '-' }}</p>
        <p><strong>{{ __('car.boost') }}:</strong> {{ $car->boost ?? '-' }}</p>
    </div>
</div>
@endsection
