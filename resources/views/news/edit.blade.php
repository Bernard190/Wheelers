@extends('layout')

@section('content')

<div class="container my-5">

    <form action="{{ route('news.update', $news->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card shadow-lg border-0 bg-dark text-light">

            <div style="height:480px;background:#000;">
                <img
                    src="{{ $news->image ?? 'https://via.placeholder.com/1200x500' }}"
                    class="w-100 h-100"
                    style="object-fit:cover;"
                >
            </div>

            <div class="card-body p-5">

                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold">
                        Title
                    </label>
                    <input
                        type="text"
                        name="title"
                        class="form-control bg-dark border-0 text-light fs-4 fw-bold"
                        value="{{ old('title', $news->title) }}"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold">
                        Content
                    </label>
                    <textarea
                        name="content"
                        rows="12"
                        class="form-control bg-dark border-0 text-light fs-5"
                        required
                    >{{ old('content', $news->content) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold">
                        Image
                    </label>
                    <input
                        type="file"
                        name="image"
                        class="form-control bg-dark border-0 text-light"
                    >
                </div>

                <div class="d-flex gap-3">
                    <button type="submit"
                            class="btn btn-outline-light px-5">
                        Update
                    </button>

                    <a href="{{ url('/news/' . app()->getLocale()) }}"
                       class="btn btn-outline-secondary px-4">
                        Back
                    </a>
                </div>

            </div>
        </div>

    </form>

</div>

@endsection
