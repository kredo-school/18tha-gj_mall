@extends('admin.layouts.app')

@section('title', 'Delivery Status Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/delivery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  

        <h1 class="my-4">Delivery Order List</h1>


        <div class="row mb-4">
            {{-- Search bar --}}

            <div class="col-8 my-2">
                <form action="{{route("admin.delivery.search")}}">
                    <input type="search" name="search" placeholder="Search..." class="form-control">
                </form>
            </div>

            {{-- Filter button --}}
            <div class="col mt-1">
                <div class="h4 fw-bold filter">Filtered By </div>
                <div class="dropdown" id="dropdown-status">
                    <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" href="{{route("admin.delivery.search")}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </a>
                    
                    <ul class="dropdown-menu h4">
                        @foreach ($order_statuses as $order_status)
                            <form action="{{route("admin.delivery.search")}}" method="GET">
                                <input type="text" name="status" value="{{ $order_status->id }}"
                                    style="visibility: hidden; height:0px;">
                                <button class="dropdown-item montserrat" type="submit">{{ $order_status->status }}</button>
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        {{-- Table of Delivery Order List --}}
        <table class="table table-hover align-middle bg-white border text-center">
            <thead class="small table-secondary text-light">
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>quantity</th>
                    <th>Price</th>
                    <th>Order Date</th>
                    <th>Product Category</th>
                    <th>Order Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($admin_orders as $order)
                    <tr class="text-center">
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>{{$order->qty}}</td>
                        <td>${{$order->price * $order->qty}}</td>
                        <td>{{$order->created_at->format('Y-m-d')}}</td>
                        <td>{{$order->product->category->name}}</td>
                        <td>{{$order->shopOrder->orderStatus->status}}</td>
                        <td>
                            <a class="btn btn-sm show-button rounded-pill shadow text-decoration-none" data-bs-toggle="modal" href="{{route("admin.delivery.showDetail",$order->id)}}" data-bs-target="#change-status-{{$order->id}}">Show Detail</a>
                        </td>
                        @include('admin.delivery.modal.deliveryStatus')
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $admin_orders->links() }}


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