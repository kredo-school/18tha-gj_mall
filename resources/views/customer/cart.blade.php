@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">

    @include('layouts.navbar')

    <div class="container-fluid p-0 vh-100" style="min-height: 100vh">

            {{-- Cart --}}
            <form action="{{ route('customer.transaction') }}" method="post" id="transaction-form">
                @csrf
                <div class="row px-3 mb-4 mx-auto">
                    <div class="col-7">

                        {{-- Shopping Continue --}}
                        <div class="row my-3 border-bottom">
                            <div class="col">
                                <div class="mb-1">
                                    <button id="btn--back" class="h5 fw-bold btn btn-link text-decoration-none link-dark" type="button">
                                        &lt; <span class="ms-2">Back</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Titles --}}
                        <div class="row">
                            <div class="col">
                                <h1 class="fw-bold">Shopping Cart</h1>
                                @if ( $cart_products > 0 )
                                    <p style="color: #0AA873;"><span>{{ count($cart_products) }}</span> Items in your cart.</p>
                                @else
                                    <p class="text-secondary">No items in your cart.</p>
                                @endif
                            </div>
                        </div>

                        {{--Cart Items --}}
                        <div>
                            @foreach ($cart_products as $product)
                                <div class="row mb-3 ms-2">
                                    <div class="col">
                                        <div class="card cartItem-card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <div class="row align-items-center text-center h-100 border-end">
                                                            <div class="col">
                                                                @foreach ($cart_items as $item)
                                                                    @if ( $item->product_id === $product->id )
                                                                        <input type="hidden" class="itemId" value="{{ $item->id }}" name="itemId[{{$item->id}}]">
                                                                        <input class="form-check-input sync-checkbox" type="checkbox" name="sync_checkbox[{{ $item->id }}]" id="sync-checkbox" checked hidden>
                                                                        <img src="{{ asset('images/customer/checkedIcon.svg') }}" alt="checked" class="checked item-checkbox" data-item-id="{{ $product->id }}" style="width: 23px; height: 23px;">
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="row align-items-center text-center h-100">
                                                            <div class="col">
                                                                @if ($product->productImage->isNotEmpty())
                                                                    <img src="{{ asset('storage/images/items/'. $product->productImage->first()->productImages->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                                                @else
                                                                    <img src="{{ asset('images/items/no-image.svg') }}" alt="Product Image" class="card-img-top">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{ url('productDetail') }}" class="text-decoration-none text-dark">
                                                            <h4 class="fw-bold">{{ $product->name }}</h4>
                                                        </a>
                                                        <a href="{{ url('seller/profile') }}" class="text-decoration-none text-dark">
                                                            <p>{{ $product->seller->last_name. ' ' .$product->seller->first_name }}</p>
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <div class="row align-items-center h-100">
                                                            <div class="col text-end">
                                                                @foreach ($cart_items as $item)
                                                                    @if ( $item->product_id === $product->id )
                                                                        <input type="number" name="quantity[{{ $item->id }}]" class="quantity form-control" min="1" max="5" value="{{ $item->qty }}">
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="row align-items-center text-center h-100">
                                                            <div class="col text-end">
                                                                @foreach ($cart_items as $item)
                                                                    @if ( $item->product_id === $product->id )
                                                                        <h5>Price :</h5>
                                                                        <h4 class="mt-2">$ <span class="product_price">{{$product->price}}</span></h4>
                                                                        <input type="number" name="product_price[{{ $item->id }}]" id="product_price" class="form-control product_price" value="{{ $product->price }}" style="display: none;">
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="row align-items-center text-center h-100">
                                                            <div class="col text-end">
                                                                @foreach ($cart_items as $item)
                                                                    @if ( $item->product_id === $product->id )
                                                                        <h5>Sum :</h5>
                                                                        <h4 class="mt-2">$ <span class="total_price_for_item">{{ number_format($item->qty * $product->price, 2) }}</span></h4>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="row align-items-center text-center h-100">
                                                            <div class="col">
                                                                <a href="{{ route('customer.cart.deleteItem', $item->id) }}"><p class="mt-2 h4"><i class="fa-solid fa-trash trash-icon"></i></p></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    {{-- Order Summary --}}
                    <div class="col">
                        <div class="row sticky-top mt-5" id="sticky_card">
                            <div class="col">
                                <div class="card mt-4 mx-auto order-card">
                                    <div class="card-body">
                                        <div class="row mx-auto mb-5">
                                            <div class="col">
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <h3 class="fw-bold text-center text-decoration-underline">Order Summary</h3>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 mx-auto">
                                                    <div class="col">
                                                        <h4 class="fw-bold text-start">Subtotal : </h4>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-end">$ <span class="sub_total">0</span></h4>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 mx-auto">
                                                    <div class="col-7">
                                                        <h4 class="fw-bold text-start">Estimated Shipping : </h4>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-end">$ <span class="shipping_price">{{ $shipping->price }}</span></h4>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 mx-auto">
                                                    <div class="col-7">
                                                        <h4 class="fw-bold text-start">Total : </h4>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-end">$ <span class="total_price">0</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col">
                                                @if ( Auth::id() )
                                                    <button type="submit"
                                                            id="checkoutButton"
                                                            class="btn create-button w-50 fw-bold"
                                                            {{ count($cart_products) > 0 ? '' : 'disabled' }}
                                                    >
                                                            Checkout
                                                    </button>
                                                @else
                                                    <p class="text-danger small mb-1">Please Sign-in first.</p>
                                                    <button type="submit" class="btn create-button w-50 fw-bold" disabled>Checkout</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

    </div>

    @include('layouts.footer')

    <script src="{{ asset('js/cart.js') }}"></script>
@endsection

