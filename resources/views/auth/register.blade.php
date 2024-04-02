{{-- Login Register CSS --}}
<link rel="stylesheet" href="{{ asset('css/customer/auth/authPage.css') }}">

<script src="/js/app.js"></script>

@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container-fluid register-background-image">
    <!-- Logo-->
    <div class="row">
        <div class="col-md-6">
            <div class="">
                <div class="ms-0">
                    <a  href="{{ url('/home') }}" class="logo-img">
                        <img src="{{ asset('images/common/logo.svg') }}" alt="logo" style="width: 150px; height:150px;">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contents-->
    <div class="row align-items-center">
        <div class="col-md-6 mb-4">
            <div class="row mb-0">
                <div class="col-auto mx-auto mt-5">
                    <h2 class="h1 fw-bold">Create an Account</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-auto mx-auto">
                    <a href="{{ url('/customer/signIn') }}" class="h5 text-danger fw-bold fs-none">Do you already have an account ?</a>
                </div>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="row mb-3">
                    <div class="col-8 mx-auto">
                        <div class="row">
                            <div class="col">
                                <label for="first_name" class="h4 form-label text-me-start fw-bold">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autofocus placeholder=" ">
        
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="last_name" class="h4 form-label text-me-start fw-bold">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder=" ">
        
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="row mb-0">
                    <div class="col-8 mx-auto">
                        <label for="email" class="h4 form-label text-me-start fw-bold">{{ __('E-Mail') }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8 mx-auto">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder=" ">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Passward -->
                <div class="row mb-0">
                    <div class="col-8 mx-auto">
                        <label for="password" class="h4 form-label text-start fw-bold">{{ __('Password') }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8 mx-auto">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder=" ">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="row mb-0">
                    <div class="col-8 mx-auto">
                        <label for="password-confirm" class="h4 form-label text-start fw-bold">{{ __('Confrim Password') }}</label>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-8 mx-auto">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="current-password" placeholder=" ">
                    </div>
                </div>

                <!-- Register Button -->
                <div class="row mb-3">
                    <div class="col-auto mx-auto">
                        <button type="submit" class="btn btn-dark btn-register">
                            <p class="fw-bold text-white" style="font-size: 24px;">Register</p>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
</div>
@endsection
