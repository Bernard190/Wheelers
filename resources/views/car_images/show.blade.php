@extends('layout')

@section('content')
<h1>Car Image Details</h1>

<p><strong>Car:</strong> {{ $image->car->name }}</p>
<p><strong>Image Path:</strong> {{ $image->image_path }}</p>

<a href="{{ route('car_images.index') }}">Back</a>
@endsection
