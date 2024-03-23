@extends('admin.layouts.app')

@section('title', 'Admin Evaluation')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/evaluation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1 class="my-4">Evaluation Products List</h1>

    <div class="row mb-4">
>>>>>>> main

        {{-- Search bar --}}
        <div class="col-6 my-2">
            <form action="#">
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
                {{-- No.1 --}}
                    <tr>
                        <td>1</td>
                        <td>Cloth</td>
                        <td>Kimono</td>
                        <td>$100</td>
                        <td>160(S)</td>
                        <td>1kg</td>
                        <td>No</td>
                        <td>Kimono Shop</td>
                        <td>This is a tradistional cloth</td>
                        <td>1: Waiting for Evaluation</td>
                        <td>
                            <button class="btn btn-sm custom-button3 rounded-pill shadow montserrat" data-bs-toggle="modal" data-bs-target="#change-status">Change Status</button>
                            @include('admin.assessor.modal.status')
                        </td>
                    </tr>
                    {{-- No.2 --}}
                    <tr>
                        <td>2</td>
                        <td>Dish</td>
                        <td>Arita-yaki</td>
                        <td>$50</td>
                        <td>Φ20</td>
                        <td>0.5kg</td>
                        <td>Yes</td>
                        <td>Dish Shop</td>
                        <td>This is a tradistional dish</td>
                        <td>2: Evaluating</td>
    
                        <td>
                            <button class="btn btn-sm custom-button3 rounded-pill shadow montserrat" data-bs-toggle="modal" data-bs-target="#change-status">Change Status</button>
                            @include('admin.assessor.modal.status')
                        </td>
                    </tr>
                    {{-- No.3 --}}
                    <tr>
                        <td>3</td>
                        <td>Glass</td>
                        <td>Yunomi</td>
                        <td>$30</td>
                        <td>Φ10</td>
                        <td>0.7kg</td>
                        <td>Yes</td>
                        <td>Yunomi Shop</td>
                        <td>This is a kind of glass</td>
                        <td>3: Waiting for Display</td>
                        <td>
                            <button class="btn btn-sm custom-button3 rounded-pill shadow montserrat" data-bs-toggle="modal" data-bs-target="#change-status">Change Status</button>
                            @include('admin.assessor.modal.status')
                        </td>
                    </tr>
    
                    {{-- No.4 --}}
                    <tr>
                        <td>4</td>
                        <td>Doll</td>
                        <td>Hina Dolls</td>
                        <td>$80</td>
                        <td>20</td>
                        <td>20kg</td>
                        <td>No</td>
                        <td>Doll Shop</td>
                        <td>This is a tradistional Japanese culture</td>
                        <td>3: Waiting for Display</td>
                        <td>
                            <button class="btn btn-sm custom-button3 rounded-pill shadow montserrat" data-bs-toggle="modal" data-bs-target="#change-status">Change Status</button>
                            @include('admin.assessor.modal.status')
                        </td>
                    </tr>
    
                    {{-- No.5 --}}
                    <tr>
                        <td>5</td>
                        <td>Pot</td>
                        <td>Hot Pot</td>
                        <td>$200</td>
                        <td>Φ30</td>
                        <td>3kg</td>
                        <td>Yes</td>
                        <td>Pot Store</td>
                        <td>This is a tradistional pot</td>
                        <td>4: Suspended</td>
                        <td>
                            <button class="btn btn-sm custom-button3 rounded-pill shadow montserrat" data-bs-toggle="modal" data-bs-target="#change-status">Change Status</button>
                            @include('admin.assessor.modal.status')
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

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