<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wheelers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #0b0d12;
            color: #e6e6e6;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        .navbar {
            height: 88px;
            background: linear-gradient(to bottom, rgba(10,10,15,0.98), rgba(10,10,15,0.85));
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-size: 1.65rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #ffffff;
        }

        .navbar-nav .nav-link {
            font-size: 1.05rem;
            font-weight: 500;
            color: #d6d6d6;
            padding: 0.75rem 1.25rem;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: #ffffff;
        }

        .lang-toggle {
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 22px;
            padding: 6px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            margin-right: 16px;
        }

        .lang-toggle:hover {
            background: rgba(255,255,255,0.15);
            color: #fff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-5">

        <a class="navbar-brand" href="{{ app()->getLocale() === 'id' ? url('/home/id') : url('/home/en') }}">
            <img src="{{ asset('Wheelers.png') }}" alt="Wheelers" height="64">
        </a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="mainNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('home/*') ? 'active' : '' }}"
                       href="{{ app()->getLocale() === 'id' ? url('/home/id') : url('/home/en') }}">
                        {{ __('navbar.home') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('news/*') ? 'active' : '' }}"
                       href="{{ app()->getLocale() === 'id' ? url('/news/id') : url('/news/en') }}">
                        {{ __('navbar.news') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cars/*') ? 'active' : '' }}"
                       href="{{ app()->getLocale() === 'id' ? url('/cars/id') : url('/cars/en') }}">
                        {{ __('navbar.cars') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('support/*') ? 'active' : '' }}"
                       href="{{ app()->getLocale() === 'id' ? url('/support/id') : url('/support/en') }}">
                        {{ __('navbar.support') }}
                    </a>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav align-items-center">
            <li class="nav-item">
                <a class="lang-toggle"
                   href="{{ str_replace('/' . app()->getLocale(), '/' . (app()->getLocale() === 'id' ? 'en' : 'id'), request()->getRequestUri()) }}">
                    {{ app()->getLocale() === 'id' ? 'EN' : 'ID' }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('login/*') ? 'active' : '' }}"
                   href="{{ app()->getLocale() === 'id' ? url('/login/id') : url('/login/en') }}">
                    {{ __('navbar.login') }}
                </a>
            </li>
        </ul>

    </div>
</nav>

<div style="padding-top: 88px;">
    @yield('content')
</div>

<footer class="bg-dark pt-4 border-top border-secondary">
    <div class="container text-center">
        <div class="mb-3">
            <img src="{{ asset('Wheelers.png') }}"
                 alt="Wheelers"
                 class="img-fluid"
                 style="height:70px;">
        </div>
        <div class="border-top border-secondary pt-3">
            <small class="text-white">
                © 2025 <strong>Wheelers Studio</strong>. All Rights Reserved.<br>
                All manufacturers, brands, and logos are trademarks of their respective owners.
            </small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
