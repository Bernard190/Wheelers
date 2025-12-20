@extends('layout')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');

body {
    background-color: #0c0f16;
    font-family: 'Montserrat', sans-serif;
}

h1, h2, h3, h4, h5 {
    letter-spacing: 0.3px;
}

.text-soft {
    color: #b8bcc8;
}

.ui-card {
    background: #161a24;
    color: #e6e8ee;
}
</style>

<section class="position-relative overflow-hidden">
    <video autoplay muted loop class="w-100" style="height: 90vh; object-fit: cover;">
        <source src="{{ asset('carvideo.mp4') }}" type="video/mp4">
    </video>

    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: linear-gradient(180deg, rgba(8,10,18,0.55), rgba(8,10,18,0.9));"></div>

    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
        <img src="{{ asset('Wheelers.png') }}"
             alt="Wheelers"
             style="max-width: 380px;"
             class="mb-4">

        <h1 class="fw-bold display-5 mb-2">{{ __('home.hero_title') }}</h1>
        <p class="lead text-soft mb-0">{{ __('home.hero_subtitle') }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h3 class="fw-bold mb-4 text-white">{{ __('cars.top') }}</h3>

        <div id="topCategoryCarousel" class="carousel slide">
            <div class="carousel-inner rounded-4 overflow-hidden shadow-lg">

                @foreach ($topCarsByCategory as $car)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row g-0 ui-card">

                            <div class="col-lg-8">
                                <a href="{{ route('car.detail.' . app()->getLocale(), $car->id) }}"
                                   class="d-block h-100">
                                    <img
                                        src="{{ asset(optional($car->images->first())->image_path ?? 'https://via.placeholder.com/1400x700') }}"
                                        class="w-100 h-100"
                                        style="object-fit: cover; min-height: 460px;"
                                        alt="{{ $car->name }}"
                                    >
                                </a>
                            </div>

                            <div class="col-lg-4 d-flex flex-column p-4 p-lg-5">
                                <span class="badge mb-3 align-self-start"
                                      style="background:#23283a;color:#cfd3e0;">
                                    {{ $car->category->name }}
                                </span>

                                <h2 class="fw-bold mb-3">{{ $car->name }}</h2>

                                <div class="row text-center mb-4">
                                    <div class="col-4">
                                        <small class="text-soft d-block">Speed</small>
                                        <strong>{{ $car->speed }}</strong>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-soft d-block">Durability</small>
                                        <strong>{{ $car->durability }}</strong>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-soft d-block">Boost</small>
                                        <strong>{{ $car->boost }}</strong>
                                    </div>
                                </div>

                                <p class="text-soft small mb-0">
                                    {{ Str::limit($car->description, 140) }}
                                </p>
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
    </div>
</section>

<section class="py-5" style="background:#101420;">
    <div class="container">
        <h3 class="text-center text-white fw-semibold mb-5">
            {{ __('home.trending') }}
        </h3>

        <div class="row g-4">
            @foreach ($trendingNews as $news)
                <div class="col-md-4">
                    <div class="card h-100 border-0 ui-card shadow-sm">
                        <img
                            src="{{ asset(ltrim($news->image ?? 'news-images/placeholder.jpg', '/')) }}"

                            class="card-img-top"
                            style="height: 210px; object-fit: cover;"
                            alt="{{ $news->title }}"
                        >

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold mb-2">{{ $news->title }}</h5>
                            <p class="small text-soft mb-3">
                                {{ $news->short_content }}
                            </p>

                            <a href="{{ route('news.detail.' . app()->getLocale(), $news->id) }}"
                               class="btn btn-outline-light btn-sm mt-auto px-4">
                                {{ __('home.view_detail') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-5" style="background:#0c0f16;">
    <div class="container text-center text-white">
        <h4 class="fw-semibold mb-4">{{ __('home.cta_title') }}</h4>
        <a href="https://archive.org/details/1100_wheelers"
           class="btn btn-outline-light btn-lg px-5 fw-semibold"
           target="_blank" rel="noopener">
            {{ __('home.cta_button') }}
        </a>
    </div>
</section>

@endsection
