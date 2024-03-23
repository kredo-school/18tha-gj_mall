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
                    <a href="{{ url('/customer/profile/editProfile') }}">
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
                                    <p class="border-bottom mb-5">Ariana</p>

                                    <h4>Last Name</h4>
                                    <p class="border-bottom">Grande</p>
                                </div>
                                <div class="col-6 d-flex flex-column align-items-center">
                                    <img src="{{ asset('images/seller/profileImage.svg') }}" alt="userprofile" class="rounded-circle img-fluid d-block" style="width: 150px; height: 150px;">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Email</h4>
                                    <p class="border-bottom">merhabbozorgi@email.com</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Phone Number</h4>
                                    <p class="border-bottom">080-7945-4839</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Password</h4>
                                    <p class="border-bottom">********</p>
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
                                    <p class="border-bottom">America</p>
                                </div>
                                <div class="col">
                                    <h4>City</h4>
                                    <p class="border-bottom">XXXXXXX</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Unit Number</h4>
                                    <p class="border-bottom">XXXXXXX</p>
                                </div>
                                <div class="col">
                                    <h4>Street Number</h4>
                                    <p class="border-bottom">XXXXXXX</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Address Line 1</h4>
                                    <p class="border-bottom">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Address Line 2</h4>
                                    <p class="border-bottom"></p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Region</h4>
                                    <p class="border-bottom">XXXXXXXXXXXXX</p>
                                </div>
                                <div class="col">
                                    <h4>Postal Code</h4>
                                    <p class="border-bottom">XXXX-XXXXX</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Address end --}}

                {{-- Payment --}}
                <div class="mt-4">
                    <h1 class="text-center mb-3">Payment Information</h1>
                </div>
                <div class="w-75 mx-auto">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Name</h4>
                                    <p class="border-bottom">ARIANA GRANDE</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <h4>Card Number</h4>
                                    <p class="border-bottom">XXXXXXXXXXXXXXXX</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <h4>Expire Date</h4>
                                    <p class="border-bottom">XXXX/XX/XX</p>
                                </div>
                                <div class="col-6">
                                    <h4>CVV</h4>
                                    <p class="border-bottom">XXX</p>
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
