{{-- Navbar CSS --}}
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar navbar-expand-md navbar-light sticky-top bg-white shadow-sm p-0">
    <div class="container-fluid style-seet color1 pt-2">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/common/Logo.png') }}" alt="logo" style="width: 50px; height:50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul id="left-navbar" class="navbar-nav me-4">
                <li class="nav-item">
                    <a class="nav-link">
                        <div class="row align-items-center">
                            <div class="col-2 px-0">
                                <span class="fi fi-ph border"></span>
                            </div>
                            <div class="col-10 p-2">
                                <strong class="text-white">
                                    Deliver to Philippines   
                                </strong>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- Left Side Of Navbar End-->

            <!-- Search Bar-->
            <div id="search-bar" class="row align-items-center w-75">
                <div class="col-xl-11 col-lg-9 col-md-9 px-0">
                    <input type="text" class="form-control rounded-1" name="search_term" 
                           id="navbar-search" placeholder="What are you looking for ?">
                </div>
            </div>
            <!-- Search Bar End-->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto align-items-center" style="display: flex; justify-content: space-between;">
                <li class="nav-item text-center">
                    <a href="" class="nav-link">
                        <i class="fa-solid fa-globe icon"></i>
                        <span class="text-white m-0">EN</span>
                    </a>
                </li>
                
                <li class="nav-item text-center dropdown">
                    <i class="fa-solid fa-user icon"></i>
                    <a id="navbarDropdown" class="d-inline nav-link text-white p-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Account
                    </a>
                
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-link dropdown-item" href="{{ route('login') }}">
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Login') }}
                                </a>
                            @endif

                            @if (Route::has('login'))
                                <a class="nav-link dropdown-item" href="{{ url('/customer/profile') }}">
                                    <i class="fa-solid fa-gear"></i> {{ __('Setting') }}
                                </a>
                            @endif
                        @else
                            <a class="nav-link dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>                
                        @endguest
                    </div>
                </li>
               
                <li class="nav-item text-center">
                    <a href="{{ url('/home#my-favorite') }}" class="nav-link">
                        <i class="fa-solid fa-heart icon"></i>
                        <span class="text-white m-0">Favorite</span>
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a href="{{ url('/customer/cart') }}" class="nav-link">
                        <i class="fa-solid fa-cart-shopping icon"></i>
                        <span class="text-white m-0">Cart</span>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
</nav>