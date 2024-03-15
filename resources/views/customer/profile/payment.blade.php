@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bannar.css') }}">

    @include('layouts.navbar')
    
    <main class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-5 p-0 border border-1" style="height: 100vh;">
                @include('layouts.sidebar')
            </div>
            <div class="col-xl-9 col-md-8 col-sm-7">
                <div class="mt-5">
                    <h1 class="text-center mb-4">Payment Information</h1>
                    
                    <main class="w-50 mx-auto">
                        <form action="" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="John Doe" placeholder="Input your name" autofocus>
                            </div>

                            <div class="mb-4">
                                <label for="card_number" class="form-label">Card Number</label>
                                <input type="number" name="card_number" id="card_number" class="form-control">
                            </div>

                            <div class="row mb-5">
                                <div class="col-6">
                                    <label for="expire_date" class="form-label">Expire Date</label>
                                    <input type="date" name="expire_date" id="expire_date" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="number" name="cvv" id="cvv" class="form-control">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn edit-button w-75">Save</button>
                            </div>
                        </form>
                    </main>
                </div>

                {{-- banner  --}}
                <div class="mt-5 w-75 mx-auto">
                    <div class="banner-container">
                        <img src="{{ asset('images/banner/banner1.png') }}" alt="banner" class="banner-image">
                        <div class="text-overlay">
                            <img src="{{ asset('images/common/Logo.png') }}" alt="logo" class="logo">
                            <div class="text-content">
                                <h1 class="d-inline">GJ-MALL</h1>
                                <div class="description">
                                    <p>Japanese High Quality Products E-commerce Site</p>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                {{-- banner  --}}
            </div>
        </div>
    </main>
@endsection