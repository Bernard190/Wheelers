@extends('layout')

@section('content')

<section class="position-relative">
    <video autoplay muted loop class="w-100" style="height: 80vh; object-fit: cover;">
        <source src="{{ asset('carvideo.mp4') }}" type="video/mp4">
    </video>

    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: rgba(0,0,0,0.5);"></div>

    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
        <h1 class="fw-bold display-4">{{ __('home.hero_title') }}</h1>
        <p class="lead">{{ __('home.hero_subtitle') }}</p>
    </div>
</section>

<section class="container my-5">
    <h3 class="mb-4 text-center">{{ __('home.trending') }}</h3>

    <div class="row g-4">
        @foreach ($cars as $car)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x200"
                         class="card-img-top"
                         alt="{{ $car->name }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="card-text">{{ $car->short_description }}</p>

                        <ul class="list-unstyled small text-muted mb-3">
                            <li>{{ __('home.spec_speed') }}: {{ $car->speed }}</li>
                            <li>{{ __('home.spec_durability') }}: {{ $car->durability }}</li>
                            <li>{{ __('home.spec_boost') }}: {{ $car->boost }}</li>
                        </ul>

                        <a href="{{ url('/cars/' . $car->id) }}"
                           class="btn btn-dark btn-sm">
                            {{ __('home.view_detail') }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="bg-light py-5">
    <div class="container text-center">
        <h4 class="mb-3">{{ __('home.cta_title') }}</h4>
        <a href="#" class="btn btn-dark btn-lg px-5">
            {{ __('home.cta_button') }}
        </a>
    </div>
</section>

@endsection 