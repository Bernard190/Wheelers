@extends('layout')

@section('content')
<div class="container-fluid p-0">

    <div style="height:75vh; background:#000;">
        <img
            src="{{ asset(optional($car->images->first())->image_path ?? 'https://via.placeholder.com/400x250') }}"
            class="w-100 h-100"
            style="object-fit:cover;"
            alt="{{ $car->name }}"
        >
    </div>

</div>

<div class="container py-5 text-light">

    <h1 class="fw-semibold mb-3" style="letter-spacing:1px;">
        {{ $car->name }}
    </h1>

    <p class="text-secondary col-md-8 mb-5">
        {{ $car->description }}
    </p>

    <div class="row text-center mb-5">
        <div class="col-4">
            <small class="text-secondary d-block mb-1">
                {{ __('car.speed') }}
            </small>
            <span class="fs-4 fw-medium">
                {{ $car->speed ?? '-' }}
            </span>
        </div>
        <div class="col-4">
            <small class="text-secondary d-block mb-1">
                {{ __('car.durability') }}
            </small>
            <span class="fs-4 fw-medium">
                {{ $car->durability ?? '-' }}
            </span>
        </div>
        <div class="col-4">
            <small class="text-secondary d-block mb-1">
                {{ __('car.boost') }}
            </small>
            <span class="fs-4 fw-medium">
                {{ $car->boost ?? '-' }}
            </span>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-outline-light px-4">
        Back
    </a>

</div>
@endsection
