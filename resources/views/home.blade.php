{{-- CSS --}}
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/ads.css') }}">

@extends('layouts.app')

@section('title', 'Home')

@section('content')

@include('layouts.navbar')

<div class="container-fluid p-0">
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col p-0">
            {{-- Carousel --}}
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    @foreach ($ads as $index => $ad)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="height: 450px;">
                            <img src="{{ asset('storage/images/ads/'. $ad->image_name) }}" class="d-block w-100" alt="{{ $ad->title }}">
                            <div id="content" class="carousel-caption d-block text-white">
                                <h4>{{ $ad->title }}</h4>
                                <p class="lead text-truncate">{{ $ad->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Carousel end --}}
        </div>
    </div>

    {{-- Recommend --}}
    <section class="pt-5 pb-5" id="my-favorite">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="mb-3">Recommended</h3>
                </div>
                <div class="col-12 p-0 mb-3">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            @php
                                $productsCount = count($products);
                                $itemsCount    = ceil($productsCount / 6);
                            @endphp

                            @for ($i = 0; $i < $itemsCount; $i++)
                                <div class="carousel-item @if ($i === 0) active @endif" id="carousel-recommended-item-{{ $i + 1 }}">
                                    <div class="row g-6 border border-dark-3">
                                        @foreach ($products->skip($i * 6)->take(6) as $product)
                                            <div class="col-xl-2 col-lg-4 col-md-3 col-sm-6 p-0 ps-2">
                                                <div class="card p-2 border-1 rounded-0 h-100">
                                                    @if ($product->productImage->isNotEmpty())
                                                        <img src="{{ asset('storage/images/items/'. $product->productImage->first()->productImages->image) }}" alt="Product Image" class="card-img-top custom-card-img-top">
                                                    @else
                                                        <img src="{{ asset('images/items/no-image.svg') }}" alt="Product Image" class="card-img-top custom-card-img-top">
                                                    @endif

                                                    @auth
                                                        @if ($product->isFavorite())
                                                            <form action="{{ route('favorite.destroy', $product->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-sm shadow-none p-0">
                                                                    <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('favorite.store', $product->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm shadow-none p-0">
                                                                    <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon text-black"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endauth

                                                    <div class="card-body p-2">
                                                        <a href="{{ route('productDetail', $product->id) }}" class="text-decoration-none text-dark">
                                                            <h4 class="card-title mb-0 text-truncate">
                                                                {{ $product->name }}
                                                            </h4>
                                                        </a>

                                                        <div class="d-block">${{ $product->price }}</div>

                                                        <a href="{{ route('seller.profile', $product->seller_id) }}" class="text-decoration-none" style="color: #FF3A3A;">
                                                            {{ $product->seller->last_name }} {{ $product->seller->first_name }}
                                                        </a>

                                                        <ul class="list-group list-group-horizontal align-items-center my-2">
                                                            @for ($j = 0; $j < 5; $j++)
                                                                <li class="list-group-item p-0 border-0">
                                                                    <i class="fa-solid fa-star{{ $j < $product->averageRating ? ' text-warning' : '' }}"></i>
                                                                </li>
                                                            @endfor
                                                            <li class="list-group-item p-0 border-0"><strong>({{ number_format($product->averageRating, 1) }})</strong></li>
                                                        </ul>
                                                        @auth
                                                            @if ($product->isCart())
                                                                <form action="{{ route('customer.updateQty', $product->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PATCH')

                                                                    <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('customer.addToCart', $product->id) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-dark w-100">Add to Cart</button>
                                                                </form>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                @php
                    // Maximum of 5 buttons or total items count
                    $maxButtons = min(5, $itemsCount);
                @endphp
                @for ($j = 0; $j < $maxButtons; $j++)
                    <div class="form-check form-check-inline m-0">
                        <input class="form-check-input" type="radio" name="item-recommended" id="item-recommended-{{ $j + 1 }}" @if ($j === 0) checked @endif>
                    </div>
                @endfor
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
                <div id="carouselFavorites" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $favoritesCount = count($favorites);
                            $itemsCount = ceil($favoritesCount / 6);
                        @endphp

                        @for ($i = 0; $i < $itemsCount; $i++)
                            <div class="carousel-item @if ($i === 0) active @endif" id="carousel-favorites-item-{{ $i + 1 }}">
                                <div class="row g-6 border border-dark-3">
                                    @foreach ($favorites->skip($i * 6)->take(6) as $favorite)
                                        <div class="col-xl-2 col-lg-4 col-md-3 col-sm-6 p-0 ps-2">
                                            @if ($favorite)
                                                <div class="card p-2 border-1 rounded-0 h-100">
                                                    @if ($favorite->productImage->isNotEmpty())
                                                        <img src="{{ asset('storage/images/items/'. $favorite->productImage->first()->productImages->image) }}" alt="Product Image" class="card-img-top custom-card-img-top">
                                                    @else
                                                        <img src="{{ asset('images/items/no-image.svg') }}" alt="Product Image" class="card-img-top custom-card-img-top">
                                                    @endif

                                                    <form action="{{ route('favorite.destroy', $favorite->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm shadow-none p-0">
                                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                                        </button>
                                                    </form>

                                                    <div class="card-body p-2">
                                                        <a href="{{ route('productDetail', $product->id) }}" class="text-decoration-none text-dark">
                                                            <h4 class="card-title mb-0 text-truncate">
                                                                {{ $favorite->name }}
                                                            </h4>
                                                        </a>

                                                        <div class="d-block">${{ $favorite->price }}</div>

                                                        <a href="{{ route('seller.profile', $product->seller_id) }}" class="text-decoration-none" style="color: #FF3A3A;">{{ $favorite->seller->last_name }} {{ $favorite->seller->first_name }}</a>

                                                        <ul class="list-group list-group-horizontal align-items-center my-2">
                                                            @for ($j = 0; $j < 5; $j++)
                                                                <li class="list-group-item p-0 border-0">
                                                                    <i class="fa-solid fa-star{{ $j < $favorite->averageRating ? ' text-warning' : '' }}"></i>
                                                                </li>
                                                            @endfor
                                                            <li class="list-group-item p-0 border-0"><strong>({{ number_format($favorite->averageRating, 1) }})</strong></li>
                                                        </ul>

                                                        @if ($product->isCart())
                                                            <form action="{{ route('customer.updateQty', $product->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')

                                                                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('customer.addToCart', $product->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-dark w-100">Add to Cart</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                @php
                    // max is 5 buttons
                    $maxButtons = min(5, $itemsCount);
                @endphp
                @for ($j = 0; $j < $maxButtons; $j++)
                    <div class="form-check form-check-inline m-0">
                        <input class="form-check-input" type="radio" name="item-favorites" id="item-favorites-{{ $j + 1 }}" @if ($j === 0) checked @endif>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    {{-- Favorite end --}}

    @include('layouts.footer')
</div>

<script src="{{ asset('js/home.js') }}"></script>

@endsection
