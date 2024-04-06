@extends('layouts.app')

@section('title', 'Seller Profile')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ads.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">

    @include('layouts.navbar')
    
    <div class="container-fluid">

        <div class="row mb-5">
            <div class="col p-0">
                {{-- Carousel --}}
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 450px;">
                            <img src="{{ asset('images/ads/ads1.svg') }}" class="d-block w-100" alt="...">
                            <div id="content" class="carousel-caption d-block text-white">
                                <h4>Ads Title</h4>
                                <p class="lead">Description here.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 450px;">
                            <img src="{{ asset('images/ads/ads2.svg') }}" class="d-block w-100" alt="...">
                            <div id="content" class="carousel-caption d-none d-md-block text-white">
                                <h4>Ads Title</h4>
                                <p class="lead">Description here.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 450px;">
                            <img src="{{ asset('images/ads/ads3.svg') }}" class="d-block w-100" alt="...">
                            <div id="content" class="carousel-caption d-none d-md-block text-white">
                                <h4>Ads Title</h4>
                                <p class="lead">Description here.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 450px;">
                            <img src="{{ asset('images/ads/ads4.svg') }}" class="d-block w-100" alt="...">
                            <div id="content" class="carousel-caption d-none d-md-block text-white">
                                <h4>Ads Title</h4>
                                <p class="lead">Description here.</p>
                            </div>
                        </div>
                    </div>
                  </div>
                {{-- Carousel end --}}
            </div>
        </div>

        {{-- Seller Profile --}}
        <div class="row">
            <div class="col-12">
                <div class="row mb-4 mx-auto">
                    @if ($sellerProfile)
                        <div class="col-6">
                            <div class="text-center">
                                @if ($sellerProfile->avatar)
                                    <img src="{{ asset('images/seller/'.$sellerProfile->avatar) }}" class="rounded img-fluid mx-auto d-block" alt="shopImage" style="width: 800px; height: 550px;">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </div>
                        </div>

                        <div class="col-6">

                            <div class="row mx-auto mb-3">
                                <div class="col">
                                    <h4>{{ $sellerProfile->last_name.$sellerProfile->first_name }}</h4>
                                    <p>{{ $sellerProfile->description }}</p>
                                </div>
                            </div>

                            <div class="row mx-auto mb-3">
                                <div class="col">
                                    <h4>Address</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </div>

                            <div class="row mx-auto mb-5">
                                <div class="col">
                                    <h4>Contact Us</h4>
                                    <p>Email : <span>{{ $sellerProfile->email }}</span></p>
                                    <p>Phone Number : <span>{{ $sellerProfile->phone_number }}</span></p>
                                </div>
                            </div>

                        </div>
                    @else
                        <p>No profile.</p>
                    @endif
                </div>
            </div>
        </div>
        {{-- Seller Profile end --}}

        {{-- Seller Products --}}
        <div class="row">
            <div class="col-12">
                <div class="p-3">
                    {{-- Search Results  --}}
                    <h1 class="mb-3">Shop Products List</h1>

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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
                                                <h3>Product Name</h3>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <h4>$50</h4>
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
        </div>
        {{-- Seller Products end --}}

    </div>

    @include('layouts.footer')
@endsection