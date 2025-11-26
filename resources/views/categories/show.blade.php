@extends('layout')

@section('content')
<h1>Category Details</h1>

<p><strong>Name:</strong> {{ $category->name }}</p>
<p><strong>Description:</strong> {{ $category->description }}</p>

<a href="{{ route('categories.index') }}">Back</a>
@endsection
