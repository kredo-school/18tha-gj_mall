@extends('seller.layouts.app')

@section('title', 'Seller Delivery Status')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/delivery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <div class="container">
        <div class="row justify-content-center pt-3">
            <h1 class="h2 fw-bold">Delivery Order List</h1>

            {{-- Search bar --}}
            <div class="col-8 my-2">
                <div class="navbar-nav">
                    <form action="#">
                        <input type="search" name="search" placeholder="Search..." class="form-control form-control-sm">
                    </form>
                </div>
            </div>
            {{-- Filter button --}}
            <div class="col-4 mt-2">
                <strong class="fw-bold filter">Filtered By </strong> <button class="btn btn-sm custom-button1 rounded-pill shadow ms-2 mb-2">Status</button>
            </div>

            {{-- Table of Delivery Order List --}}
            <div class="table">
                <table class="table table-hover align-middle bg-white border">
                    <thead class="table-secondary text-light fw-bold">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Seller Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      {{-- No.1 --}}
                        <tr>
                            <td>1</td>
                            <td>Kimono</td>
                            <td>$100</td>
                            <td>Kimono Shop</td>
                            <td>This is not a fragile item</td>
                            <td>Cloth</td>
                            <td>1: Waiting for Acceptance</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Show Detail</button>
                                @include('seller.delivery.modal.deliveryStatus')
                            </td>
                        </tr>
                        {{-- No.2 --}}
                        <tr>
                            <td>2</td>
                            <td>Arita-yaki</td>
                            <td>$50</td>
                            <td>Dish Shop</td>
                            <td>This is a fragile item</td>
                            <td>Dish</td>
                            <td>2: Completing Acceptance</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Show Detail</button>
                                @include('seller.delivery.modal.deliveryStatus')
                            </td>
                        </tr>
                        {{-- No.3 --}}
                        <tr>
                            <td>3</td>
                            <td>Yunomi</td>
                            <td>$30</td>
                            <td>Yunomi Store</td>
                            <td>This is a fragile item</td>
                            <td>Glass</td>
                            <td>3: During Transportation</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Show Detail</button>
                                @include('seller.delivery.modal.deliveryStatus')
                            </td>
                        </tr>
                        
                        {{-- No.4 --}}
                        <tr>
                            <td>4</td>
                            <td>Hina Dolls</td>
                            <td>$800</td>
                            <td>Doll Shop</td>
                            <td>This is heavy items</td>
                            <td>Doll</td>
                            <td>4: Completing Shipment</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Show Detail</button>
                                @include('seller.delivery.modal.deliveryStatus')
                            </td>
                        </tr>

                        {{-- No.5 --}}
                        <tr>
                            <td>5</td>
                            <td>Hot Pot</td>
                            <td>$200</td>
                            <td>Pot Store</td>
                            <td>This is a fragile item</td>
                            <td>Pot</td>
                            <td>4: Completing Shipment</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Show Detail</button>
                                @include('seller.delivery.modal.deliveryStatus')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Banner --}}
        <div class="row my-5">
            <div class="col banner mx-auto">
                <div class="row mt-3">
                    <div class="col-auto">
                        <img src="{{ asset('images/common/Logo.png') }}" alt="gj-mall-logo" class="logo">
                    </div>
                    <div class="col">
                        <h2 class="gj-mall">GJ-MALL</h2>
                        <h4 class="sub-title">Japanese HighQuality Products E-commerce Site</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection