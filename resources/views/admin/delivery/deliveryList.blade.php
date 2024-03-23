@extends('admin.layouts.app')

@section('title', 'Delivery Status Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/delivery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
        <h1 class="my-4">Delivery Order List</h1>

        <div class="row mb-4">
            {{-- Search bar --}}
            <div class="col-8 my-2">
                <form action="#">
                    <input type="search" name="search" placeholder="Search..." class="form-control">
                </form>
            </div>
            {{-- Filter button --}}
            <div class="col mt-1">
                <div class="h4 fw-bold filter">Filtered By </div>
                <div class="dropdown" id="dropdown-status">
                    <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </a>
                    
                    <ul class="dropdown-menu h4">
                        <li><a class="dropdown-item" href="#">1: Waiting for Acceptance</a></li>
                        <li><a class="dropdown-item" href="#">2: Completing Acceptance</a></li>
                        <li><a class="dropdown-item" href="#">3: During Transportation</a></li>
                        <li><a class="dropdown-item" href="#">4: Completing Shipment</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row mb-4">
            <div class="col">
                {{-- Table of Delivery Order List --}}
                <table class="table table-hover align-middle bg-white border text-center">
                    <thead class="small table-secondary text-light">
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
                                <button class="btn btn-sm show-button rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Show Detail</button>
                                @include('admin.delivery.modal.deliveryStatus')
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
                                <button class="btn btn-sm show-button rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Show Detail</button>
                                @include('admin.delivery.modal.deliveryStatus')
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
                                <button class="btn btn-sm show-button rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Show Detail</button>
                                @include('admin.delivery.modal.deliveryStatus')
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
                                <button class="btn btn-sm show-button rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Show Detail</button>
                                @include('admin.delivery.modal.deliveryStatus')
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
                                <button class="btn btn-sm show-button rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Show Detail</button>
                                @include('admin.delivery.modal.deliveryStatus')
                            </td>
                        </tr>

                        
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Banner --}}
        <div class="row banner mx-1">
            <div class="col-auto p-0">
                <img src="{{ asset('images/common/logo.svg') }}" alt="gj-mall-logo" class="logo">
            </div>
            <div class="col pt-4">
                <h3 class="gj-mall">GJ-MALL</h3>
                <h4 class="sub-title">Japanese HighQuality Products E-commerce Site</h4>
            </div>
        </div>

@endsection