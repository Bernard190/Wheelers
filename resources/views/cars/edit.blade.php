@extends('layout')

@section('content')

<div class="container-fluid p-0">

    <div style="height:75vh;background:#000;">
        <img
            src="{{ asset(optional($car->images->first())->image_path ?? 'https://via.placeholder.com/1600x900') }}"
            class="w-100 h-100"
            style="object-fit:cover;"
            alt="{{ $car->name }}"
        >
    </div>

</div>

<div class="container py-5 text-light">

    <h1 class="fw-semibold mb-4" style="letter-spacing:1px;">
        Edit Car
    </h1>

    <form action="{{ route('cars.update', $car->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="col-md-8">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label text-secondary">Car Name</label>
            <input type="text"
                   name="name"
                   value="{{ $car->name }}"
                   class="form-control bg-dark text-light border-0"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label text-secondary">Description</label>
            <textarea name="description"
                      rows="4"
                      class="form-control bg-dark text-light border-0"
                      required>{{ $car->description }}</textarea>
        </div>

        <div class="row mb-4 text-center">
            <div class="col-4">
                <label class="form-label text-secondary d-block mb-1">
                    {{ __('car.speed') }}
                </label>
                <input type="number"
                       name="speed"
                       value="{{ $car->speed }}"
                       class="form-control bg-dark text-light border-0 text-center"
                       required>
            </div>
            <div class="col-4">
                <label class="form-label text-secondary d-block mb-1">
                    {{ __('car.durability') }}
                </label>
                <input type="number"
                       name="durability"
                       value="{{ $car->durability }}"
                       class="form-control bg-dark text-light border-0 text-center"
                       required>
            </div>
            <div class="col-4">
                <label class="form-label text-secondary d-block mb-1">
                    {{ __('car.boost') }}
                </label>
                <input type="number"
                       name="boost"
                       value="{{ $car->boost }}"
                       class="form-control bg-dark text-light border-0 text-center"
                       required>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label text-secondary">Category</label>
            <select name="category_id"
                    class="form-select bg-dark text-light border-0"
                    required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $car->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label text-secondary">Replace Image</label>
            <input type="file"
                   name="image"
                   class="form-control bg-dark text-light border-0">
        </div>

        <div class="d-flex gap-3">
            <button type="submit"
                    class="btn btn-outline-light px-5">
                Update
            </button>
            <a href="{{ url()->previous() }}"
               class="btn btn-outline-secondary px-5">
                Back
            </a>
        </div>

    </form>

</div>

@endsection
