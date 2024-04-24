@extends('layouts.app')

@section('title', 'Order History')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/profile/orderHistory.css') }}">

    @include('layouts.navbar')

    <div class="container-fluid p-0 ">
        <div class="row min-vh-100">
            <div class="col">
                <div class="mt-3 px-4">
                    <h1 class="mb-4">Order History</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="row">
                                <div class="col">
                                    <strong>Error:</strong> Please fix the following issues:
                                </div>
                                <div class="col text-end">
                                    <button type="button" class="close bg-transparent border-0" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
  
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <main>                      
                        @if ($shop_orders->isNotEmpty())
                            @foreach ($shop_orders as $shop_order)
                                <div class="card rounded-0 border-dark mb-3" style="max-width: 1500px;">
                                    <div class="card-header pb-0" style="background-color: #f2f2f2;">
                                        <table class="table"> 
                                            <tr>
                                                <th class="bg-orignal">Order Placed</th>
                                                <th class="bg-orignal">Total Price</th>
                                                <th class="bg-orignal">Ship To</th>
                                                <th class="bg-orignal">Shipping Status</th>
                                                <th class="bg-orignal">Order Number</th>
                                            </tr>
                                            <tr>
                                                <td class="bg-orignal">
                                                    {{ $shop_order->created_at->addDays(7)->format('Y-m-d') }}
                                                </td>
                                                <td class="bg-orignal">${{ $shop_order->order_total }}</td>
                                                <td class="bg-orignal">
                                                    {{ $shop_order->address->city }}, {{ $shop_order->address->country->name }}
                                                </td>
                                                <td class="bg-orignal">{{ $shop_order->orderStatus->status }}</td>
                                                <td class="bg-orignal">{{ $shop_order->id }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                    @foreach ($shop_order->orderLines as $order)
                                        <div class="card-body text-dark">
                                            <div class="row align-items-center">
                                                <div class="col-xl-3 col-lg-0 d-lg-block text-center">
                                                    @if ($order->product->productImage->isNotEmpty())
                                                        <img src="{{ asset('storage/images/items/'. $order->product->productImage->first()->productImages->image) }}" alt="product photo" style="width: 200px; height: 200px;">
                                                    @else
                                                        <img src="{{ asset('images/items/no-image.svg') }}" alt="product photo" style="width: 200px; height: 200px;">
                                                    @endif
                                                </div>
                                                <div class="col-xl-4 col-lg-auto">
                                                    <a href="{{ route('productDetail', $order->product->id) }}" class="mb-2 d-block">{{ $order->product->name }}</a>
                                                    <a href="{{ route('seller.profile', $order->product->seller_id) }}" class="mb-2 d-block">
                                                        {{ $order->product->seller->last_name }} {{ $order->product->seller->first_name }}
                                                    </a>
                                                    <p class="h3 mb-2">${{ number_format($order->product->price, 2) }}</p>
                                                    
                                                    @if ($order->product->isCart())
                                                        <form action="{{ route('customer.updateQty', $order->product->id) }}" method="post">
                                                            @csrf
                                                            @method('PATCH')
                                                
                                                            <button type="submit" class="btn create-button">
                                                                Buy it Again
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('customer.addToCart', $order->product->id) }}" method="post">
                                                            @csrf
                                                
                                                            <button type="submit" class="btn create-button">
                                                                Buy it Again
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>

                                                @if ($order->product->isReview())
                                                    <div class="col-xl-5 col-lg-auto d-flex flex-column justify-content-center align-items-center">
                                                        <button type="button" class="btn edit-button w-50 mb-3" data-bs-toggle="modal" data-bs-target="#product-review-edit-modal-{{ $order->product->id }}">
                                                            Edit Review
                                                        </button>
                                                    
                                                        <button type="button" class="btn w-50 delete-button text-truncate" data-bs-toggle="modal" data-bs-target="#product-review-delete-modal-{{ $order->product->id }}">
                                                            Delete Review
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col-xl-5 col-lg-auto text-center">
                                                        <button type="button" class="btn normal-button text-truncate" data-bs-toggle="modal" data-bs-target="#product-review-modal-{{ $order->product->id }}">
                                                            Write a Product Review
                                                        </button>
                                                    </div>
                                                @endif
                   
                                                @include('customer.modal.review')
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </main>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>
    
    {{-- Close button --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection