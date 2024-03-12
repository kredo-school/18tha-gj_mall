{{-- Ads CSS --}}
<link rel="stylesheet" href="{{ asset('css/ads.css') }}">

@extends('layouts.app')

@section('title', 'Home')

@section('content')

@include('layouts.navbar')
{{-- Ads --}}
<div class="container-fluid p-0">
    <div class="row">
        <div class="col p-0">
            {{-- Carousel --}}
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 450px;">
                        <img src="{{ asset('images/account/bg-admin.png') }}" class="d-block w-100" alt="...">
                        <div id="content" class="carousel-caption d-block text-white">
                            <h4>Ads Title</h4>
                            <p class="lead">Description here.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 450px;">
                        <img src="{{ asset('images/account/bg-seller.png') }}" class="d-block w-100" alt="...">
                        <div id="content" class="carousel-caption d-none d-md-block text-white">
                            <h4>Ads Title</h4>
                            <p class="lead">Description here.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 450px;">
                        <img src="{{ asset('images/account/bg-customer.png') }}" class="d-block w-100" alt="...">
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

    {{-- Recommend --}}
    <section class="pt-5 pb-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="mb-3">Recommended</h3>
                </div>
                <div class="col-12 p-0 mb-3">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
    
                        <div class="carousel-inner">
                            <div class="carousel-item active" id="carousel-recommended-item-1">
                                <div class="row g-6 border border-dark-3">
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 ps-2">
                                        <div class="card p-2 border-1 rounded-0 h-100">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            {{-- Todo: Change to heart icon and button by conditional --}}
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 pe-2">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- This is second Item  --}}
                            <div class="carousel-item" id="carousel-recommended-item-2">
                                <div class="row g-6 border border-dark-3">
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 ps-2">
                                        <div class="card p-2 border-1 rounded-0 h-100">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            {{-- Todo: Change to heart icon and button by conditional --}}
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 pe-2">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- This is second Item  --}}

                            {{-- This is Third Item  --}}
                            <div class="carousel-item" id="carousel-recommended-item-3">
                                <div class="row g-6 border border-dark-3">
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 ps-2">
                                        <div class="card p-2 border-1 rounded-0 h-100">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://plus.unsplash.com/premium_photo-1675118764485-868de45bf619?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            {{-- Todo: Change to heart icon and button by conditional --}}
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://plus.unsplash.com/premium_photo-1675118764485-868de45bf619?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://plus.unsplash.com/premium_photo-1675118764485-868de45bf619?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 pe-2">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://plus.unsplash.com/premium_photo-1675118764485-868de45bf619?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- This is Third Item  --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="form-check form-check-inline m-0">
                    <input class="form-check-input" type="radio" name="item-recommended" id="item-recommended-1" checked>
                </div>
                <div class="form-check form-check-inline m-0">
                    <input class="form-check-input" type="radio" name="item-recommended" id="item-recommended-2">
                </div>
                <div class="form-check form-check-inline m-0">
                    <input class="form-check-input" type="radio" name="item-recommended" id="item-recommended-3">
                </div>
            </div>
        </div>
    </section>
    {{-- Recommend end --}}

    {{-- Favorite --}}
    <section class="pt-5 pb-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="mb-3">Favorites</h3>
                </div>
                <div class="col-12 p-0 mb-3">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
    
                        <div class="carousel-inner">
                            <div class="carousel-item active" id="carousel-favorites-item-1">
                                <div class="row g-6 border border-dark-3">
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 ps-2">
                                        <div class="card p-2 border-1 rounded-0 h-100">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            {{-- Todo: Change to heart icon and button by conditional --}}
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 pe-2">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- This is second Item  --}}
                            <div class="carousel-item" id="carousel-favorites-item-2">
                                <div class="row g-6 border border-dark-3">
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 ps-2">
                                        <div class="card p-2 border-1 rounded-0 h-100">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            {{-- Todo: Change to heart icon and button by conditional --}}
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 pe-2">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- This is second Item  --}}

                            {{-- This is Third Item  --}}
                            <div class="carousel-item" id="carousel-favorites-item-3">
                                <div class="row g-6 border border-dark-3">
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 ps-2">
                                        <div class="card p-2 border-1 rounded-0 h-100">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://plus.unsplash.com/premium_photo-1675118764485-868de45bf619?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            {{-- Todo: Change to heart icon and button by conditional --}}
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://plus.unsplash.com/premium_photo-1675118764485-868de45bf619?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://plus.unsplash.com/premium_photo-1675118764485-868de45bf619?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-2 col-lg-4 col-md-3  col-xs-1 p-0 pe-2">
                                        <div class="card p-2 border-1 rounded-0">
                                            <img class="card-img-top custom-card-img-top" alt="..." src="https://plus.unsplash.com/premium_photo-1675118764485-868de45bf619?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                            <div class="card-body p-2">
                                                <div class="mt-2 d-flex">
                                                    <div class="flex-fill">
                                                        <h4 class="card-title mb-0">Title</h4>
                                                    </div>
                                                    <div class="flex-fill text-end">$100</div>
                                                </div>
    
                                                <a href="" class="text-decoration-none" style="color: #FF3A3A;">Shop Name</a>
    
                                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                    <li class="list-group-item p-0 border-0">
                                                        <strong>(10)</strong>
                                                    </li>
                                                </ul>
    
                                                <form action="" method="POST">
                                                    @csrf
    
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- This is Third Item  --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="form-check form-check-inline m-0">
                    <input class="form-check-input" type="radio" name="item-favorites" id="item-favorites-1" checked>
                </div>
                <div class="form-check form-check-inline m-0">
                    <input class="form-check-input" type="radio" name="item-favorites" id="item-favorites-2">
                </div>
                <div class="form-check form-check-inline m-0">
                    <input class="form-check-input" type="radio" name="item-favorites" id="item-favorites-3">
                </div>
            </div>
        </div>
    </section>
    {{-- Favorite end --}}

    @include('layouts.footer')
</div>

<script src="{{ asset('js/home.js') }}"></script>

@endsection