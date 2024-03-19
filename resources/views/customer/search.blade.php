@extends('layouts.app')

@section('title', 'Search Products')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    
    @include('layouts.navbar')

    {{-- content  --}}
    <div class="container-fluid vh-100">
        {{-- Search Bar Header  --}}
        <div class="row align-items-center" id="search_bar_header">
            <div class="col">
                <strong class="search-header text-truncate">1-48 over 2,000 results for <span id="extra-font">“kimono”</span></strong>
            </div>

            <div class="col-auto d-sm-none d-md-block d-none d-sm-block">
                {{-- Check: Might be necessary to fix dropdown when we create back-end --}}
                <div class="dropdown">
                    <button class="btn style-seet color2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by: Category
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item">Art</a></li>
                        <li><a class="dropdown-item">Beauty</a></li>
                        <li><a class="dropdown-item">Clothes</a></li>
                    </ul>
                </div>
            </div>      

            <div class="col-auto d-sm-none d-md-block d-none d-sm-block">
                {{-- Check: Might be necessary to fix dropdown when we create back-end --}}
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by: Featured
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item">Price: Low to High</a></li>
                        <li><a class="dropdown-item">Price: High to Low</a></li>
                        <li><a class="dropdown-item">Newest Arrivals</a></li>
                    </ul>
                </div>
            </div>          
        </div>
        {{-- Search Bar Header End --}}

        <div class="p-3">
            {{-- Search Results  --}}
            <h1 class="fw-bold">Results</h1>

            {{-- item --}}
            <div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-xs-1 g-3 mb-5" id="card-row">
                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" id="card-item">
                        <img src="https://images.unsplash.com/photo-1710185220451-53c7a9b00a78?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="product image">
                        <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url('/productDetail') }}" class="text-decoration-none text-dark">
                                        <h1 class="h3">Product Name</h1>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <h2 class="h4">$50</h2>
                                </div>
                            </div>
                        
                            <a href="{{ url('/seller/profile') }}" class="text-muted text-decoration-none">Shop Name</a>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <strong>(25)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Search Results End --}}
        </div>

        {{-- Todo: Pagination Here  --}}
    </div>
    {{-- content end --}}

    @include('layouts.footer')
@endsection