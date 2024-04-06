<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
    <div class="container-fluid">
        <div class="row">
            {{-- sidebar  --}}
            <div class="col-3">
                <div class="sidebar">
                    <a href="{{ url('/home') }}">
                        <img src="{{ asset('images/common/logo.svg')}}">
                    </a>
                    <nav class="sidebar-nav">
                        @if (request()->is('admin/*'))
                            <ul class="list-group rounded-0 ps-3">
                                {{-- Start Dashboard --}}
                                <li class="list-group-item border-0 mt-4">
                                    <div class="row align-items-center">
                                        <div class="col-2 {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active': '' }}">
                                            <i class="fa-solid fa-chess-board sidebar_icon me-3"></i>
                                        </div>
                                        <div class="col {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active': '' }}">
                                            <a href="{{ url('/admin/dashboard') }}" class="text-decoration-none dashboard">
                                                Dashboard
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                {{-- End Dashboard --}}

                                {{-- Start Profile --}}
                                <li class="list-group-item border-0 mt-4 ">
                                    <div class="row align-items-center">
                                        <div class="col-2 {{ request()->is('admin/managementUser') || request()->is('admin/managementUser') ? 'active': '' }}">
                                            <i class="fa-solid fa-users-gear"></i>
                                        </div>
                                        <div class="col {{ request()->is('admin/managementUser') || request()->is('admin/managementUser') ? 'active': '' }}">
                                            <a href="{{ url('/admin/managementUser') }}" class="text-decoration-none management_user">
                                                Management User
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                {{-- End Profile --}}
                                
                                {{-- Start Delivery Status --}}
                                <li class="list-group-item border-0 mt-4">
                                    <div class="row align-items-center">
                                        <div class="col-2 {{ request()->is('admin/delivery') || request()->is('admin/delivery') ? 'active': '' }}">
                                            <i class="fa-solid fa-truck sidebar_icon me-3"></i>
                                        </div>
                                        <div class="col {{ request()->is('admin/delivery') || request()->is('admin/delivery') ? 'active': '' }}">
                                            <a href="{{ url('/admin/delivery') }}" class="text-decoration-none delivery">
                                                Delivery Status
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                {{-- End Delivery Status --}}

                                {{-- Start Evaluation --}}
                                <li class="list-group-item border-0 mt-4">
                                    <div class="row align-items-center">
                                        <div class="col-2  {{ request()->is('admin/evaluation') || request()->is('admin/evaluation') ? 'active': '' }}">
                                            <i class="fa-solid fa-check-double sidebar_icon me-3"></i>
                                        </div>
                                        <div class="col {{ request()->is('admin/evaluation') || request()->is('admin/evaluation') ? 'active': '' }}">
                                            <a href="{{ url('/admin/evaluation') }}" class="text-decoration-none evaluation">
                                                Evaluation
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                {{-- End Evaluation --}}

                                {{-- Start Customer Support --}}
                                <li class="list-group-item border-0 mt-4">
                                    <div class="row align-items-center">
                                        <div class="col-2 {{ request()->is('admin/customerSupport') || request()->is('admin/customerSupport') ? 'active': '' }}">
                                            <i class="fa-solid fa-headset sidebar_icon me-3"></i>
                                        </div>
                                        <div class="col {{ request()->is('admin/customerSupport') || request()->is('admin/customerSupport') ? 'active': '' }}">
                                            <a href="{{ url('/admin/customerSupport') }}" class="text-decoration-none customerSupport">
                                                Customer Support
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                {{-- End Customer Support --}}

                                {{-- Start Logout --}}
                                <li class="list-group-item border-0 mt-4">
                                    <div class="row align-items-center">
                                        <div class="col-2">
                                            <i class="fa-solid fa-right-from-bracket sidebar_icon me-3"></i>
                                        </div>
                                        <div class="col">
                                            <a class="text-decoration-none text-secondary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                {{-- End Logout --}}                            
                            </ul>

                        @endif
                    </nav>
                </div>
            </div>
            {{-- sidebar  --}}

            {{-- content  --}}
            <div class="col">
                <main>
                    @yield('content')
                </main>
            </div>
            {{-- content  --}}
        </div>
    </div>
</body>
</html>
