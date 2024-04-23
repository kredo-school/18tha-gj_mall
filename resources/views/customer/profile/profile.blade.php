@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/profile/customerProfile.css') }}">

    @include('layouts.navbar')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                {{-- Edit button --}}
                <div class="text-end mt-5 mb-3 me-5">
                    <a href="{{ route('customer.showEditProfile', Auth::user()->id ) }}">
                        <button type="submit" class="btn edit-button">
                            <i class="fa-regular fa-pen-to-square"></i> Edit
                        </button>
                    </a>
                </div>
                {{-- Edit button end --}}

                {{-- Profile --}}
                <div class="mt-3">
                    <h1 class="text-center mb-3">User Profile</h1>
                </div>
                <div class="w-75 mx-auto">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <h4>First Name</h4>
                                    <p class="border-bottom mb-5">{{ $customer->first_name }}</p>

                                    <h4>Last Name</h4>
                                    <p class="border-bottom">{{ $customer->last_name }}</p>
                                </div>
                                <div class="col-6 d-flex flex-column align-items-center">
                                    @if ($customer->avatar)
                                        <img src="{{ asset('storage/images/customer/'. $customer->avatar) }}" alt="userprofile" class="rounded-circle img-fluid mb-3 d-block" style="width: 100px; height: 100px; object-fit:cover;">
                                    @else
                                        <img src="{{ asset('images/customer/no_user.svg') }}" alt="userprofile" class="rounded-circle img-fluid mb-3 d-block" style="width: 100px; height: 100px; object-fit:cover;">
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Email</h4>
                                    <p class="border-bottom">{{ $customer->email }}</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Phone Number</h4>
                                    <p class="border-bottom">{{ empty($customer->phone_number) ? 'Non-registered' : $customer->phone_number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Profile end --}}

                {{-- Address --}}
                <div class="mt-4">
                    <h1 class="text-center mb-3">Address</h1>
                </div>
                <div class="w-75 mx-auto">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Country</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->address->country->name) ? 'Non-registered' : $customer->address->country->name }}
                                    </p>
                                </div>
                                <div class="col">
                                    <h4>State/City</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->address->city) ? 'Non-registerd' : $customer->address->city }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Unit Number</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->address->unit_number) ? 'Non-registerd' : $customer->address->unit_number }}
                                    </p>
                                </div>
                                <div class="col">
                                    <h4>Street Number</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->address->street_number) ? 'Non-registerd' : $customer->address->street_number }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Address Line 1</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->address->address_line1) ? 'Non-registerd' : $customer->address->address_line1 }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Address Line 2</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->address->address_line2) ? 'Non-registerd' : $customer->address->address_line2 }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Region</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->address->country->region) ? 'Non-registerd' : $customer->address->country->region }}
                                    </p>
                                </div>
                                <div class="col">
                                    <h4>Postal Code</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->address->postal_code) ? 'Non-registerd' : $customer->address->postal_code }} 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Address end --}}

                {{-- Payment --}}
                <div class="mt-4">
                    <h1 class="text-center mb-3">Payment</h1>
                </div>
                <div class="w-75 mx-auto">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Name</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->payment->card_name) ? 'Non-registered' : $customer->payment->card_name  }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Card Number</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->payment->card_number) ? 'Non-registered' : $customer->payment->card_number}}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Expire Date</h4>
                                    <p class="border-bottom">
                                        {{ empty($customer->payment->expiry_date)  ? 'Non-registered' : $customer->payment->expiry_date }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Payment end --}}

            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
