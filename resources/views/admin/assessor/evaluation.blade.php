@extends('admin.layouts.app')

@section('title', 'Admin Evaluation')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/evaluation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1 class="my-4">Evaluation Products List</h1>

    <div class="row mb-4">

        {{-- Search bar --}}
        <div class="col-6 my-2">
            <form action="{{ route('admin.evaluation.search') }}" method="GET">
                <input type="search" name="search" placeholder="Search..." class="form-control">
            </form>
        </div>

        {{-- Filter button --}}
        <div class="col-6 my-2">
            <div class="h4 fw-bold filter">Filtered By </div>

            {{-- Status --}}
            <div class="dropdown" id="dropdown-status">
                <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Status
                </a>
                
                <ul class="dropdown-menu h4">
                    @foreach ($product_statuses as $product_status)
                        <form action="{{ route('admin.evaluation.search') }}" method="GET">
                            <input type="text" name="status" value="{{ $product_status->id }}"
                                style="visibility: hidden; height:0px;">
                            <button class="dropdown-item montserrat" type="submit">{{ $product_status->status }}</button>
                        </form>
                @endforeach
            </ul>
            </div>

            {{-- Category --}}
            <div class="dropdown" id="dropdown-category">
                <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" id="dropdown-category" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </a>
                
                <ul class="dropdown-menu h4">
                    @foreach ($categories as $category)
                        <li>
                            <form action="{{ route('admin.evaluation.search') }}" method="GET">
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

    <div class="row mb-4">
        <div class="col">
            <table class="table table-hover align-middle border text-center">
                <thead class="small table-secondary text-light">
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Size (cm)</th>
                        <th>Weight</th>
                        <th>Fragile</th>
                        <th>Seller Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->productDetail->size }}</td>
                            <td>{{ $product->productDetail->weight }}</td>
                            <td>
                                @if ($product->productDetail->is_fragile == 0)
                                    No
                                @elseif ($product->productDetail->is_fragile == 1)
                                    Yes
                                @endif
                            </td>
                            <td>{{ $product->seller->id }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                @if ($product->status_id == 1)
                                    Exhibit Request 
                                @elseif ($product->status_id == 2)
                                    Waiting for Evaluation
                                @elseif ($product->status_id == 3)
                                    Evaluation
                                    @if ($product->status_id == 7)
                                        Suspended
                                    @endif
                                @elseif ($product->status_id == 4)
                                    Waiting for Display
                                @elseif ($product->status_id == 5)
                                    Exhibited
                                @elseif ($product->status_id == 6)
                                    Sold Out
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm custom-button3 rounded-pill shadow montserrat" data-bs-toggle="modal" data-bs-target="#change-status-{{ $product->id }}">Change Status</button>
                                @include('admin.assessor.modal.status')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $products->links() }}


    <div class="row banner mx-1">
        <div class="col-auto p-0">
            <img src="{{ asset('images/common/logo.svg') }}" alt="gj-mall-logo" class="logo">
        </div>
        <div class="col pt-4">
            <h3 class="gj-mall">GJ-MALL</h3>
            <h4 class="sub-title">Japanese HighQuality Products E-commerce Site</h4>
        </div>
    </div>

@endsection