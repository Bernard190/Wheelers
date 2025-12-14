@extends('layout')

@section('content')
<h1>{{ $car->name }}</h1>

<img src="https://via.placeholder.com/400x200" alt="Car Image">

<p>
    <strong>{{ __('car.description') }}:</strong>
    {{ $car->description }}
</p>

<div>
    <p>{{ __('car.speed') }}: {{ $car->speed ?? '-' }}</p>
    <p>{{ __('car.durability') }}: {{ $car->durability ?? '-' }}</p>
    <p>{{ __('car.boost') }}: {{ $car->boost ?? '-' }}</p>
</div>
@endsection