@extends('layout')

@section('content')

<section class="py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white mb-0">Category Management</h3>

            <div class="d-flex gap-2">
                <a href="{{ route('cars.index') }}"
                   class="btn btn-outline-light btn-sm px-4">
                    Car Management
                </a>

                <a href="{{ route('news.index') }}"
                   class="btn btn-outline-light btn-sm px-4">
                    News Management
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4"
             style="background:#161a24;color:#e6e8ee;">
            <div class="card-body">
                <h5 class="fw-semibold mb-3">Create Category</h5>

                <form action="{{ route('categories.store') }}" method="POST" class="d-flex gap-3">
                    @csrf
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Category name"
                           required>
                    <button class="btn btn-outline-light px-4">
                        Create
                    </button>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm"
             style="background:#161a24;color:#e6e8ee;">
            <div class="table-responsive">
                <table class="table table-dark table-borderless align-middle mb-0">
                    <thead style="background:#1e2233;">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Name</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr style="border-top:1px solid #23283a;">
                                <td class="ps-4">{{ $category->id }}</td>

                                <td>
                                    <form action="{{ route('categories.update', $category->id) }}"
                                          method="POST"
                                          class="d-flex gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text"
                                               name="name"
                                               value="{{ $category->name }}"
                                               class="form-control form-control-sm"
                                               required>
                                        <button class="btn btn-outline-light btn-sm px-3">
                                            Save
                                        </button>
                                    </form>
                                </td>

                                <td class="text-end pe-4">
                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm px-3">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if($categories->count() === 0)
                            <tr>
                                <td colspan="3"
                                    class="text-center text-secondary py-4">
                                    No categories found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

@endsection
