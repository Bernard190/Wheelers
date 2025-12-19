@extends('layout')

@section('content')

<section class="position-relative">
    <video autoplay muted loop class="w-100" style="height: 80vh; object-fit: cover;">
        <source src="{{ asset('carvideo.mp4') }}" type="video/mp4">
    </video>

    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5);"></div>

    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
        <h1 class="fw-bold display-4">{{ __('home.hero_title') }}</h1>
        <p class="lead">{{ __('home.hero_subtitle') }}</p>
    </div>
</section>

<section class="container my-5">
    <h3 class="fw-bold mb-4">{{ __('cars.top') }}</h3>

    <div id="topCategoryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded shadow overflow-hidden">

            @foreach ($topCarsByCategory as $car)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="card border-0 shadow">
                        <div class="row g-0">

                            <div class="col-md-7">
                                <a href="{{ route('car.detail.' . app()->getLocale(), $car->id) }}"
                                   onclick="event.stopPropagation()"
                                   class="d-block h-100">
                                    <img
                                        src="{{ optional($car->images->first())->image_path ?? 'https://via.placeholder.com/1200x500' }}"
                                        class="w-100 h-100"
                                        style="object-fit: cover; min-height: 420px;"
                                        alt="{{ $car->name }}"
                                    >
                                </a>
                            </div>

                            <div class="col-md-5 bg-dark text-white d-flex flex-column p-4">
                                <span class="badge bg-light text-dark mb-2 align-self-start">
                                    {{ $car->category->name }}
                                </span>

                                <h2 class="fw-bold mb-3">{{ $car->name }}</h2>

                                <div class="row text-center mb-3">
                                    <div class="col-4">
                                        <small class="text-muted d-block">Speed</small>
                                        <strong>{{ $car->speed }}</strong>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Durability</small>
                                        <strong>{{ $car->durability }}</strong>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Boost</small>
                                        <strong>{{ $car->boost }}</strong>
                                    </div>
                                </div>

                                <p class="text-light small mb-0">
                                    {{ Str::limit($car->description, 140) }}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <button class="carousel-control-prev" type="button"
                data-bs-target="#topCategoryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button"
                data-bs-target="#topCategoryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<section class="container my-5">
    <h3 class="mb-4 text-center">{{ __('home.trending') }}</h3>

    <div class="row g-4">
        @foreach ($trendingNews as $news)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm d-flex flex-column">
                    <img
                        src="{{ $news->thumbnail ?? 'https://via.placeholder.com/400x200' }}"
                        class="card-img-top"
                        style="height: 200px; object-fit: cover;"
                        alt="{{ $news->title }}"
                    >

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <p class="card-text">{{ $news->short_content }}</p>

                        <a href="{{ route('news.detail.' . app()->getLocale(), $news->id) }}"
                           class="btn btn-dark btn-sm mt-auto align-self-start">
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
