@extends('layout')

@section('content')

<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <h1 class="fw-bold mb-3">{{ $news->title }}</h1>

            <p class="text-muted mb-4">
                {{ $news->created_at->format('d M Y') }}
            </p>

            <img
                src="{{ $news->thumbnail ?? 'https://via.placeholder.com/1200x500' }}"
                class="img-fluid rounded shadow mb-4 w-100"
                style="max-height: 500px; object-fit: cover;"
                alt="{{ $news->title }}"
            >

            <div class="fs-5 lh-lg">
                {!! $news->content !!}
            </div>

            <div class="mt-5">
                <a href="{{ route('news') }}"
                   class="btn btn-outline-dark">
                    ← {{ __('news.back') ?? 'Back to News' }}
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
