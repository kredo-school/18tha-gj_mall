<style>
     #navbar-search.form-control:focus {
        border-color: white; 
        box-shadow: none;
    }

    #navbar-dropdown {
        background-color: #FFD700;
        transition: none !important;
        -webkit-transition: none !important; /* For Safari */
        -moz-transition: none !important; /* For Firefox */
        -o-transition: none !important; /* For Opera */
    }

    /* Remove border and box shadow when dropdown button is clicked */
    #navbar-dropdown:focus,
    #navbar-dropdown:active,
    #navbar-dropdown:hover {
        border-color: transparent !important;
        box-shadow: none !important;
    }

    @media (max-width: 767px) {
        #left-navbar {
            display: none !important;
        }

        #search-bar {
            display: none !important;
        }
    }
</style>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0">
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
                    <a class="nav-link" href="">
                        <div class="row align-items-center">
                            <div class="col-auto px-0">
                                <i class="fa-solid fa-location-dot navbar-icon"></i>
                            </div>
                            <div class="col-10 px-3">
                                <strong class="text-white text-wrap">
                                    Deliver to Japan
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
                    <input type="text" class="form-control rounded-start-2 rounded-end-0" name="search_term" 
                           id="navbar-search" placeholder="What are you looking for ?"
                    >
                </div>
                <div class="col-xl-1 col-lg-1 col-md-3 px-0">
                    <div class="btn-group">
                        <button type="button" id="navbar-dropdown" class="btn dropdown-toggle rounded-start-0 rounded-end-2 style-seet color2" data-bs-toggle="dropdown">
                            All
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Art</a></li>
                            <li><a class="dropdown-item" href="#">Beauty</a></li>
                            <li><a class="dropdown-item" href="#">Clothes</a></li>
                            <li><a class="dropdown-item" href="#">Other</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Search Bar End-->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto align-items-center" style="display: flex; justify-content: space-between;">
                <li class="nav-item text-center">
                    <a href="" class="nav-link">
                        <i class="fa-solid fa-globe navbar-icon"></i>
                        <span class="text-white m-0">EN</span>
                    </a>
                </li>
                
                <li class="nav-item text-center dropdown">
                    <i class="fa-solid fa-user navbar-icon"></i>
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
                                <a class="nav-link dropdown-item" href="">
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
                    <a href="" class="nav-link">
                        <i class="fa-solid fa-heart navbar-icon"></i>
                        <span class="text-white m-0">Favorite</span>
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a href="" class="nav-link">
                        <i class="fa-solid fa-cart-shopping navbar-icon"></i>
                        <span class="text-white m-0">Cart</span>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
</nav>