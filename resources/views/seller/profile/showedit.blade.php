@extends('seller.layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/profile-showedit.css') }}">

    <div class="row justify-content-end me-3">
        <div class="col mb-4 ps-5">
            <form action="">
                <h2 class="pt-4">Edit Profile</h2>
                <div class="row mb-4">
                    <div class="col ms-10">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label for="fname" class="form-label">
                                    First Name
                                </label>
                                {{-- <input type="text" name="fname" id="fname" class="form-control" value="{{$first_name}} style="background-color: #FFFFFF;" >  --}}
                                <input type="text" name="fname" id="fname" class="form-control"
                                    placeholder="Merhab" style="background-color: #FFFFFF;">
                            </div>
                            <div class="col-6">
                                <label for="lname" class="form-label">
                                    Last Name
                                </label>
                                {{-- <input type="text" name="lname" id="lname" class="form-control" value="{{$last_name}} style="background-color: #FFFFFF;" >  --}}
                                <input type="text" placeholder="Bozorgi" name="lname" id="lname"
                                    class="form-control" style="background-color: #FFFFFF;">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="email" class="form-label">
                                    Email
                                </label>
                                {{-- <input type="text" name="fname" id="fname" class="form-control" value="{{$email}}" style="background-color: FFFFFF;"> --}}
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="merhabbozorgi@email.com" style="background-color: #FFFFFF;">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="password" class="form-label">
                                    Password
                                </label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto" style="position: relative; display: inline-block;">
                        <img src="{{ asset('images/seller/profile_image.jpg') }}" alt="man_picture"
                            class="rounded rounded-circle mx-auto d-block align-middle img-fluid">

                        <label class="rounded-circle text-white d-inline overlay-plus">
                            <input type="file" style="display: none;">
                            +
                        </label>
                    </div>
                </div>

                <h2 class="mt-6">Address</h2>
                <label for="address1" class="form-label">Address1</label>
                <input type="text" name="address1" id="address1" class="form-control mb-4">
                <label for="address2" class="form-label">Address2</label>
                <input type="text" name="address2" id="address2" class="form-control mb-4">

                <div class="row mb-4">
                    <div class="col-4">
                        <label for="street" class="form-label">Street Address</label>
                        <input type="text" name="street" id="street" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="unitnumber" class="form-label">Unit Number</label>
                        <input type="text" name="unitnumber" id="unitnumber" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-4">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" id="country" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="region" class="form-label">Region</label>
                        <input type="text" name="region" id="region" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="postalcode" class="form-label">Postal Code</label>
                        <input type="text" name="postalcode" id="postalcode" class="form-control">
                    </div>
                </div>

                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="5" class="form-control"></textarea>

                <div class="row mt-4">
                    <div class="col-4 mx-auto">
                        <button class="btn w-100 text-center text-white" style="background-color: #0AA873;">
                            Save
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
