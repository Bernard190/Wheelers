@extends('layout')

@section('content')

<div class="container my-5">

    <form action="{{ url()->current() }}" method="GET" class="mb-5">
        <div class="input-group">
            <input type="text"
                   name="q"
                   class="form-control"
                   placeholder="{{ __('news.search_placeholder') }}"
                   value="{{ request('q') }}">
            <button class="btn btn-outline-secondary" type="submit">
                {{ __('news.search_button') }}
            </button>
        </div>
    </form>

    @if (!request('q') && $news->currentPage() == 1)

        <div class="mb-5">
            <h3 class="fw-bold mb-4">{{ __('news.trending_news') }}</h3>

            <div class="card shadow-sm border-0">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="{{ $recentTopics->first()->image ?? 'https://via.placeholder.com/700x400' }}"
                             class="w-100 h-100"
                             style="object-fit: cover;"
                             alt="{{ $recentTopics->first()->title }}">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body d-flex flex-column h-100">
                            <h4 class="fw-bold">
                                {{ $recentTopics->first()->title }}
                            </h4>
                            <p class="text-muted">
                                {{ Str::limit(strip_tags($recentTopics->first()->content), 180) }}
                            </p>
                            <a href="{{ route('news.detail.' . app()->getLocale(), $recentTopics->first()->id) }}"
                               class="btn btn-dark mt-auto align-self-start">
                                {{ __('news.read_more') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <h3 class="fw-bold mb-4">{{ __('news.recent_topics') }}</h3>

            <div id="recentTopicsHero" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded shadow-sm overflow-hidden">

                    @foreach ($trending as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="card border-0">
                                <div class="row g-0">
                                    <div class="col-md-7">
                                        <img src="{{ $item->image ?? 'https://via.placeholder.com/800x450' }}"
                                             class="w-100 h-100"
                                             style="object-fit: cover; min-height: 340px;"
                                             alt="{{ $item->title }}">
                                    </div>
                                    <div class="col-md-5 bg-light">
                                        <div class="card-body d-flex flex-column h-100 p-4">
                                            <h4 class="fw-bold">
                                                {{ $item->title }}
                                            </h4>
                                            <p class="text-muted">
                                                {{ Str::limit(strip_tags($item->content), 160) }}
                                            </p>
                                                <a href="{{ route('news.detail.' . app()->getLocale(), $recentTopics->first()->id) }}"
                                                class="btn btn-dark mt-auto align-self-start">
                                                    {{ __('news.read') }}
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <button class="carousel-control-prev" type="button"
                        data-bs-target="#recentTopicsHero" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button"
                        data-bs-target="#recentTopicsHero" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

    @endif

    <div class="mt-5">
        <h3 class="fw-bold mb-4">{{ __('news.all_news') }}</h3>

        <div class="row g-4">
            @foreach ($news as $item)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $item->image ?? 'https://via.placeholder.com/400x250' }}"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="{{ $item->title }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-semibold">
                                {{ $item->title }}
                            </h5>
                            <p class="text-muted small">
                                {{ Str::limit(strip_tags($item->content), 90) }}
                            </p>
                            <a href="{{ route('news.detail.' . app()->getLocale(), $recentTopics->first()->id) }}"
                               class="btn btn-dark mt-auto align-self-start">
                                {{ __('news.read') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $news->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>

</div>

@endsection
