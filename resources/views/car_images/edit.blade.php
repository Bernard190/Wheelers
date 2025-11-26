@extends('layout')

@section('content')
<h1>Edit Car Image</h1>

<form action="{{ route('car_images.update', $image->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Car:</label>
    <select name="car_id">
        @foreach ($cars as $car)
            <option value="{{ $car->id }}" {{ $car->id == $image->car_id ? 'selected' : '' }}>
                {{ $car->name }}
            </option>
        @endforeach
    </select>

    <br>

    <label>Image Path:</label>
    <input type="text" name="image_path" value="{{ $image->image_path }}">

    <br><br>

    <button type="submit">Update</button>
</form>
@endsection
