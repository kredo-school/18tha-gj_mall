@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">

    @include('layouts.navbar')
    
    <div class="container-fluid p-0 vh-100">

        <div class="row px-3 mb-4 mx-auto">

            {{-- Cart --}}
            <div class="col-7">

                {{-- Shopping Continue --}}
                <div class="row my-3 border-bottom">
                    <div class="col">
                        <div class="mb-1">
                            <a href="#" class="h5 text-decoration-none fw-bold">&lt; <span class="ms-2">Shopping Continue</span></a>
                        </div>
                    </div>
                </div>

                {{-- Titles --}}
                <div class="row">
                    <div class="col">
                        <h1 class="fw-bold">Shopping Cart</h1>
                        <p style="color: #0AA873;">Selected <span>3</span> items in your cart.</p>
                    </div>
                </div>

                {{--Cart Items --}}
                <div>
                    <div class="row mb-3 ms-2">
                        <div class="col">
                            <div class="card cartItem-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="row align-items-center text-center h-100 border-end">
                                                <div class="col">
                                                    <img src="{{ asset('images/customer/checkedIcon.png') }}" alt="checked" class="item-checkbox" data-item-id="1" style="width: 23px; height: 23px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <img src="{{ asset('images/account/bg-admin.png') }}" alt="product image" style="width: 140px; height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('productDetail') }}" class="text-decoration-none text-dark">
                                                <h4 class="fw-bold">Kimono Art</h4>
                                            </a>
                                            <a href="{{ url('seller/profile') }}" class="text-decoration-none text-dark">
                                                <p>Kimono Art Shop</p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center h-100">
                                                <div class="col text-end">
                                                    <input type="number" name="quantity" id="quantity" class="form-control" min="0"  value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col text-end">
                                                    <h4 class="mt-2">$ <span class="prodcut_price">120.00</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <p class="mt-2 h4"><i class="fa-solid fa-trash trash-icon"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 ms-2">
                        <div class="col">
                            <div class="card cartItem-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="row align-items-center text-center h-100 border-end">
                                                <div class="col">
                                                    <img src="{{ asset('images/customer/uncheckedIcon.png') }}" alt="checked" class="item-checkbox" data-item-id="1" style="width: 23px; height: 23px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <img src="{{ asset('images/account/bg-admin.png') }}" alt="product image" style="width: 140px; height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('productDetail') }}" class="text-decoration-none text-dark">
                                                <h4 class="fw-bold">Kimono Art</h4>
                                            </a>
                                            <a href="{{ url('seller/profile') }}" class="text-decoration-none text-dark">
                                                <p>Kimono Art Shop</p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center h-100">
                                                <div class="col text-end">
                                                    <input type="number" name="quantity" id="quantity" class="form-control" min="0"  value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col text-end">
                                                    <h4 class="mt-2">$ <span class="prodcut_price">120.00</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <p class="mt-2 h4"><i class="fa-solid fa-trash trash-icon"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 ms-2">
                        <div class="col">
                            <div class="card cartItem-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="row align-items-center text-center h-100 border-end">
                                                <div class="col">
                                                    <img src="{{ asset('images/customer/uncheckedIcon.png') }}" alt="checked" class="item-checkbox" data-item-id="1" style="width: 23px; height: 23px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <img src="{{ asset('images/account/bg-admin.png') }}" alt="product image" style="width: 140px; height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('productDetail') }}" class="text-decoration-none text-dark">
                                                <h4 class="fw-bold">Kimono Art</h4>
                                            </a>
                                            <a href="{{ url('seller/profile') }}" class="text-decoration-none text-dark">
                                                <p>Kimono Art Shop</p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center h-100">
                                                <div class="col text-end">
                                                    <input type="number" name="quantity" id="quantity" class="form-control" min="0"  value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col text-end">
                                                    <h4 class="mt-2">$ <span class="prodcut_price">120.00</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <p class="mt-2 h4"><i class="fa-solid fa-trash trash-icon"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 ms-2">
                        <div class="col">
                            <div class="card cartItem-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="row align-items-center text-center h-100 border-end">
                                                <div class="col">
                                                    <img src="{{ asset('images/customer/uncheckedIcon.png') }}" alt="checked" class="item-checkbox" data-item-id="1" style="width: 23px; height: 23px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <img src="{{ asset('images/account/bg-admin.png') }}" alt="product image" style="width: 140px; height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('productDetail') }}" class="text-decoration-none text-dark">
                                                <h4 class="fw-bold">Kimono Art</h4>
                                            </a>
                                            <a href="{{ url('seller/profile') }}" class="text-decoration-none text-dark">
                                                <p>Kimono Art Shop</p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center h-100">
                                                <div class="col text-end">
                                                    <input type="number" name="quantity" id="quantity" class="form-control" min="0"  value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col text-end">
                                                    <h4 class="mt-2">$ <span class="prodcut_price">120.00</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <p class="mt-2 h4"><i class="fa-solid fa-trash trash-icon"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 ms-2">
                        <div class="col">
                            <div class="card cartItem-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="row align-items-center text-center h-100 border-end">
                                                <div class="col">
                                                    <img src="{{ asset('images/customer/uncheckedIcon.png') }}" alt="checked" class="item-checkbox" data-item-id="1" style="width: 23px; height: 23px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <img src="{{ asset('images/account/bg-admin.png') }}" alt="product image" style="width: 140px; height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('productDetail') }}" class="text-decoration-none text-dark">
                                                <h4 class="fw-bold">Kimono Art</h4>
                                            </a>
                                            <a href="{{ url('seller/profile') }}" class="text-decoration-none text-dark">
                                                <p>Kimono Art Shop</p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center h-100">
                                                <div class="col text-end">
                                                    <input type="number" name="quantity" id="quantity" class="form-control" min="0"  value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col text-end">
                                                    <h4 class="mt-2">$ <span class="prodcut_price">120.00</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <p class="mt-2 h4"><i class="fa-solid fa-trash trash-icon"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 ms-2">
                        <div class="col">
                            <div class="card cartItem-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="row align-items-center text-center h-100 border-end">
                                                <div class="col">
                                                    <img src="{{ asset('images/customer/uncheckedIcon.png') }}" alt="checked" class="item-checkbox" data-item-id="1" style="width: 23px; height: 23px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <img src="{{ asset('images/account/bg-admin.png') }}" alt="product image" style="width: 140px; height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('productDetail') }}" class="text-decoration-none text-dark">
                                                <h4 class="fw-bold">Kimono Art</h4>
                                            </a>
                                            <a href="{{ url('seller/profile') }}" class="text-decoration-none text-dark">
                                                <p>Kimono Art Shop</p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center h-100">
                                                <div class="col text-end">
                                                    <input type="number" name="quantity" id="quantity" class="form-control" min="0"  value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col text-end">
                                                    <h4 class="mt-2">$ <span class="prodcut_price">120.00</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <p class="mt-2 h4"><i class="fa-solid fa-trash trash-icon"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 ms-2">
                        <div class="col">
                            <div class="card cartItem-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="row align-items-center text-center h-100 border-end">
                                                <div class="col">
                                                    <img src="{{ asset('images/customer/uncheckedIcon.png') }}" alt="checked" class="item-checkbox" data-item-id="1" style="width: 23px; height: 23px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <img src="{{ asset('images/account/bg-admin.png') }}" alt="product image" style="width: 140px; height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('productDetail') }}" class="text-decoration-none text-dark">
                                                <h4 class="fw-bold">Kimono Art</h4>
                                            </a>
                                            <a href="{{ url('seller/profile') }}" class="text-decoration-none text-dark">
                                                <p>Kimono Art Shop</p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center h-100">
                                                <div class="col text-end">
                                                    <input type="number" name="quantity" id="quantity" class="form-control" min="0"  value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col text-end">
                                                    <h4 class="mt-2">$ <span class="prodcut_price">120.00</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center text-center h-100">
                                                <div class="col">
                                                    <p class="mt-2 h4"><i class="fa-solid fa-trash trash-icon"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <h4 class="text-end">$ <span class="sub_total">220.00</span></h4>
                                            </div>
                                        </div>
                                        <div class="row mt-3 mx-auto">
                                            <div class="col-7">
                                                <h4 class="fw-bold text-start">Estimated Shipping : </h4>
                                            </div>
                                            <div class="col">
                                                <h4 class="text-end">$ <span>5.00</span></h4>
                                            </div>
                                        </div>
                                        <div class="row mt-3 mx-auto">
                                            <div class="col-7">
                                                <h4 class="fw-bold text-start">Total : </h4>
                                            </div>
                                            <div class="col">
                                                <h4 class="text-end">$ <span class="total_price">225.00</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col">
                                        <a href="{{ url('/customer/transaction') }}">
                                            <button type="button" class="btn create-button w-50 fw-bold">Checkout</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footer')
    </div>

    <script src="{{ asset('js/cart.js') }}"></script>
@endsection

