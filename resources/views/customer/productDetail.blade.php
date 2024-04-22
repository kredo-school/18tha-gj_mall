@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/product/productDetail.css') }}">
    
    @include('layouts.navbar')

    <div class="container">
        @auth
            <a href="{{ route('livechat', [$product->id, Auth::user()->id]) }}" id="fixedbutton" class="p-2">
                <i class="fa-solid fa-comments text-primary" id="chaticon"></i>
            </a>            
        @endauth

        {{-- Product Detail Content  --}}
        <div class="row mt-5 justify-content-center">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if ($product->productImage->isNotEmpty())
                            @foreach ($product->productImage as $productImage)
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/images/items/'. $productImage->productImages->image) }}" class="d-block inner-image" alt="Product Image">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div id="thumbnailImages">
                    <div class="row mt-3 justify-content-center">
                        @if ($product->productImage->isNotEmpty())
                            @foreach ($product->productImage as $productImage)
                                <div class="col-auto">
                                    <img src="{{ asset('storage/images/items/'. $productImage->productImages->image) }}" class="img-fluid thumbnail" alt="Product Image" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col">
                <h1 class="fw-bold">{{ $product->name }}</h1>
                <a href="{{ route('seller.profile', $product->seller->id ) }}" class="text-muted text-decoration-none">
                    {{ $product->seller->last_name }}{{ $product->seller->first_name }}
                </a>
                <span class="fs-3 mt-2 d-block text-danger">
                    ${{ number_format($product->price, 2) }}
                </span>

                <strong>Description</strong>
                <p class="lead">
                    {{ $product->description }}
                </p>

                <div class="card car-body p-4" id="product_detail_card">
                    @if ($product->isCart())
                        <form action="{{ route('customer.updateQty', $product->id) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label">Quantity</label>
                    
                                    @switch($product->qty_in_stock)
                                        @case(0)
                                            <strong class="fw-bold d-block text-danger">Out of Stock</strong>
                                            @break
                                        @case($product->qty_in_stock <= 5)
                                            <strong class="fw-bold d-block text-danger">{{ $product->qty_in_stock }} Items Left</strong>
                                            @break
                                        @default
                                            <strong class="fw-bold d-block text-success">In Stock</strong>
                                    @endswitch

                                    <div class="qty-container">
                                        <button class="qty-btn-minus" type="button"><i class="fa fa-minus"></i></button>
                                        <input type="text" name="qty" value="0" class="input-qty border-0"/>
                                        <button class="qty-btn-plus" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                    @if(session('error'))
                                        <p class="small text-danger">
                                            {{ session('error') }}
                                        </p>
                                    @endif

                                    <p class="text-muted mb-0">Maximum purchase 5</p>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn create-button w-100" {{ $product->qty_in_stock == 0 ? 'disabled' : '' }}>
                                        <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('customer.addToCart', $product->id) }}" method="post">
                            @csrf

                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label">Quantity</label>
                    
                                    @switch($product->qty_in_stock)
                                        @case(0)
                                            <strong class="fw-bold d-block text-danger">Out of Stock</strong>
                                            @break
                                        @case($product->qty_in_stock <= 5)
                                            <strong class="fw-bold d-block text-danger">{{ $product->qty_in_stock }} Items Left</strong>
                                            @break
                                        @default
                                            <strong class="fw-bold d-block text-success">In Stock</strong>
                                    @endswitch

                                    
                    
                                    <div class="qty-container">
                                        <button class="qty-btn-minus" type="button"><i class="fa fa-minus"></i></button>
                                        <input type="text" name="qty" value="0" class="input-qty border-0"/>
                                        <button class="qty-btn-plus" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <p class="text-muted mb-0">Maximum purchase 5</p>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn create-button w-100" {{ $product->qty_in_stock == 0 ? 'disabled' : '' }}>
                                        <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                                    </button>
                                </div>
                            </div>
                        </form>                 
                    @endif

                    <hr>

                    <div class="row">
                        <div class="col">
                            @auth
                                @if ($product->isFavorite())
                                    <form action="{{ route('favorite.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
            
                                        <button type="submit" class="btn create-button w-100">
                                            <i class="fa fa-heart"></i> Add to Wishlist
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('favorite.store', $product->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn create-button w-100">
                                            <i class="fa fa-heart text-danger"></i> Add to Wishlist
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        {{-- Product Detail Content End --}}

        {{-- Product Detail Table  --}}
        <div class="row mt-5">
            <div class="col">
                <h2>Product Details</h2>
                
                <table class="table">
                    <tr>
                        <th id="table-title">New Weight</th>
                        <td>{{ $product->productDetail->weight }}</td>
                    </tr>

                    <tr>
                        <th id="table-title">Size</th>
                        <td>{{ $product->productDetail->size }}</td>
                    </tr>

                    <tr>
                        <th id="table-title">Shipping Method</th>
                        <td>Air Mail</td> 
                    </tr>
                </table>
            </div>
        </div>
        {{-- Product Detail Table End --}}

        <h1 class="h2">Rating Reviews</h1>

        <div class="row">
            <div class="col">
                <!-- Total Rating  -->
                <div class="total_rating mb-4 d-flex align-items-center">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $product->averageRating)
                            <span class="fa-solid fa-star icon text-warning"></span>
                        @else
                            <span class="fa-solid fa-star icon text-dark"></span>
                        @endif
                    @endfor
                    <div class="badge style-seet color3 border p-2 ms-2">{{ $product->averageRating }}/5.0</div>
                </div>
                <!-- Total Rating End -->
            </div>
        </div>

        <!-- Rating Card  -->
        <div class="row row-cols-auto mb-3">
            @if ($product->reviews->isNotEmpty())
                {{-- Retrive random 5 reviews --}}
                @php
                    $randomReviews = $product->reviews->shuffle()->take(5);
                @endphp

                @foreach ($randomReviews as $review)
                    <div class="col mb-3">
                        <div class="card card-body border-light-2" style="width: 1290px">
                            <div class="row">
                                <div class="col-auto">
                                    @if ($review->customer->avatar)
                                        <img src="{{ asset('storage/images/customer/'. $review->customer->avatar) }}" alt="user_avatar" class="avatar rounded-5">
                                    @else
                                        <img src="{{ asset('images/customer/no_user.svg') }}" alt="user_avatar" class="avatar rounded-5">
                                    @endif
                                </div>
                                <div class="col">
                                    <h2 class="fs-4">
                                        {{ $review->customer->first_name }} {{ $review->customer->last_name }}
                                    </h2>
                                    <div class="total_rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $review->rating)
                                                <span class="fa-solid fa-star icon text-warning"></span>
                                            @else
                                                <span class="fa-solid fa-star icon text-dark"></span>
                                            @endif
                                        @endfor
                                    </div>
                                    <div id="overflow-scroll">
                                        <p class="lead">
                                            {{ $review->content }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                @endforeach                  
            @endif
        </div>
        <!-- Rating Card  -->
    </div>

    @include('layouts.footer')

    {{-- productDetail.js --}}
    <script src="{{ asset('js/productDetail.js') }}"></script>
@endsection