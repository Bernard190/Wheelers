@extends('layout')

@section('content')
<div class="container">

    @if ($topCars->count())
        <h4 class="fw-bold mb-3">{{ __('cars.top') }}</h4>

        <div id="topCarsCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner rounded shadow overflow-hidden">

                @foreach ($topCars as $index => $car)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="position-relative">

                            <a href="{{ route('car.detail.' . app()->getLocale(), $car->id) }}"
                               onclick="event.stopPropagation()"
                               class="d-block">
                                <img
                                    src="{{ optional($car->images->first())->image_path ?? 'https://via.placeholder.com/1200x500' }}"
                                    class="d-block w-100"
                                    style="height: 420px; object-fit: cover;"
                                    alt="{{ $car->name }}"
                                >
                            </a>

                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end"
                                 style="background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); pointer-events: none;">
                                <div class="p-4">
                                    <h2 class="text-white fw-bold mb-0">
                                        {{ $car->name }}
                                    </h2>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <button class="carousel-control-prev" type="button"
                    data-bs-target="#topCarsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button"
                    data-bs-target="#topCarsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    @endif

    <h1 class="mb-4 fw-bold">{{ __('cars.title') }}</h1>

    <div class="mb-4">
        <form method="GET" action="{{ url()->current() }}" class="d-flex">
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                class="form-control rounded-start"
                placeholder="{{ __('cars.search') }}"
            >

            <select name="category" class="form-select border-start-0">
                <option value="">{{ __('cars.all_categories') }}</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-dark text-white rounded-end">
                Filter
            </button>

            @if (request()->filled('q') || request()->filled('category'))
                <a href="{{ url()->current() }}" class="btn btn-outline-secondary ms-2">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <span class="text-muted small">
            Showing {{ $cars->count() }} of {{ $cars->total() }} cars
        </span>
    </div>

    <div class="row">
        @foreach ($cars as $car)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img
                        src="{{ optional($car->images->first())->image_path ?? 'https://via.placeholder.com/400x250' }}"
                        class="card-img-top"
                        alt="{{ $car->name }}"
                    >
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-1">{{ $car->name }}</h5>
                        <p class="text-uppercase text-muted small mb-2">
                            {{ $car->category->name ?? '-' }}
                        </p>
                        <p class="card-text text-muted small">
                            {{ Str::limit($car->description, 80) }}
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a
                            href="{{ route('car.detail.' . app()->getLocale(), $car->id) }}"
                            class="btn btn-dark text-white w-100"
                        >
                            {{ __('cars.view') }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $cars->withQueryString()->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
