@extends('admin.layouts.app')

@section('title', 'Cutomer Support Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/customerSupport.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1 class="my-4">Customer Support</h1>

    <div class="row mb-4">
        {{-- Search bar --}}
        <div class="col-8 my-2">
            <div class="navbar-nav">
                <form action="#">
                    <input type="search" name="search" placeholder="Search..." class="form-control">
                </form>
            </div>
        </div>

        {{-- Filter button --}}
        <div class="col my-2">
            <div class="h4 fw-bold filter">Filtered By </div>
            <div class="dropdown" id="dropdown-status">
                <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ALL
                </a>
              
                <ul class="dropdown-menu h4">
                    <li><a class="dropdown-item" href="#">1: Unsolved</a></li>
                    <li><a class="dropdown-item" href="#">2: Answer</a></li>
                    <li><a class="dropdown-item" href="#">3: Solved</a></li>  
                </ul>
            </div>
        </div>
    </div>

        {{-- Table of Delivery Order List --}}
        <div class="row mb-4">
            <div class="col">
                <table class="table table-hover align-middle bg-white border text-center">
                    <thead class="small table-secondary text-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Inquiry Type</th>
                            <th>Content</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- No.1 --}}
                        <tr>
                            <td>1</td>
                            <td>About Stock</td>
                            <td>Question for the product</td>
                            <td>Is there any bigger size. I find bigger size than S size.</td>
                            <td>Taro Tanaka</td>
                            <td>1:Unsolved</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Answer</button>
                                @include('admin.inquiry.modal.customerStatus')
                            </td>
                            <td>
                                <button onclick="return confirm('外部のページへ移動します。よろしいですか？')" class="btn btn-sm custom-button3 rounded-pill shadow montserrat" type="button">Delete</button>
                            </td>
                        </tr>
                        {{-- No.2 --}}
                        <tr>
                            <td>2</td>
                            <td>About Color</td>
                            <td>Question for the product</td>
                            <td>I want to buy another color. Is there any color option?</td>
                            <td>Will Smith</td>
                            <td>2:Answer</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Answer</button>
                                @include('admin.inquiry.modal.customerStatus')
                            </td>
                            <td>
                                <button onclick="return confirm('外部のページへ移動します。よろしいですか？')" class="btn btn-sm custom-button3 rounded-pill shadow montserrat" type="button">Delete</button>
                            </td>
                        </tr>
                        {{-- No.3 --}}
                        <tr>
                            <td>3</td>
                            <td>Shipment Cost</td>
                            <td>Shipment</td>
                            <td>How much is the shipment cost to UK?</td>
                            <td>Mark Twain</td>
                            <td>2:Answer</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Answer</button>
                                @include('admin.inquiry.modal.customerStatus')
                            </td>
                            <td>
                                <button onclick="return confirm('外部のページへ移動します。よろしいですか？')" class="btn btn-sm custom-button3 rounded-pill shadow montserrat" type="button">Delete</button>
                            </td>
                        </tr>
                        
                        {{-- No.4 --}}
                        <tr>
                            <td>4</td>
                            <td>New Product</td>
                            <td>Question for the product</td>
                            <td>I want to buy the latest product. When will be it restocked? </td>
                            <td>John F. Kennedy</td>
                            <td>3:Solved</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Answer</button>
                                @include('admin.inquiry.modal.customerStatus')
                            </td>
                            <td>
                                <button onclick="return confirm('外部のページへ移動します。よろしいですか？')" class="btn btn-sm custom-button3 rounded-pill shadow montserrat" type="button">Delete</button>
                            </td>
                        </tr>
    
                        {{-- No.5 --}}
                        <tr>
                            <td>5</td>
                            <td>Delivery Time</td>
                            <td>Delivery Time</td>
                            <td>I need to get the dishes for a party. How long will it take to get?</td>
                            <td>Sutan Sjahrir</td>
                            <td>1:Unsolved</td>
                            <td>
                                <button class="btn btn-sm custom-button2 rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status">Answer</button>
                                @include('admin.inquiry.modal.customerStatus')
                            </td>
                            <td>
                                <button onclick="return confirm('外部のページへ移動します。よろしいですか？')" class="btn btn-sm custom-button3 rounded-pill shadow montserrat" type="button">Delete</button>
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