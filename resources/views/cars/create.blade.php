@extends('layout')

@section('content')
<h1>Create Car</h1>

<form action="{{ route('cars.store') }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name">

    <br>

    <label>Description:</label>
    <textarea name="description"></textarea>

    <br>

    <label>Speed:</label>
    <input type="number" name="speed">

    <br>

    <label>Durability:</label>
    <input type="number" name="durability">

    <br>

    <label>Boost:</label>
    <input type="number" name="boost">

    <br>

    <label>Category:</label>
    <select name="category_id">
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Save</button>
</form>
@endsection
