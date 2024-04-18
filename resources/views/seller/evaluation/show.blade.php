@extends('seller.layouts.app')

@section('title', 'Seller Evaluation')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/evaluation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h2 class="my-4">Evaluation Products List</h2>

    <div class="row justify-content-center pt-2 mb-4">
        {{-- Search bar --}}
        <div class="col-6 my-2">
            <div class="navbar-nav">
                <form action="{{ route('seller.evaluation.search') }}" method="GET">
                    <input type="search" name="search" placeholder="Search..." class="form-control">
                </form>
            </div>
        </div>

        {{-- Filter Button --}}
        <div class="col-6 my-2 d-flex align-self-center">
            <div class="h4 fw-bold filter">Filtered By </div>

            {{-- Status --}}
            <div class="dropdown">
                <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Status
                </a>

                <ul class="dropdown-menu h4">
                    @foreach ($product_statuses as $product_status)
                        <form action="{{ route('seller.evaluation.search') }}" method="GET">
                            <input type="text" name="status" value="{{ $product_status->id }}"
                                style="visibility: hidden; height:0px;">
                            <button class="dropdown-item montserrat" type="submit">{{ $product_status->status }}</button>
                        </form>
                    @endforeach
                </ul>
            </div>

            {{-- Category --}}
            <div class="dropdown" id="dropdown-category">
                <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" id="dropdown-category" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </a>

                <ul class="dropdown-menu h4">
                    @foreach ($categories as $category)
                        <li>
                            <form action="{{ route('seller.evaluation.search') }}" method="GET">
                                <input type="text" name="category" value="{{ $category->id }}"
                                    style="visibility: hidden; height:0px;">
                                <button class="dropdown-item montserrat" type="submit">{{ $category->id }}:
                                    {{ $category->name }}</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Table - Evaluation Product List --}}
    <table class="table table-hover bg-white border mb-4">
        <thead class="small table-secondary text-light">
            <tr>
                {{-- Table Head --}}
                <th class="vertical-center">ID</th>
                <th class="vertical-center">Category</th>
                <th class="vertical-center">Product Name</th>
                <th class="vertical-center">Price</th>
                <th class="vertical-center">Size</th>
                <th class="vertical-center">Weight</th>
                <th class="vertical-center">Fragile</th>
                <th class="vertical-center">Description</th>
                <th class="vertical-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ __("$" . $product->price) }}</td>
                    <td>{{ $product->productDetail->size }}</td>
                    <td>{{ $product->productDetail->weight }}</td>
                    <td>
                        @if ($product->productDetail->is_fragile == 1)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->productStatus->status }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $products->links() }}


    {{-- Banner --}}
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
