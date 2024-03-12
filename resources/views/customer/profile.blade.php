@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @include('layouts.navbar')
    
    <main class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-5 p-0 border border-1" style="height: 100vh;">
                @include('layouts.sidebar')
            </div>
            <div class="col-xl-9 col-md-8 col-sm-7">
                <div class="mt-5">
                    <h1 class="text-center mb-4">User Profile</h1>
                    {{-- usr profile here  --}}
                </div>
            </div>
        </div>
    </main>
@endsection