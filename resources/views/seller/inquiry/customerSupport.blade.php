@extends('seller.layouts.app')

@section('title', 'Seller Cutomer Support')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/customerSupport.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
    <div class="container main">
        <div class="row justify-content-center pt-3">
            <h1 class="h2 fw-bold">Customer Support</h1>

            {{-- Search bar --}}
            <div class="col-6 my-2">
                <div class="navbar-nav">
                    <form action="#">
                        <input type="search" name="search" placeholder="Search..." class="form-control form-control-sm">
                    </form>
                </div>
            </div>
            {{-- Filter button --}}
            <div class="col-6">
                <div class="fw-bold filter main">Filtered By </div> 
                <div class="dropdown">
                    <a class="btn dropdown-toggle ms-2 mb-2 montserrat" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      ALL
                    </a>
                  
                    <ul class="dropdown-menu main">
                      <li><a class="dropdown-item" href="#">1: Unsolved</a></li>
                      <li><a class="dropdown-item" href="#">2: Answer</a></li>
                      <li><a class="dropdown-item" href="#">3: Solved</a></li>
                    </ul>
                </div>            
            </div>

            {{-- Table of Delivery Order List --}}
            <div class="table main">
                <table class="table table-hover align-middle bg-white border">
                    <thead class="table-secondary text-light fw-bold">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Inquiry Type</th>
                            <th>Content</th>
                            <th>Customer</th>
                            <th>Status</th>
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
                            <td>1: Unsolved</td>
                        </tr>
                        {{-- No.2 --}}
                        <tr>
                            <td>2</td>
                            <td>About Color</td>
                            <td>Question for the product</td>
                            <td>I want to buy another color. Is there any color option?</td>
                            <td>Will Smith</td>
                            <td>2: Answer</td>
                        </tr>
                        {{-- No.3 --}}
                        <tr>
                            <td>3</td>
                            <td>Shipment Cost</td>
                            <td>Shipment</td>
                            <td>How much is the shipment cost to UK?</td>
                            <td>Mark Twain</td>
                            <td>2: Answer</td>
                        </tr>
                        
                        {{-- No.4 --}}
                        <tr>
                            <td>4</td>
                            <td>New Product</td>
                            <td>Question for the product</td>
                            <td>I want to buy the latest product. When will be it restocked? </td>
                            <td>John F. Kennedy</td>
                            <td>3: Solved</td>
                        </tr>

                        {{-- No.5 --}}
                        <tr>
                            <td>5</td>
                            <td>Delivery Time</td>
                            <td>Delivery Time</td>
                            <td>I need to get the dishes for a party. How long will it take to get?</td>
                            <td>Sutan Sjahrir</td>
                            <td>1: Unsolved</td>
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