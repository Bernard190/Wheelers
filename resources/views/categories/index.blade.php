@extends('layout')

@section('content')
<h1>Category List</h1>

<a href="{{ route('categories.create') }}">Create New Category</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td>
            <a href="{{ route('categories.show', $category->id) }}">View</a> |
            <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
