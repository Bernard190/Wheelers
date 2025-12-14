@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="mb-4 text-center">{{ __('login.title') }}</h1>

            <form method="POST" action="#">
                @csrf

                <div class="mb-3">
                    <input
                        type="email"
                        class="form-control"
                        placeholder="{{ __('login.email') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <input
                        type="password"
                        class="form-control"
                        placeholder="{{ __('login.password') }}"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    {{ __('login.button') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
