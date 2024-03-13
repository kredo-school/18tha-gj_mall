@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @include('layouts.navbar')
    
    <div class="container-fluid">

        <div class="row mb-5">
            <div class="col p-0">
                {{-- Carousel --}}
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 450px;">
                            <img src="{{ asset('images/account/bg-admin.png') }}" class="d-block w-100" alt="...">
                            <div id="content" class="carousel-caption d-block text-white">
                                <h4>Ads Title</h4>
                                <p class="lead">Description here.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 450px;">
                            <img src="{{ asset('images/account/bg-seller.png') }}" class="d-block w-100" alt="...">
                            <div id="content" class="carousel-caption d-none d-md-block text-white">
                                <h4>Ads Title</h4>
                                <p class="lead">Description here.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 450px;">
                            <img src="{{ asset('images/account/bg-customer.png') }}" class="d-block w-100" alt="...">
                            <div id="content" class="carousel-caption d-none d-md-block text-white">
                                <h4>Ads Title</h4>
                                <p class="lead">Description here.</p>
                            </div>
                        </div>
                    </div>
                  </div>
                {{-- Carousel end --}}
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                {{-- Seller Info --}}
                <div class="row mb-4 mx-auto">

                    <div class="col-6">
                        <div class="text-center">
                            <img src="{{ asset('images/account/bg-customer.png') }}" class="rounded img-fluid mx-auto d-block" alt="shopImage" style="width: 800px; height: 550px;">
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="row mx-auto mb-3">
                            <div class="col">
                                <h2 class="h4 fw-bold">Shop Name</h2>
                                <p class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis sint earum rem veritatis culpa. Perspiciatis beatae molestias officia maiores numquam, pariatur inventore eius ipsam magnam consequatur vero sunt amet quae!
                                Optio et vel eos? Odio, fugiat? Eaque eveniet sequi, tempora, dolorem inventore odit ab qui nam impedit delectus reiciendis, error nemo dolores dolorum quasi accusantium. Officia possimus perferendis commodi qui.
                                Reiciendis dolorum ratione, necessitatibus, esse fuga aspernatur eligendi eos facere dolores mollitia nesciunt sapiente autem, doloribus est aut modi molestias laborum quibusdam impedit corrupti sed eaque voluptas expedita. Cum, asperiores?
                                Impedit magni id consequuntur assumenda? Saepe minus suscipit, numquam a magni quos dolor impedit molestias corrupti totam assumenda illum earum voluptatum esse ratione ad ullam hic eum? Molestias, repudiandae perspiciatis!
                                Beatae rerum praesentium eius tempora architecto omnis aliquid, repellat doloremque odio illum error, commodi minus! Doloremque possimus ad quibusdam dolores ullam atque reprehenderit, blanditiis aspernatur magni, distinctio sit voluptates excepturi.
                                Molestias molestiae, corrupti dolorum nulla repudiandae eaque iusto ratione consectetur numquam minus, hic voluptatem, quas possimus aperiam adipisci in? Molestias, similique? Eveniet laboriosam officiis ducimus saepe odio. Totam, atque dolores!</p>
                            </div>
                        </div>

                        <div class="row mx-auto mb-3">
                            <div class="col">
                                <h2 class="h4 fw-bold">Address</h2>
                                <p class="h6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>

                        <div class="row mx-auto mb-5">
                            <div class="col">
                                <h2 class="h4 fw-bold">Contact Us</h2>
                                <p class="h6">Email : <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span></p>
                                <p class="h6">Phone Number : <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span></p>
                            </div>
                        </div>

                        <div class="row mx-auto">
                            <div class="col">
                                <div class="text-center">
                                    <button type="button" class="btn edit-button w-50 normal-button fw-bold">Shop Product List</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                {{-- Seller Info end --}}

            </div>
        </div>

    </div>

    @include('layouts.footer')
@endsection