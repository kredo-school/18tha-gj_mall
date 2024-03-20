<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Font Awsome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Sidebar CSS & main css --}}
    <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="app-body">
        <div class="sidebar">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/common/Logo.png')}}">
            </a>
            <nav class="sidebar-nav">
                <ul class="nav-item mt-4">
                    <a href="{{ url('/seller/dashboard') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-chess-board"></i> Dashboard</a>
                </ul>

                <ul class="nav-item mt-4">
                    <a href="{{ url('/seller/profile/editProfile') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-user"></i> Profile</a>
                </ul>

                <ul class="nav-item mt-4">
                    <a href="{{ url('/seller/products/dashboard') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-shirt"></i> Products Dashboard</a>
                </ul>

                <ul class="nav-item mt-4">
                    <a href="{{ url('/seller/ads/dashboard') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-newspaper"></i> Ads Dashboard</a>
                </ul>

                <ul class="nav-item mt-4">
                    <a href="{{ url('/seller/delivery') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-truck"></i> Delivery Status</a>
                </ul>

                <ul class="nav-item mt-4">
                    <a href="{{ url('/seller/evaluation') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-check-double"></i> Evaluation</a>
                </ul>

                <ul class="nav-item mt-4">
                    <a href="{{ url('/seller/customerSupport') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-headset"></i> Customer Support</a>
                </ul>

                <ul class="nav-item mt-4">
                    {{-- logout --}}
                    <a class="text-decoration-none text-dark" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </nav>
        </div>
         <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
