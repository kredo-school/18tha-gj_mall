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
            <form action="#">
                <input type="search" name="search" placeholder="Search..." class="form-control">
            </form>
        </div>
        <div class="col mt-1">

            <a href="">
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
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>TITLE</td>
                        <td>
                            <img src="{{ asset('images/banner/banner1.svg') }}" alt="product_image" id="table_image">
                        </td>
                        <td>CONTENT</td>
                        <td>PRDOCUT ID</td>
                        <td>
                            <a href="{{ url('/seller/ads/edit') }}" class="text-decoration-none">
                                <i class="fa-regular fa-pen-to-square icon-edit" ></i>
                            </a>

                            <button class="btn text-decoration-none icon-trash" type="button" data-bs-toggle="modal"
                            data-bs-target="#DeleteModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>ID</td>
                        <td>TITLE</td>
                        <td>
                            <img src="{{ asset('images/banner/banner1.svg') }}" alt="product_image" id="table_image">
                        </td>
                        <td>CONTENT</td>
                        <td>PRDOCUT ID</td>
                        <td>
                            <a href="" class="text-decoration-none">
                                <i class="fa-regular fa-pen-to-square icon-edit" ></i>
                            </a>

                            <button class="btn text-decoration-none icon-trash" type="button" data-bs-toggle="modal"
                            data-bs-target="#DeleteModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>ID</td>
                        <td>TITLE</td>
                        <td>
                            <img src="{{ asset('images/banner/banner1.svg') }}" alt="product_image" id="table_image">
                        </td>
                        <td>CONTENT</td>
                        <td>PRDOCUT ID</td>
                        <td>
                            <a href="" class="text-decoration-none">
                                <i class="fa-regular fa-pen-to-square icon-edit" ></i>
                            </a>

                            <button class="btn text-decoration-none icon-trash" type="button" data-bs-toggle="modal"
                            data-bs-target="#DeleteModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>ID</td>
                        <td>TITLE</td>
                        <td>
                            <img src="{{ asset('images/banner/banner1.svg') }}" alt="product_image" id="table_image">
                        </td>
                        <td>CONTENT</td>
                        <td>PRDOCUT ID</td>
                        <td>
                            <a href="" class="text-decoration-none">
                                <i class="fa-regular fa-pen-to-square icon-edit" ></i>
                            </a>

                            <button class="btn text-decoration-none icon-trash" type="button" data-bs-toggle="modal"
                            data-bs-target="#DeleteModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
                @include('seller.modalSeller.deleteAd')
            </table>
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
