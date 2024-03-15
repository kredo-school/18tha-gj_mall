@extends('layouts.app')

@section('title', 'Order History')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/profile/orderHistory.css') }}">

    @include('layouts.navbar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-5 p-0 border border-1" style="height: 100vh;">
                @include('layouts.sidebar')
            </div>
            <div class="col-xl-9 col-md-8 col-sm-7">
                <div class="mt-3 px-4">
                    <h1 class="mb-4">Order History</h1>
                    
                    <main>
                        {{-- item 1  --}}
                        <div class="card rounded-0 border-dark mb-3" style="max-width: 1500px;">
                            <div class="card-header pb-0" style="background-color: #f2f2f2;">
                                <table class="table"> 
                                    <tr class="bg-orignal">
                                        <th class="bg-orignal">Order Placed</th>
                                        <th class="bg-orignal">Total Price</th>
                                        <th class="bg-orignal">Ship To</th>
                                        <th class="bg-orignal">Shipping Status</th>
                                        <th class="bg-orignal">Order Number</th>
                                    </tr>
                                    <tr>
                                        <td class="bg-orignal">2024/2/29</td>
                                        <td class="bg-orignal">$20.00</td>
                                        <td class="bg-orignal">Okinawa, Japan</td>
                                        <td class="bg-orignal">On Deliver</td>
                                        <td class="bg-orignal">123459789</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card-body text-dark">
                                <div class="row align-items-center">
                                    <div class="col-xl-3 col-lg-0 d-lg-block text-center">
                                        <img src="{{ asset('images/account/bg-admin.png') }}" alt="product photo" style="width: 200px; height: 200px;">
                                    </div>
                                    <div class="col-xl-4 col-lg-auto">
                                        <a href="" class="mb-2 d-block">Product Name</a>
                                        <a href="" class="mb-2 d-block">Shop Name</a>
                                        <p class="h3 mb-2">$15.00</p>
                                        
                                        <form action="" method="post">
                                            @csrf
                                
                                            <button type="submit" class="btn create-button">
                                                Buy it Again
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-xl-5 col-lg-auto text-center">
                                        <button type="button" class="btn normal-button text-truncate" data-bs-toggle="modal" data-bs-target="#product-review-modal">
                                            Write a Product Review
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- item 1 end --}}

                        {{-- item 2  --}}
                        <div class="card rounded-0 border-dark mb-3" style="max-width: 1500px;">
                            <div class="card-header pb-0" style="background-color: #f2f2f2;">
                                <table class="table"> 
                                    <tr class="bg-orignal">
                                        <th class="bg-orignal">Order Placed</th>
                                        <th class="bg-orignal">Total Price</th>
                                        <th class="bg-orignal">Ship To</th>
                                        <th class="bg-orignal">Shipping Status</th>
                                        <th class="bg-orignal">Order Number</th>
                                    </tr>
                                    <tr>
                                        <td class="bg-orignal">2023/2/29</td>
                                        <td class="bg-orignal">$60.00</td>
                                        <td class="bg-orignal">Mie, Japan</td>
                                        <td class="bg-orignal">Complete</td>
                                        <td class="bg-orignal">987654321</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card-body text-dark">
                                <div class="row align-items-center">
                                    <div class="col-xl-3 col-lg-0 d-lg-block text-center">
                                        <img src="{{ asset('images/account/bg-seller.png') }}" alt="product photo" style="width: 200px; height: 200px;">
                                    </div>
                                    <div class="col-xl-4 col-lg-auto">
                                        <a href="" class="mb-2 d-block">Product Name</a>
                                        <a href="" class="mb-2 d-block">Shop Name</a>
                                        <p class="h3 mb-2">$50.00</p>
                                        
                                        <form action="" method="post">
                                            @csrf
                                
                                            <button type="submit" class="btn create-button">
                                                Buy it Again
                                            </button>
                                        </form>
                                    </div>
                            
                                    <div class="col-xl-5 col-lg-auto d-flex flex-column justify-content-center align-items-center">
                                        <button type="button" class="btn edit-button w-50 mb-3" data-bs-toggle="modal" data-bs-target="#product-review-edit-modal">
                                            Edit Review
                                        </button>
                                    
                                        <button type="button" class="btn w-50 delete-button text-truncate" data-bs-toggle="modal" data-bs-target="#product-review-delete-modal">
                                            Delete Review
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- item 2 end --}}
                    </main>
                </div>
            </div>
        </div>
    </div>
    
    @include('customer.modal.review')
@endsection