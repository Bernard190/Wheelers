@extends('layout')

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 88px);">
    <div class="col-md-4">
        <div class="p-4 rounded text-center" style="background:#12141a; border:1px solid rgba(255,255,255,0.08);">

            <img src="{{ asset('Wheelers.png') }}" alt="Wheelers Logo" style="width:200px; margin-bottom:20px;">

            <h1 class="mb-4 fw-semibold">
                {{ __('login.title') }}
            </h1>

            <form method="POST" action="{{ route('login.process', app()->getLocale()) }}">
                @csrf

                @if ($errors->has('login'))
                    <div class="alert alert-danger mb-3">
                        {{ $errors->first('login') }}
                    </div>
                @endif

                <div class="mb-3">
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control bg-dark text-light border-0"
                        placeholder="{{ __('login.email') }}"
                        style="height:48px;"
                        required
                    >
                </div>

                <div class="mb-4">
                    <input
                        type="password"
                        name="password"
                        class="form-control bg-dark text-light border-0"
                        placeholder="{{ __('login.password') }}"
                        style="height:48px;"
                        required
                    >
                </div>

                <button type="submit" class="btn w-100 fw-semibold" style="background:#1f2937; color:#fff; height:48px;">
                    {{ __('login.button') }}
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
