@extends('layout')

@section('content')
<h1>Create Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name">

    <br>

    <label>Description:</label>
    <textarea name="description"></textarea>

    <br><br>

    <button type="submit">Save</button>
</form>
@endsection
