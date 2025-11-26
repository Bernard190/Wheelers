@extends('layout')

@section('content')
<h1>Car Detail (ID: {{ $id }})</h1>

<img src="https://via.placeholder.com/400x200" alt="Car Image">

<p><strong>Name:</strong> Car {{ $id }}</p>
<p><strong>Description:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

<div>
    <p>Speed: ████████</p>
    <p>Durability: █████</p>
    <p>Boost: ████</p>
</div>
@endsection
