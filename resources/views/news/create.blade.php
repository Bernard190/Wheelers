@extends('layout')

@section('content')

<section class="py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white mb-0">Create News</h3>
            <a href="{{ route('news.index') }}"
               class="btn btn-outline-light btn-sm px-4">
                Back
            </a>
        </div>

        <form action="{{ route('news.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="card border-0 shadow-sm"
              style="background:#161a24;color:#e6e8ee;">

            @csrf

            <div class="card-body">

                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold">
                        Title
                    </label>
                    <input
                        type="text"
                        name="title"
                        class="form-control bg-dark border-0 text-light"
                        value="{{ old('title') }}"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold">
                        Short Description
                    </label>
                    <textarea
                        name="short_content"
                        rows="3"
                        class="form-control bg-dark border-0 text-light"
                    >{{ old('short_content') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold">
                        Content
                    </label>
                    <textarea
                        name="content"
                        rows="8"
                        class="form-control bg-dark border-0 text-light"
                        required
                    >{{ old('content') }}</textarea>
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

                <div class="d-flex gap-2">
                    <button type="submit"
                            class="btn btn-outline-light px-5">
                        Publish
                    </button>
                </div>

            </div>

        </form>

    </div>
</section>

@endsection
