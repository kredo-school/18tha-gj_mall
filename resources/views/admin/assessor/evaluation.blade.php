@extends('admin.layouts.app')

@section('title', 'Admin Evaluation')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/evaluation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container main">
        <div class="row justify-content-center pt-2">
            <h1>Evaluation Products List</h1>

            {{-- Search bar --}}
            <div class="col-6 my-2">
                <div class="navbar-nav">
                    <form action="#">
                        <input type="search" name="search" placeholder="Search..." class="form-control form-control-sm">
                    </form>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="fw-bold filter montserrat ">Filtered By </div>
                <button class="btn btn-sm custom-button1 rounded-pill shadow">Status</button>
                <button class="btn btn-sm custom-button2 rounded-pill shadow">Category</button>
            </div>

            <div class="table main">
                <table class="table table-hover align-middle border">
                    <thead class="small table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Size (cm)</th>
                            <th>Weight</th>
                            <th>is Fragile</th>
                            <th>Seller Name</th>
                            <th>Description</th>
                            <th>Status</th>
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
                            <td>
                            <button class="btn btn-sm custom-button3 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Change Status</button>
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
                            <td>
                                <button class="btn btn-sm custom-button3 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Change Status</button>

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
                            <td>
                                <button class="btn btn-sm custom-button3 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Change Status</button>

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
                            <td>
                                <button class="btn btn-sm custom-button3 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Change Status</button>

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
                            <td>
                                <button class="btn btn-sm custom-button3 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Change Status</button>

                                @include('admin.assessor.modal.status')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row my-5">
            <div class="col banner mx-auto">
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
@endsection