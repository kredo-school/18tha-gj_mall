@extends('seller.layouts.app')

@section('title', 'Seller Ads DashBoard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ads.css') }}">

    <h2 class="my-4">Advertisment Dashboard</h2>

    {{-- Search bar --}}
    <div class="row mb-4">
        <div class="col-8 my-2">
            <form action="{{ route('seller.ads.dashboard') }}">
                <input type="search" name="search" placeholder="Search..." class="form-control">
            </form>
        </div>
        <div class="col mt-1">

            {{-- <a href="{{ route('seller.ads.create') }}"> --}}
            <a href="{{ route('seller.ads.create') }}">
                <button class="btn custom-button w-100 shadow-sm montserrat">Create Advertisment</button>
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <table class="table table-hover align-middle bg-white border text-center">
                <thead class="small table-secondary text-light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Product ID</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ads as $ad)
                        <tr>
                            <td>{{ $ad->id }}</td>
                            <td>{{ $ad->title }}</td>
                            <td>
                                <img src="{{ asset('storage/images/ads/'.$ad->image_name ) }}" alt="product_image" id="table_image">
                            </td>
                            <td>{{ $ad->content }}</td>
                            <td>{{ $ad->product_id }}</td>
                            <td>
                                <a href="{{ route('seller.ads.edit', $ad->id) }}" class="text-decoration-none">
                                    <i class="fa-regular fa-pen-to-square icon-edit"></i>
                                </a>
                            </td>
                            <td>
                                <button class="btn text-decoration-none icon-trash" type="button" data-bs-toggle="modal"
                                    data-bs-target="#Ad-Delete-Modal-{{$ad->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @include('seller.modalSeller.deleteAd')
                    @endforeach
                </tbody>
            </table>
            {{$ads->links()}}
        </div>
    </div>

    <div class="row brand-banner mx-1">
        <div class="col-auto p-0">
            <img src="{{ asset('images/common/logo.svg') }}" alt="gj-mall-logo" class="logo">
        </div>
        <div class="col pt-4">
            <h3 class="gj-mall">GJ-MALL</h3>
            <h4 class="sub-title">Japanese HighQuality Products E-commerce Site</h4>
        </div>
    </div>

@endsection
