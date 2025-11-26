@extends('layout')

@section('content')
<h1>Car List</h1>

<a href="{{ route('cars.create') }}">Create New Car</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Speed</th>
        <th>Durability</th>
        <th>Boost</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    @foreach ($cars as $car)
    <tr>
        <td>{{ $car->id }}</td>
        <td>{{ $car->name }}</td>
        <td>{{ $car->speed }}</td>
        <td>{{ $car->durability }}</td>
        <td>{{ $car->boost }}</td>
        <td>{{ $car->category->name ?? '-' }}</td>
        <td>
            <a href="{{ route('cars.show', $car->id) }}">View</a> |
            <a href="{{ route('cars.edit', $car->id) }}">Edit</a> |
            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
