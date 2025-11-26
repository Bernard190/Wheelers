@extends('layouts.app')

@section('content')
<h1>Add Car Image</h1>

<form action="{{ route('car_images.store') }}" method="POST">
    @csrf

    <label>Car:</label>
    <select name="car_id">
        @foreach ($cars as $car)
            <option value="{{ $car->id }}">{{ $car->name }}</option>
        @endforeach
    </select>

    <br>

    <label>Image Path:</label>
    <input type="text" name="image_path">

    <br><br>

    <button type="submit">Save</button>
</form>
@endsection
