@extends('layout')

@section('content')
<h1>Edit Car</h1>

<form action="{{ route('cars.update', $car->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ $car->name }}">

    <br>

    <label>Description:</label>
    <textarea name="description">{{ $car->description }}</textarea>

    <br>

    <label>Speed:</label>
    <input type="number" name="speed" value="{{ $car->speed }}">

    <br>

    <label>Durability:</label>
    <input type="number" name="durability" value="{{ $car->durability }}">

    <br>

    <label>Boost:</label>
    <input type="number" name="boost" value="{{ $car->boost }}">

    <br>

    <label>Category:</label>
    <select name="category_id">
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" {{ $car->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Update</button>
</form>
@endsection
