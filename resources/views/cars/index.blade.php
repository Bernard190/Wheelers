@extends('layout')

@section('content')

<section class="py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white mb-0">Car Management</h3>

            <div class="d-flex gap-2">
                <a href="{{ route('news.index') }}"
                   class="btn btn-outline-light btn-sm px-4">
                    News Management
                </a>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-outline-light btn-sm px-4">
                    Category Management
                </a>

                <a href="{{ route('cars.create') }}"
                   class="btn btn-outline-light btn-sm px-4">
                    Create Car
                </a>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($cars as $car)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm"
                         style="background:#161a24;color:#e6e8ee;">
                        <img
                            src="{{ asset(optional($car->images->first())->image_path ?? 'https://via.placeholder.com/600x400') }}"
                            class="card-img-top"
                            style="height:220px;object-fit:cover;"
                        >

                        <div class="card-body d-flex flex-column">
                            <span class="badge mb-2 align-self-start"
                                  style="background:#23283a;color:#cfd3e0;">
                                {{ $car->category->name ?? '-' }}
                            </span>

                            <h5 class="fw-semibold mb-2">
                                {{ $car->name }}
                            </h5>

                            <div class="row text-center mb-3">
                                <div class="col-4">
                                    <small class="text-secondary d-block">Speed</small>
                                    <strong>{{ $car->speed }}</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-secondary d-block">Durability</small>
                                    <strong>{{ $car->durability }}</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-secondary d-block">Boost</small>
                                    <strong>{{ $car->boost }}</strong>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @foreach($car->images as $img)
                                    <div class="position-relative">
                                        <img
                                            src="{{ asset($img->image_path) }}"
                                            style="width:60px;height:50px;object-fit:cover;border-radius:6px;"
                                        >
                                        <form action="{{ route('car_images.destroy', $img->id) }}"
                                              method="POST"
                                              class="position-absolute top-0 end-0">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm px-1 py-0"
                                                    style="font-size:11px;">
                                                ×
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>

                            <form action="{{ route('car_images.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data"
                                  class="d-flex gap-2 mb-3">
                                @csrf
                                <input type="hidden" name="car_id" value="{{ $car->id }}">
                                <input type="file"
                                       name="image"
                                       class="form-control form-control-sm"
                                       required>
                                <button class="btn btn-outline-light btn-sm">
                                    Upload
                                </button>
                            </form>

                            <div class="mt-auto d-flex gap-2">
                                <a href="{{ route('car.detail.' . app()->getLocale(), $car->id) }}"
                                   class="btn btn-outline-light btn-sm w-100">
                                    View
                                </a>
                                <a href="{{ route('cars.edit', $car->id) }}"
                                   class="btn btn-outline-light btn-sm w-100">
                                    Edit
                                </a>
                                <form action="{{ route('cars.destroy', $car->id) }}"
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

    </div>
</section>

@endsection
