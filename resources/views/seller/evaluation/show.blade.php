@extends('seller.layouts.app')

@section('title', 'Seller Evaluation')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/evaluation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1 class="my-4">Evaluation Products List</h1>
    
    <div class="row justify-content-center pt-2 mb-4">
        {{-- Search bar --}}
        <div class="col-6 my-2">
            <div class="navbar-nav">
                <form action="#">
                    <input type="search" name="search" placeholder="Search..." class="form-control">
                </form>
            </div>
        </div>

        {{-- Filter Button --}}
        <div class="col-6 my-2 d-flex align-self-center">
            <div class="h4 fw-bold filter">Filtered By </div>

            {{-- Status --}}
            <div class="dropdown">
                <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Status
                </a>
                
                <ul class="dropdown-menu h4">
                    <li><a class="dropdown-item" href="#">1: Waiting for Evaluation</a></li>
                    <li><a class="dropdown-item" href="#">2: Evaluating</a></li>
                    <li><a class="dropdown-item" href="#">3: Waiting for Display</a></li>
                    <li><a class="dropdown-item" href="#">4: Suspended</a></li>
                </ul>
            </div>

            {{-- Category --}}
            <div class="dropdown" id="dropdown-category">
                <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" id="dropdown-category" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </a>
                
                <ul class="dropdown-menu h4">
                    <li><a class="dropdown-item" href="#">1: Cloth</a></li>
                    <li><a class="dropdown-item" href="#">2: Dish</a></li>
                    <li><a class="dropdown-item" href="#">3: Glass</a></li>
                    <li><a class="dropdown-item" href="#">4: Doll</a></li>
                    <li><a class="dropdown-item" href="#">5: Pot</a></li>
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
                <th class="vertical-center">Seller Name</th>
                <th class="vertical-center">Description</th>
                <th class="vertical-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- No.1 --}}
                <td>1</td>
                <td>Cloth</td>
                <td>Kimono</td>
                <td>$100</td>
                <td>160cm(S)</td>
                <td>1kg</td>
                <td>No</td>
                <td>Kimono Shop</td>
                <td>This is a tradistional cloth</td>
                <td>1: Waiting for Evaluation</td>
            </tr>
            <tr>
                {{-- No.2 --}}
                <td>2</td>
                <td>Dish</td>
                <td>Arita-yaki</td>
                <td>$50</td>
                <td>160cm(S)</td>
                <td>0.5kg</td>
                <td>Yes</td>
                <td>Dish Shop</td>
                <td>This is a tradistional dish</td>
                <td>2: Evaluating</td>
            </tr>
            <tr>
                {{-- No.3 --}}
                <td>3</td>
                <td>xxx</td>
                <td>xxx</td>
                <td>$500</td>
                <td>xxx</td>
                <td>10kg</td>
                <td>No</td>
                <td>xxx Shop</td>
                <td>xxxxxxxxxxx</td>
                <td>3: Waiting for Display</td>
            </tr>
            <tr>
                {{-- No.4 --}}
                <td>4</td>
                <td>xxx</td>
                <td>xxx</td>
                <td>$250</td>
                <td>xxx</td>
                <td>6kg</td>
                <td>No</td>
                <td>xxx Shop</td>
                <td>xxxxxxxxxxx</td>
                <td>4: Suspended</td>
            </tr>
            <tr>
                {{-- No.5 --}}
                <td>5</td>
                <td>xxx</td>
                <td>xxx</td>
                <td>$50</td>
                <td>xxx</td>
                <td>1kg</td>
                <td>No</td>
                <td>xxx Shop</td>
                <td>xxxxxxxxxxx</td>
                <td>3: Waiting for Display</td>
            </tr>                        
        </tbody>
    </table>
    

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