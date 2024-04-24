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
                @forelse ($sellerProducts as $product)
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($product->ads as $ad)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 450px;">
                                    <img src="{{ asset('storage/images/ads/' . $ad->image_name) }}"
                                        class="d-block w-100 h-100" alt="Ad Image" style="object-fit: cover">
                                    <div id="content" class="carousel-caption d-block text-white">
                                        <h4>{{ $ad->title }}</h4>
                                        <p class="lead text-truncate">{{ $ad->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <h1>No Advertisment yet.</h1>
                @endforelse
                {{-- Carousel end --}}
            </div>
        </div>

        {{-- Seller Profile --}}
        <div class="row">
            <div class="col-12">
                <div class="row mb-4 mx-auto">

                    <div class="col-6">
                        <div class="text-center">
                            @if ($sellerProfile->avatar)
                                <img src="{{ asset('storage/images/sellers/' . $sellerProfile->avatar) }}"
                                    class="rounded img-fluid mx-auto d-block" alt="shopImage"
                                    style="width: 800px; height: 550px;">
                            @else
                                <img src="{{ asset('images/seller/shopImg.svg') }}"
                                    class="rounded img-fluid mx-auto d-block" alt="shopImage"
                                    style="width: 800px; height: 550px;">
                            @endif
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="row mx-auto mb-3">
                            <div class="col">
                                <h4>{{ $sellerProfile->last_name }} {{ $sellerProfile->first_name }}</h4>
                                <p>{{ $sellerProfile->description }}</p>
                            </div>
                        </div>

                        <div class="row mx-auto mb-3">
                            <div class="col">
                                <h4>Address</h4>
                                <p>
                                    {{ $sellerProfile?->address?->street_number }}
                                    {{ $sellerProfile?->address?->address_line1 }}, {{ $sellerProfile?->address?->city }},
                                    {{ $sellerProfile?->address?->postal_code }},
                                    {{ $sellerProfile?->address?->country->name }}
                                </p>
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

                </div>
            </div>
        </div>
        {{-- Seller Profile end --}}

        {{-- Seller Products --}}
        <div class="row">
            <div class="col-12">
                <div class="p-3">
                    <h1 class="mb-3">Shop Products List</h1>

                    <div class="row row-cols-xxl-auto row-cols-lg-auto row-cols-md-auto row-cols-xs-1 g-3 mb-5"
                        id="card-row">
                        @forelse ($sellerProducts as $item)
                            <div class="col">
                                <div class="card h-100" id="card-item">
                                    @if ($item->productImage->isNotEmpty())
                                        <img src="{{ asset('storage/images/items/' . $item->productImage->first()->productImages->image) }}"
                                            class="card-img-top" alt="{{ $item->name }}">
                                    @else
                                        <img src="{{ asset('images/items/no-image.svg') }}" alt="Product Image"
                                            class="card-img-top">
                                    @endif

                                    @auth
                                        @if ($item->isFavorite())
                                            <form action="{{ route('favorite.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm shadow-none p-0">
                                                    <i
                                                        class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('favorite.store', $item->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm shadow-none p-0">
                                                    <i
                                                        class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('productDetail', $item->id) }}"
                                                    class="text-decoration-none text-dark">
                                                    <h3 class="text-truncate">{{ $item->name }}</h3>
                                                </a>
                                            </div>
                                        </div>

                                        <h4>${{ $item->price }}</h4>

                                        <ul class="list-group list-group-horizontal align-items-center my-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                <li class="list-group-item p-0 border-0">
                                                    <i
                                                        class="fa-solid fa-star{{ $i < $item->averageRating ? ' text-warning' : '' }}"></i>
                                                </li>
                                            @endfor
                                            <li class="list-group-item p-0 border-0">
                                                <strong>({{ $item->totalReviews }})</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <img src="{{ asset('images/common/noResults.svg') }}" alt="No Results" class="center">
                        @endforelse
                    </div>
                </div>

                {{-- Todo: Pagination Here  --}}

            </div>
        </div>
        {{-- Seller Products end --}}

        <div class="row justify-content-center my-5">
            <div class="col-auto">
                {{ $sellerProducts->links() }}
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
