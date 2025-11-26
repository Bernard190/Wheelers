@extends('layout')

@section('content')
<h1>Car Image List</h1>

<a href="{{ route('car_images.create') }}">Add New Image</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Car</th>
        <th>Image Path</th>
        <th>Actions</th>
    </tr>

    @foreach ($images as $img)
    <tr>
        <td>{{ $img->id }}</td>
        <td>{{ $img->car->name }}</td>
        <td>{{ $img->image_path }}</td>
        <td>
            <a href="{{ route('car_images.show', $img->id) }}">View</a> |
            <a href="{{ route('car_images.edit', $img->id) }}">Edit</a> |
            <form action="{{ route('car_images.destroy', $img->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
