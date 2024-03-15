@extends('layouts.app')

@section('title', 'Payment Confirmation')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/payment/paymentConfirmation.css') }}">

    @include('layouts.navbar')
    
    <div class="container-fluid vh-100">
        <div id="item-wrapper">
            <!-- upper -->
            <div class="header text-center p-3">
                <i class="fa-solid fa-circle-check text-success"></i>
                <h1>Thank you!</h1>
                <p class="fs-5 mb-1">Your Order is completed!</p>
            </div>
            <!-- upper end -->

            <!-- content  -->
            <div class="container">
                <div class="row justify-content-center mt-2">
                    <div class="col-8">
                        <strong>Order Number</strong>
                        <span class="d-block">123456789-123</span>
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col-8">
                        <strong>Approximate Deliver Date</strong>
                        <span class="d-block">Sun, April 9, 2024</span>
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col-8">
                        <strong>Amount</strong>
                        <span class="d-block">$20,000</span>
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col-8">
                        <a href="" class="btn normal-button me-3">Go Home Page</a>
                        <a href="" class="btn edit-button">Ordered ListPage</a>
                    </div>
                </div>
            </div>
            <!-- content  -->
        </div>
    </div>

    @include('layouts.footer')

@endsection