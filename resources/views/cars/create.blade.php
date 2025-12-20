@extends('layout')

@section('content')

<section class="py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white mb-0">Create Car</h3>
            <a href="{{ route('cars.index') }}"
               class="btn btn-outline-light btn-sm px-4">
                Back
            </a>
        </div>

        <div class="card border-0 shadow-sm mx-auto"
             style="max-width:760px;background:#161a24;color:#e6e8ee;">
            <div class="card-body p-4">

                <form action="{{ route('cars.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label text-secondary">Car Name</label>
                        <input type="text"
                               name="name"
                               class="form-control bg-dark text-light border-0"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Description</label>
                        <textarea name="description"
                                  rows="4"
                                  class="form-control bg-dark text-light border-0"
                                  required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label text-secondary">Speed</label>
                            <input type="number"
                                   name="speed"
                                   class="form-control bg-dark text-light border-0"
                                   required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-secondary">Durability</label>
                            <input type="number"
                                   name="durability"
                                   class="form-control bg-dark text-light border-0"
                                   required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-secondary">Boost</label>
                            <input type="number"
                                   name="boost"
                                   class="form-control bg-dark text-light border-0"
                                   required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Category</label>
                        <select name="category_id"
                                class="form-select bg-dark text-light border-0"
                                required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-secondary">Car Image</label>
                        <input type="file"
                               name="image"
                               class="form-control bg-dark text-light border-0"
                               required>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit"
                                class="btn btn-outline-light px-5">
                            Save
                        </button>
                        <a href="{{ route('cars.index') }}"
                           class="btn btn-outline-secondary px-5">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>

@endsection
