@extends('layouts.app')

@section('title', 'Address')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @include('layouts.navbar')
    
    <main class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-5 p-0 border border-1" style="height: 100vh;">
                @include('layouts.sidebar')
            </div>
            <div class="col-xl-9 col-md-5 col-sm-7">
                <div class="mt-5">
                    <h1 class="text-center mb-5 fw-bold">Address</h1>
                    {{-- Address --}}
                    <div class="main w-75 mx-auto">
                        <div class="row mb-0">
                            <div class="col ms-10">
                                <div class="row mb-1">
                                    <div class="col">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" name="country" id="country" class="form-control mb-3" value="America" placeholder="America">
                                    </div>
                                    <div class="col">    
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="city" id="city" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <label for="unit-num" class="form-label">Unit Number</label>
                                        <input type="text" name="unit-num" id="unit-num" class="form-control mb-3" value="" placeholder=" ">
                                    </div>
                                    <div class="col">    
                                        <label for="st-num" class="form-label">Street Number</label>
                                        <input type="text" name="st-num" id="st-num" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">    
                                        <label for="address1" class="form-label">Address Line 1</label>
                                        <input type="text" name="address1" id="address1" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">    
                                        <label for="address2" class="form-label">Address Line 2</label>
                                        <input type="text" name="address2" id="address2" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="region" class="form-label">Region</label>
                                        <input type="text" name="region" id="region" class="form-control mb-3" value="" placeholder=" ">
                                    </div>
                                    <div class="col">    
                                        <label for="pos-code" class="form-label">Postal Code</label>
                                        <input type="text" name="pos-code" id="pos-code" class="form-control" value="" placeholder=" ">
                                    </div>
                                </div>
    
                                <div class="text-center">
                                    <button type="submit" class="btn edit-button w-50">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Address end --}}
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')

@endsection