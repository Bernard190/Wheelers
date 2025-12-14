@extends('layout')

@section('content')
<h1 class="mb-4">{{ __('cars.title') }}</h1>

<div class="row">
    @foreach ($cars as $car)
        <div class="col-sm-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->name }}</h5>
                    <p class="card-text">
                        {{ Str::limit($car->description, 100) }}
                    </p>
                    <a href="{{ route('car.detail.' . app()->getLocale(), $car->id) }}"
                       class="btn btn-primary">
                        {{ __('cars.view') }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
