@extends('seller.layouts.app')

@section('title', 'Seller Profile Edit')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/profileShowedit.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <div class="row justify-content-end me-3">
        <div class="col mb-4 ps-5">
            <form action="{{ route('seller.profile.updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <h1 class="pt-4 fw-bold mb-3">Edit Profile</h1>
                <div class="row mb-4">
                    <div class="col ms-10">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label for="fname" class="form-label">
                                    First Name
                                </label>
                                <input type="text" name="fname" id="fname" class="form-control bg-white"
                                    value="{{ old('fname', $seller->first_name) }}">
                                @error('fname')
                                    <div class="small text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="lname" class="form-label">
                                    Last Name
                                </label>
                                <input type="text" value="{{ old('lname', $seller->last_name) }}" name="lname"
                                    id="lname" class="form-control bg-white">
                                @error('lname')
                                    <div class="small text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="email" class="form-label">
                                    Email
                                </label>
                                <input type="text" name="email" id="email" class="form-control bg-white"
                                    value="{{ old('email', $seller->email) }}">
                                @error('email')
                                    <div class="small text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="phone" class="form-label">
                                    Phone Number
                                </label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    values="{{ old('phone', $seller->phone_number) }}">
                            </div>
                            @error('phone')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-auto" style="position: relative; display: inline-block;">
                        <label class="rounded-circle text-white d-inline overlay-plus">
                            <input type="file" style="display: none;" id="cat_image" name="image">
                            +
                        </label>
                        @if ($seller->avatar)
                            <img src="{{ asset('storage/images/sellers/' . $seller->avatar) }}" alt="man_picture"
                                class="rounded rounded-circle mx-auto d-block align-middle img-fluid" id="category-img-tag"
                                style="height:300px; width:300px;">
                        @else
                            <img src="{{ asset('storage/images/sellers/User_icon.svg') }}" alt="man_picture"
                                class="rounded rounded-circle mx-auto d-block align-middle img-fluid" id="category-img-tag"
                                style="height:300px; width:300px;">
                        @endif

                    </div>
                    @error('image')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h1 class="fw-bold mb-3">Address</h1>
                @if ($seller->address)
                    <label for="address1" class="form-label">Address1</label>
                    <input type="text" name="address1" id="address1" class="form-control mb-4"
                        value="{{ old('address1', $seller->address->address_line1) }}">
                    @error('address1')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                    <label for="address2" class="form-label">Address2</label>
                    <input type="text" name="address2" id="address2" class="form-control mb-4"
                        value="{{ old('address2', $seller->address->address_line2) }}">
                    @error('address2')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="street" class="form-label">Street Address</label>
                            <input type="text" name="street" id="street" class="form-control"
                                value="{{ old('street', $seller->address->street_number) }}">
                            @error('street')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="unitnumber" class="form-label">Unit Number</label>
                            <input type="text" name="unitnumber" id="unitnumber" class="form-control"
                                value="{{ old('unitnumber', $seller->address->unit_number) }}">
                            @error('unitnumber')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" class="form-control"
                                value="{{ old('city', $seller->address->city) }}">
                            @error('city')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country" class="form-control">
                                @foreach ($countries as $country)
                                    @if ($seller->address->country_code == $country->alpha3)
                                        <option value="{{ $country->alpha3 }}" selected>{{ $country->name }}</option>
                                    @else
                                        <option value="{{ $country->alpha3 }}">{{ $country->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('country')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-4">
                    <label for="region" class="form-label">Region</label>
                    <input type="text" name="region" id="region" class="form-control">
                </div> --}}
                        <div class="col-6">
                            <label for="postalcode" class="form-label">Postal Code</label>
                            <input type="text" name="postalcode" id="postalcode" class="form-control"
                                value="{{ old('postalcode', $seller->address->postal_code) }}">
                        </div>
                        @error('postalcode')
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $seller->description) }}</textarea>
                    @error('description')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                @else
                    <label for="address1" class="form-label">Address1</label>
                    <input type="text" name="address1" id="address1" class="form-control mb-4"
                        value="{{ old('address1') }}">
                    @error('address1')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                    <label for="address2" class="form-label">Address2</label>
                    <input type="text" name="address2" id="address2" class="form-control mb-4"
                        value="{{ old('address2') }}">
                    @error('address2')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="street" class="form-label">Street Address</label>
                            <input type="text" name="street" id="street" class="form-control"
                                value="{{ old('street') }}">
                            @error('street')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="unitnumber" class="form-label">Unit Number</label>
                            <input type="text" name="unitnumber" id="unitnumber" class="form-control"
                                value="{{ old('unitnumber') }}">
                            @error('unitnumber')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" class="form-control"
                                value="{{ old('city') }}">
                            @error('city')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country" class="form-control">
                                <option diabled>Select the country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->alpha3 }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-4">
                <label for="region" class="form-label">Region</label>
                <input type="text" name="region" id="region" class="form-control">
            </div> --}}
                        <div class="col-6">
                            <label for="postalcode" class="form-label">Postal Code</label>
                            <input type="text" name="postalcode" id="postalcode" class="form-control"
                                value="{{ old('postalcode') }}">
                        </div>
                        @error('postalcode')
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                @endif

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
    <script src="{{ asset('js/sellerProfileEdit.js') }}"></script>

@endsection
