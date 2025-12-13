@extends('layout')

@section('content')

    <div class="container my-5">
    <form action="{{ url('/news') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text"
                   name="q"
                   class="form-control"
                   placeholder="Search news..."
                   value="{{ request('q') }}">

            <button class="btn btn-outline-secondary" type="submit">
                Search
            </button>
        </div>
    </form>

    <div class="mb-5">
        <h3 class="mb-3">Recent Topics</h3>

        <div class="row g-3">
            @foreach ($recentTopics as $topic)
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200"
                            class="card-img-top"
                            alt="{{ $topic->name }}">

                        <div class="card-body text-center">
                            <h6 class="card-title mb-2">
                                {{ $topic->name }}
                            </h6>
                            <a href="{{ url('/cars/' . $topic->id) }}"
                            class="btn btn-outline-dark btn-sm">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div>
        <h3 class="mb-4">Trending News</h3>

        <div class="row g-4">
            @if ($cars->first())
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/600x350"
                         class="card-img-top"
                         alt="{{ $cars->first()->name }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $cars->first()->name }}</h5>
                        <p class="card-text">
                            {{ Str::limit($cars->first()->description, 150) }}
                        </p>
                        <a href="{{ url('/cars/' . $cars->first()->id) }}"
                           class="btn btn-dark btn-sm">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-6">
                <div class="row g-4">
                    @foreach ($cars->skip(1)->take(2) as $car)
                        <div class="col-12">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-5">
                                        <img src="https://via.placeholder.com/300x200"
                                             class="img-fluid rounded-start"
                                             alt="{{ $car->name }}">
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $car->name }}</h6>
                                            <p class="card-text small text-muted">
                                                {{ Str::limit($car->description, 80) }}
                                            </p>
                                            <a href="{{ url('/cars/' . $car->id) }}"
                                               class="btn btn-outline-dark btn-sm">
                                                Read
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($cars->count() === 0)
                        <div class="col-12">
                            <div class="alert alert-secondary text-center">
                                No results found.
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>

@endsection