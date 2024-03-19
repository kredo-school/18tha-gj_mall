@extends('layouts.app')

@section('title', 'Profile Edit')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/profile/customerProfile.css') }}">

    @include('layouts.navbar')
    
    <div class="container-fluid">
        <div class="row">

            <div class="col">
                {{-- Profile --}}
                <div class="mt-5">
                    <h1 class="text-center mb-3">User Profile</h1>
                </div>
                <div class="w-75 mx-auto">
                    <form action="#" method="post">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" name="fname" id="fname" class="form-control mb-3" value="Ariana" autofocus>
    
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input type="text" name="lname" id="lname" class="form-control" value="Grande">
                                    </div>
                                    <div class="col-6  d-flex flex-column align-items-center">
                                        <img src="{{ asset('images/seller/profile_image.jpg') }}" alt="userprofile" class="rounded-circle img-fluid mb-3 d-block" style="width: 100px; height: 100px;">
    
                                        <label class="custom-file-upload montserrat">
                                            <input type="file"/>
                                            Edit Avatar
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                                value="merhabbozorgi@email.com"
                                        >
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" name="phone_number" id="phone_number"  class="form-control" value="080-7945-4839">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" name="new_password" id="new_password"  class="form-control" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="cofirm_password" class="form-label mb-2">Confirm New Password</label>
                                        <input type="password" name="cofirm_password" id="cofirm_password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Profile end --}}

                {{-- Address --}}
                <div class="mt-3">
                    <h1 class="text-center mb-3">Address</h1>
                </div>
                <div class="w-75 mx-auto">
                    <form action="#" method="post">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" name="country" id="country" class="form-control mb-3" value="America" placeholder="America">
                                    </div>
                                    <div class="col">    
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="city" id="city" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="unit-num" class="form-label">Unit Number</label>
                                        <input type="text" name="unit-num" id="unit-num" class="form-control mb-3" value="" placeholder=" ">
                                    </div>
                                    <div class="col">    
                                        <label for="st-num" class="form-label">Street Number</label>
                                        <input type="text" name="st-num" id="st-num" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">    
                                        <label for="address1" class="form-label">Address Line 1</label>
                                        <input type="text" name="address1" id="address1" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">    
                                        <label for="address2" class="form-label">Address Line 2</label>
                                        <input type="text" name="address2" id="address2" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="region" class="form-label">Region</label>
                                        <input type="text" name="region" id="region" class="form-control mb-3" value="" placeholder=" ">
                                    </div>
                                    <div class="col">    
                                        <label for="pos-code" class="form-label">Postal Code</label>
                                        <input type="text" name="pos-code" id="pos-code" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Address end --}}

                {{-- Payment --}}
                <div class="mt-3">
                    <h1 class="text-center mb-3">Payment Information</h1>
                </div>
                <div class="w-75 mx-auto">
                    <form action="#" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="John Doe" placeholder="Input your name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="card_number" class="form-label">Card Number</label>
                                        <input type="number" name="card_number" id="card_number" class="form-control" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label for="expire_date" class="form-label">Expire Date</label>
                                        <input type="date" name="expire_date" id="expire_date" class="form-control" placeholder=" ">
                                    </div>
                                    <div class="col-6">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="number" name="cvv" id="cvv" class="form-control" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Payment end --}}
            </div>

            <div class="text-center mb-5">
                <button type="submit" class="btn edit-button w-25">Save</button>
            </div>
            
        </div>
    </div>

    @include('layouts.footer')
@endsection
