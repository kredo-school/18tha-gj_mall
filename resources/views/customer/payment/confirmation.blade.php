@extends('layouts.app')

@section('title', 'Confirmation')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/payment/confirmation.css') }}">
    @include('layouts.navbar')
    
    <div class="container-fluid vh-100">
        <div id="item-wrapper">
            <!-- upper -->
            <div class="header text-center p-3">
                <i class="fa-solid fa-circle-check" style="color: #0AA873;"></i>
                <h1>Thank you!</h1>
                <p class="fs-5 mb-1">Your Order is completed!</p>
            </div>
            <!-- upper end -->

            <!-- content  -->
            <div class="container">
                <div class="row justify-content-center mt-2">
                    <div class="col-8">
                        <strong class="label">Order Number :</strong>
                        <span class="d-block">No. {{ $orderId }}</span>
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col-8">
                        <strong class="label">Estimated Delivery Date :</strong>
                        <span class="d-block">{{ $deliver_date }}</span>
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col-8">
                        <strong class="label">Total Amount :</strong>
                        <span class="d-block">$ {{ $orderTotal }}</span>
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col text-end">
                        <a href="{{ url('/home') }}" class="btn normal-button ms-5 me-3">Go Home Page</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('customer.showOrderHistory', Auth::id()) }}" class="btn edit-button ms-3">Go Ordered List</a>
                    </div>
                </div>
            </div>
            <!-- content end -->
        </div>
    </div>

    @include('layouts.footer')
@endsection