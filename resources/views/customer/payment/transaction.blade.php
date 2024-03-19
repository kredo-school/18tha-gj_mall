@extends('layouts.app')

@section('title', 'Transaction')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/payment/transaction.css') }}">

    @include('layouts.navbar')
    
    <div class="container-fluid vh-100 p-5">
        <div class="row">
            {{-- address and payment info --}}
            <div class="col-7">
                {{-- address content  --}}
                <div class="row mb-3 p-2" id="header">
                    <div class="col align-self-center">
                        <h2 class="mb-0">Address Information</h2>
                    </div>
                    <div class="col text-end">
                        <button class="btn edit-button" data-bs-toggle="modal" data-bs-target="#edit_address">Change</button>
                    </div>

                    {{-- payment address modal  --}}
                    @include('customer.modal.paymentAddress')
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <table class="table w-75 mx-auto table-bordered">
                            <tr>
                                <th id="table-header">Recipient</th>
                                <td>John Doe</td>
                            </tr>
                            <tr>
                                <th id="table-header">Address</th>
                                <td>100 Bay View Drive Mountain View, CA 94043, United States</td>
                            </tr>
                        </table>
                    </div>
                </div>
                {{-- address content end --}}

                {{-- Payment content  --}}
                <div class="row mb-3 p-2" id="header">
                    <div class="col align-self-center">
                        <h2 class="mb-0">Payment Information</h2>
                    </div>
                    <div class="col text-end">
                        <button class="btn edit-button" data-bs-toggle="modal" data-bs-target="#edit_payment">
                            Change
                        </button>
                    </div>
                    {{-- payment address modal  --}}
                    @include('customer.modal.payment')
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <table class="table w-75 mx-auto table-bordered text-center">
                            <tr>
                                <th id="table-header">Card Number</th>
                                <th id="table-header">Expired Date</th>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa-brands fa-cc-visa icon text-dark"></i> <span>123-456-4-789</span>
                                </td>
                                <td>01/31</td>
                            </tr>
                        </table>
                    </div>
                </div>
                {{-- Payment content end --}}

                {{-- Payment content  --}}
                <div class="row mb-3 p-2" id="header">
                    <div class="col align-self-center">
                        <h2 class="mb-0">Gift Box Options</h2>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <div class="form-check ms-5">
                            <input class="form-check-input" type="checkbox" name="" id="is_gift">
                            <label class="form-check-label" for="is_gift">
                                Is this a gift ?
                            </label>
                        </div>
                    </div>
                </div>
                {{-- Payment content end --}}
            </div>
            {{-- address and payment info end --}}

            {{-- Checkout --}}
            <div class="col">
                <div class="card mt-4 mx-auto order-card">
                    <div class="card-body">
                        <div class="row mx-auto mb-5">
                            <div class="col">
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <h3 class="fw-bold text-decoration-underline">Order Summary</h3>
                                        <p id="estimated_date_font">Estimated Delivery Date : March, 24, 2024</p>
                                    </div>
                                </div>

                                <div class="row mt-3 mx-auto">
                                    <div class="col">
                                        <h4 class="fw-bold text-start">Subtotal : </h4>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end">$ <span id="sub_total">220.00</span></h4>
                                    </div>
                                </div>
                                
                                <div class="row mt-3 mx-auto">
                                    <div class="col-7">
                                        <h4 class="fw-bold text-start">Estimated Shipping : </h4>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end">$ <span>10.00</span></h4>
                                    </div>
                                </div>

                                <div class="row mt-3 mx-auto d-none" id="gift_box">
                                    <div class="col-7">
                                        <h4 class="fw-bold text-start">Gift Box : </h4>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end">$ <span>5.00</span></h4>
                                    </div>
                                </div>

                                <div id="total_amout" class="row mt-3 mx-auto">
                                    <div class="col-7">
                                        <h4 class="fw-bold text-start">Total : </h4>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end">$ <span id="total">225.00</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="" method="post">
                            @csrf

                            <div class="row text-center">
                                <div class="col">
                                    <button type="submit" class="btn create-button w-50 fw-bold">Checkout</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Checkout end --}}  
        </div>
    </div>

    @include('layouts.footer')

    <script src="{{ asset('js/payment.js') }}"></script>
@endsection