@extends('layout')

@section('content')

<div class="container my-5">

    <div class="card shadow-lg border-0 bg-dark text-light">
        <img src="{{ $news->image ?? 'https://via.placeholder.com/1200x500' }}"
             class="card-img-top"
             style="max-height: 480px; object-fit: cover;"
             alt="{{ $news->title }}">

        <div class="card-body p-5">
            <h1 class="fw-bold mb-3">
                {{ $news->title }}
            </h1>

            <div class="text-secondary mb-4">
                {{ $news->created_at->format('d M Y') }}
            </div>

            <div class="fs-5 lh-lg text-light">
                {!! $news->content !!}
            </div>
        </div>
    </div>
    
        <a href="{{ url('/news/' . app()->getLocale()) }}"
       class="btn btn-outline-light mb-4">
        ← {{ __('news.back') }}
    </a>
</div>

@endsection
