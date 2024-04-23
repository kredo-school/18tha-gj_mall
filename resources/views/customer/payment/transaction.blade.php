@extends('layouts.app')

@section('title', 'Transaction')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/payment/transaction.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        var checkedItemIds = @json($checkedItemId);
    </script>

    @include('layouts.navbar')

    <div class="container-fluid p-0 min-vh-100">
        <div class="row px-3 ">
            {{-- address and payment info --}}
            <div class="col-7">
                {{-- address content  --}}
                <div class="row mb-3 p-2" id="header">
                    <div class="col align-self-center">
                        <h2 class="mb-0">Address Information</h2>
                    </div>
                    <div class="col text-end">
                        <button class="btn edit-button" data-bs-toggle="modal"
                            data-bs-target="#edit_address">Change</button>
                    </div>

                    {{-- payment address modal  --}}
                    @include('customer.modal.paymentAddress')
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <table class="table w-75 mx-auto table-bordered">
                            <tr>
                                <th id="table-header">Recipient</th>
                                <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            </tr>
                            <tr>
                                <th id="table-header">Address</th>
                                <td>{{ $customer?->address?->unit_number }} {{ $customer?->address?->street_number }}
                                    {{ $customer?->address?->address_line1 }} {{ $customer?->address?->address_line2 }}
                                    {{ $customer?->address?->city }} {{ $customer?->address?->postal_code }}
                                    {{ $customer?->address?->country->name }}</td>
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
                        <table class="table w-75 mx-auto table-bordered text-center align-middle">
                            <tr>
                                <th id="table-header">Card Number</th>
                                <th id="table-header">Expired Date</th>
                                <th id="table-header">CVV</th>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa-brands fa-cc-visa icon text-dark"></i>
                                    <span>{{ $customer->payment->card_number }}</span>
                                </td>
                                <td>{{ $customer->payment->expiry_date }}</td>
                                <td>
                                    <input type="password" name="cvv" id="cvv" class="form-control"
                                        placeholder=" " maxlength="3"
                                    >
                                </td>
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
                <div class="card mt-4 mx-auto order-card mb-5">
                    <div class="card-body">

                        <div class="row mx-auto mb-5">
                            <div class="col">
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <h3 class="fw-bold text-decoration-underline">Order Detail</h3>
                                        <p id="estimated_date_font">Estimated Delivery Date : {{ $deliver_date }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3 mx-auto">
                                    <div class="col">
                                        <h4 class="fw-bold text-start">Subtotal : </h4>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end">$ <span id="sub_total">{{ $subTotal }}</span></h4>
                                    </div>
                                </div>

                                <div class="row mt-3 mx-auto">
                                    <div class="col-7">
                                        <h4 class="fw-bold text-start">Estimated Shipping : </h4>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end">$ <span id="shipping_cost">{{ $shipping }}</span></h4>
                                    </div>
                                </div>

                                <div class="row mt-3 mx-auto">
                                    <div class="col-7">
                                        <h4 class="fw-bold text-start">Qty : </h4>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end"> <span>{{ $total_qty }}</span></h4>
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

                                <div id="total_amount" class="row mt-3 mx-auto" style="color: #FF3A3A;">
                                    <div class="col-7">
                                        <h4 class="fw-bold text-start">Total Amount : </h4>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end">$ <span id="total">0</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <button type="submit" id="confirm" class="btn create-button w-75 fw-bold" 
                                        {{ $customer->payment->card_name && $customer->address->address_line1 ? '' : 'disabled' }}>
                                    Confirm the Order
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- Checkout end --}}
        </div>

    </div>
    @include('layouts.footer')

    <script src="{{ asset('js/payment.js') }}"></script>
@endsection
