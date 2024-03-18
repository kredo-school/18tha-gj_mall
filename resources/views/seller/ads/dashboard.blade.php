@extends('seller.layouts.app')

@section('title', 'Seller Ads DashBoard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">

    <div class="row justify-content-end">
        <div class="col mb-4 ps-5">
            <h2 class="py-4">Advertisment Dashboard</h2>

            {{-- Search bar --}}
            <div class="row mt-4">
                <div class="col-8 my-2">

                    <form action="#">
                        <input type="search" name="search" placeholder="Search..." class="form-control form-control-sm">
                    </form>

                </div>
                <div class="col mt-1">
                    <a href="">
                        <button class=" btn custom-button w-100 shadow-sm">Create Advertisment
                </div>
                </a>
            </div>


            {{-- Ad lists --}}
            <div class="row">
                <div class="col">
                    <table class="table table-hover align-middle bg-white border text-center mt-2">
                        <thead class="small table-secondary text-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Product ID</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center bg-white">
                            {{-- get data from products table of the seller --}}

                            <tr>
                                <td>1</td>
                                <td>Color Valiation Added</td>
                                <td>Awsome Ad</td>
                                <td>9999</td>
                                {{-- go to edit page --}}
                                <td>
                                    <a href="" class="text-decoration-none">
                                        <i class="fa-regular fa-pen-to-square icon-edit" ></i>
                                    </a>
                                </td>
                                {{-- go to delete modal --}}
                                <td>
                                    <button class="btn text-decoration-none icon-trash" type="button" data-bs-toggle="modal"
                                        data-bs-target="#DeleteModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Coming soon</td>
                                <td>Awsome Ad</td>
                                <td>1111</td>
                                {{-- go to edit page --}}
                                <td>
                                    <a href="" class="text-decoration-none">
                                        <i class="fa-regular fa-pen-to-square icon-edit" ></i>
                                    </a>
                                </td>
                                {{-- go to delete modal --}}
                                <td>
                                    <button class="btn text-decoration-none icon-trash" type="button" data-bs-toggle="modal"
                                        data-bs-target="#DeleteModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Do not miss</td>
                                <td>Awsome Ad</td>
                                <td>3333</td>
                                {{-- go to edit page --}}
                                <td>
                                    <a href="" class="text-decoration-none">
                                        <i class="fa-regular fa-pen-to-square icon-edit" ></i>
                                    </a>
                                </td>
                                {{-- go to delete modal --}}
                                <td>
                                    <button class="btn text-decoration-none icon-trash" type="button" data-bs-toggle="modal"
                                        data-bs-target="#DeleteModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @include('seller.modalSeller.deleteAd')
                </div>
            </div>

            <div class="row my-5 me-2">
                <div class="col brand-banner mx-auto">
                    <div class="row mt-3">
                        <div class="col-auto">
                            <img src="{{ asset('images/common/Logo.png') }}" alt="gj-mall-logo" class="logo">
                        </div>
                        <div class="col">
                            <h2 class="gj-mall">GJ-MALL</h2>
                            <h4 class="sub-title">Japanese HighQuality Products E-commerce Site</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
