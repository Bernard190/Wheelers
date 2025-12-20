@extends('layout')

@section('content')

<section class="py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white mb-0">News Management</h3>

            <div class="d-flex gap-2">
                <a href="{{ route('cars.index') }}"
                   class="btn btn-outline-light btn-sm px-4">
                    Car Management
                </a>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-outline-light btn-sm px-4">
                    Category Management
                </a>

                <a href="{{ route('news.create') }}"
                   class="btn btn-outline-light btn-sm px-4">
                    Create News
                </a>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($news as $item)
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm"
                         style="background:#161a24;color:#e6e8ee;">

                        <img
                            src="{{ asset($item->image ?? 'news-images/placeholder.jpg') }}"
                            class="card-img-top"
                            style="height:260px;object-fit:cover;"
                        >

                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-semibold mb-2">
                                {{ $item->title }}
                            </h5>

                            <p class="text-secondary small mb-3">
                                {{ Str::limit($item->short_content ?? $item->content, 160) }}
                            </p>

                            <div class="mt-auto d-flex gap-2">
                                <a href="{{ route('news.detail.' . app()->getLocale(), $item->id) }}"
                                   class="btn btn-outline-light btn-sm w-100">
                                    View
                                </a>
                                <a href="{{ route('news.edit', $item->id) }}"
                                   class="btn btn-outline-light btn-sm w-100">
                                    Edit
                                </a>
                                <form action="{{ route('news.destroy', $item->id) }}"
                                      method="POST"
                                      class="w-100">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm w-100">
                                        Delete
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $news->withQueryString()->links('pagination::bootstrap-5') }}
    </div>

    <style>
        .pagination .page-link {
            background-color: transparent !important;
            color: #ffffff !important;
            border: 0;
        }

        .pagination .page-item.active .page-link {
            background-color: transparent !important;
            color: #ffffff !important;
            font-weight: 600;
            text-decoration: underline;
        }

        .pagination .page-item.disabled .page-link {
            background-color: transparent !important;
            color: #6c757d !important;
        }

        .pagination .page-link:hover {
            background-color: transparent !important;
            color: #ffffff !important;
            text-decoration: underline;
        }
    </style>

    </div>
</section>

@endsection
