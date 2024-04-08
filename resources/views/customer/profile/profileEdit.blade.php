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
                    <form action="{{ route('customer.updateProfile', [$customer->id, $customer->address->id, $customer->payment->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" name="fname" id="fname" class="form-control mb-3" value="{{ old('fname', $customer->first_name) }}" autofocus>
                                        @error('fname')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
    
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input type="text" name="lname" id="lname" class="form-control" value="{{ old('lname', $customer->last_name) }}">
                                        @error('lname')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6  d-flex flex-column align-items-center">
                                        @if ($customer->avatar)
                                            <img id="avatarPreview" src="{{ asset('storage/images/customer/'. $customer->avatar) }}" alt="userprofile" class="rounded-circle img-fluid mb-3 d-block" style="width: 100px; height: 100px; object-fit:cover;">
                                        @else
                                            <img id="avatarPreview" src="{{ asset('images/customer/no_user.svg') }}" alt="userprofile" class="rounded-circle img-fluid mb-3 d-block" style="width: 100px; height: 100px; object-fit:cover;">
                                        @endif
                                    
                                        <label class="custom-file-upload montserrat">
                                            <input type="file" name="avatar" id="avatar" class="form-control mb-3" accept="image/*">
                                            Edit Avatar
                                        </label>
                                        @error('avatar')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                                value="{{ old('email', $customer->email) }}">
                                        @error('email')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" name="phone_number" id="phone_number"  class="form-control" value="{{ old('phone_number', $customer->phone_number)  }}">
                                        @error('phone_number')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" name="new_password" id="new_password"  class="form-control" placeholder="New Password">
                                    </div>
                                    @error('new_password')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="confirm_password" class="form-label mb-2">Confirm New Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Address --}}
                        <h1 class="text-center mb-3">Address</h1>
  
                        <div class="row">
                            <div class="col">
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="country" class="form-label">Country</label>
                                        <select name="country" id="country" class="form-select">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->alpha3 }}" {{ $country->alpha3 == $customer->address->country_code ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">    
                                        <label for="city" class="form-label">State/City</label>
                                        <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $customer->address->city) }}" placeholder=" ">
                                        @error('city')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="unit_num" class="form-label">Unit Number</label>
                                        <input type="text" name="unit_num" id="unit_num" class="form-control mb-3" value="{{ old('unit_num', $customer->address->unit_number) }}" placeholder=" ">
                                        @error('unit_num')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">    
                                        <label for="st_num" class="form-label">Street Number</label>
                                        <input type="text" name="st_num" id="st_num" class="form-control" value="{{ old('st_num', $customer->address->street_number) }}" placeholder=" ">
                                        @error('st_num')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">    
                                        <label for="address1" class="form-label">Address Line 1</label>
                                        <input type="text" name="address1" id="address1" class="form-control" value="{{ old('address1', $customer->address->address_line1) }}" placeholder=" ">
                                        @error('address1')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">    
                                        <label for="address2" class="form-label">Address Line 2</label>
                                        <input type="text" name="address2" id="address2" class="form-control" value="{{ old('address2', $customer->address->address_line2) }}" placeholder=" ">
                                        @error('address2')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">    
                                        <label for="pos_code" class="form-label">Postal Code</label>
                                        <input type="text" name="pos_code" id="pos_code" class="form-control" value="{{ old('pos_code', $customer->address->postal_code) }}" placeholder=" ">
                                        @error('pos_code')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Address end --}}

                        {{-- Payment --}}
                        <h1 class="text-center mb-3">Payment</h1>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $customer->payment->card_name) }}" placeholder="Input your name">
                                        @error('name')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="card_number" class="form-label">Card Number</label>
                                        <input type="number" name="card_number" id="card_number" class="form-control" 
                                               value="{{ old('card_number', ($customer->payment->card_number == 0) ? '' : $customer->payment->card_number) }}" 
                                               placeholder=" " 
                                               maxlength="12"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        @error('card_number')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label for="expiry_date" class="form-label">Expire Date</label>
                                        <input type="date" name="expiry_date" id="expiry_date" class="form-control" 
                                               value="{{ (old('expiry_date') == '1970-01-01') ? '' : old('expiry_date', $customer->payment->expiry_date) }}" 
                                               placeholder=" ">
                                        @error('expiry_date')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="number" name="cvv" id="cvv" 
                                               class="form-control" 
                                               placeholder=" " 
                                               maxlength="3"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        @if ($errors->has('cvv'))
                                            <p class="small text-danger">{{ $errors->first('cvv') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mb-5">
                            <button type="submit" class="btn edit-button w-25">Save</button>
                        </div>
                         {{-- Payment end --}}
                    </form>
                </div>
                {{-- Profile end --}}

            </div>           
        </div>
    </div>

    @include('layouts.footer')

    <script src="{{ asset('js/profileEdit.js') }}"></script>
@endsection