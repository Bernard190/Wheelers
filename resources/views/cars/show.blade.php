@extends('layout')

@section('content')
<h1>Car Details</h1>

<p><strong>Name:</strong> {{ $car->name }}</p>
<p><strong>Description:</strong> {{ $car->description }}</p>
<p><strong>Speed:</strong> {{ $car->speed }}</p>
<p><strong>Durability:</strong> {{ $car->durability }}</p>
<p><strong>Boost:</strong> {{ $car->boost }}</p>
<p><strong>Category:</strong> {{ $car->category->name ?? '-' }}</p>

<h3>Images:</h3>
@foreach ($car->images as $img)
    <p>{{ $img->image_path }}</p>
@endforeach

<a href="{{ route('cars.index') }}">Back</a>
@endsection
