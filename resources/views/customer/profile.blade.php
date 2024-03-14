@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customerProfile.css') }}">

    @include('layouts.navbar')
    
    <main class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-5 p-0 border border-1" style="height: 100vh;">
                @include('layouts.sidebar')
            </div>
            <div class="col-xl-9 col-md-8 col-sm-7">
                <div class="mt-5">
                    <h1 class="text-center mb-4">User Profile</h1>
                    {{-- usr profile --}}
                    <div class="main w-75 mx-auto">
                        <form action="" method="post">
                            @csrf

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" name="fname" id="fname" class="form-control mb-3" value="Ariana">
        
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input type="text" name="lname" id="lname" class="form-control" value="Grande">
                                        </div>
                                        <div class="col-6  d-flex flex-column align-items-center">
                                            <img src="{{ asset('images/seller/profile_image.jpg') }}" alt="userprofile" class="rounded-circle img-fluid mb-3 d-block" style="width: 100px; height: 100px;">
        
                                            <label class="custom-file-upload">
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
        
                                    <div class="text-center">
                                        <button type="submit" class="btn edit-button w-50">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- usr profile end --}}
                </div>
            </div>
        </div>
    </main>
@endsection
