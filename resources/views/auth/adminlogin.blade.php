{{-- Login Register CSS --}}
<link rel="stylesheet" href="{{ asset('css/customer/auth/authPage.css') }}">

<script src="/js/app.js"></script>

@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
<div class="container-fluid admin-login-background-image">
    <!-- Logo-->
    <div class="row">
        <div class="col-md-6 mb-3">
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
        <div class="col-md-6 mb-5">
            <div class="row mb-3">
                <div class="col-auto mx-auto mt-5">
                    <h1 class="h1 fw-bold">Welcome to GJ-MALL</h1>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-auto mx-auto">
                    <h2 class="h2 fw-bold">Sign in</h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-auto mx-auto">
                    <h1 class="h2 fw-bold">Admin Account</h1>
                </div>
            </div>

            <!-- Sign-in Form -->
            <form method="POST" action="{{ route('admin.signIn') }}">
                @csrf

                <!-- E-mail -->
                <div class="row mb-0">
                    <div class="col-8 mx-auto ">
                        <label for="email" class="h4 form-label text-me-start fw-bold">{{ __('E-Mail') }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8 mx-auto">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder=" ">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="row mb-0">
                    <div class="col-8 mx-auto">
                        <label for="password" class="h4 form-label text-start fw-bold">{{ __('Password') }}</label>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-8 mx-auto">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder=" ">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Sign-in Button -->
                <div class="row mb-5">
                    <div class="col-auto mx-auto">
                        <button type="submit" class="btn btn-dark btn-signIn">
                            <p class="fw-bold text-white" style="font-size: 24px;">Sign in</p>
                        </button>

                    </div>
                </div>

            </form>

            <div class="row mb-5">
                <div class="col-auto mx-auto">
                    <a href="{{ route('password.request') }}" class="h5 fw-bold text-secondary">Forget your password click here.</a>
                </div>
            </div>
            
        </div>
    </div>
    
</div>
@endsection
