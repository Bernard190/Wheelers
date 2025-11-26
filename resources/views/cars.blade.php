@extends('layout')

@section('content')
<h1>Car List</h1>

<div class="car-grid">
    <div><a href="{{ route('car.detail', 1) }}">Car 1</a></div>
    <div><a href="{{ route('car.detail', 2) }}">Car 2</a></div>
    <div><a href="{{ route('car.detail', 3) }}">Car 3</a></div>
</div>
@endsection
