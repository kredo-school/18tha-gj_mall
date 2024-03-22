@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

    <div class="container p-5">
        {{-- DashBoard Header  --}}
        <div class="row align-items-center mb-3">
            <div class="col">
                <h1 class="fw-bold">Dashboard</h1>
                <p>Hi User! Welcome to Admin Dashboard!</p>
            </div>
            <div class="col">
                <div class="p-3 input-group">
                    <label for="daterange" class="input-group-text">
                        <i class="fa-solid fa-calendar-days icon text-primary"></i>
                    </label>
                    <input type="text" id="daterange" name="daterange" class="form-control"/>
                </div>
            </div>
        </div>
        {{-- DashBoard Header End --}}

        {{--  Cards  --}}
        <div class="row mb-5">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('images/seller/totalOrder.svg') }}" style="width: 88px; height: 88px;">
                            </div>
                            <div class="col-auto">
                                <h2 class="fw-bold">75</h2>
                                <h5>Total Sales</h5>
                                <span class="text-muted">
                                    <i class="fa-regular fa-circle-up text-success"></i> 4%(30days)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('images/seller/totalCanceled.svg') }}" style="width: 88px; height: 88px;">
                            </div>
                            <div class="col-auto">
                                <h2 class="fw-bold">55</h2>
                                <h5>Total Cancelded</h5>
                                <span class="text-muted">
                                    <i class="fa-regular fa-circle-down text-danger"></i> 25%(30days)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('images/seller/totalSales.svg') }}" style="width: 88px; height: 88px;">
                            </div>
                            <div class="col-auto">
                                <h2 class="fw-bold">$128</h2>
                                <h5>Total Sales</h5>
                                <span class="text-muted">
                                    <i class="fa-regular fa-circle-down text-danger"></i> 12%(30days)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Cards End  --}}

        {{-- Top5 Ranking --}}
        <div class="row mb-5">
            <h2 class="fw-bold h3">Top5 BestSeller</h2>

            <div class="col">
                {{-- card item 1 start --}}
                <div class="border rounded-0 p-2 card-parent">
                    <div class="rank-num px-2">1</div>
                    <img src="{{ asset('images/items/item1.svg') }}" class="card-img-top rank-image" alt="owan">

                    <div class="product_detail mt-2">
                        <h5 class="text-truncate">Card title</h5>
                        <h5>Price</h5>
                    </div>
                </div>
                {{-- card item 1 end --}}
            </div>
            
            <div class="col">
                {{-- card item 2 start --}}
                <div class="border rounded-0 p-2 card-parent">
                    <div class="rank-num px-2">2</div>
                    <img src="{{ asset('images/items/item2.svg') }}" class="card-img-top rank-image" alt="owan">
                    <div class="product_detail mt-2">
                        <h5 class="text-truncate">Card title</h5>
                        <h5>Price</h5>
                    </div>
                </div>
                {{-- card item 2 end --}}
            </div>

            <div class="col">
                {{-- card item 3 start --}}
                <div class="border rounded-0 p-2 card-parent">
                    <div class="rank-num px-2">3</div>
                    <img src="{{ asset('images/items/item3.svg') }}" class="card-img-top rank-image" alt="owan">
                    <div class="product_detail mt-2">
                        <h5 class="text-truncate">Card title</h5>
                        <h5>Price</h5>
                    </div>
                </div>
                {{-- card item 3 end --}}
            </div>

            <div class="col">
                {{-- card item 4 start --}}
                <div class="border rounded-0 p-2 card-parent">
                    <div class="rank-num px-2">4</div>
                    <img src="{{ asset('images/items/item4.svg') }}" class="card-img-top rank-image" alt="owan">
                    <div class="product_detail mt-2">
                        <h5 class="text-truncate">Card title</h5>
                        <h5>Price</h5>
                    </div>
                </div>
                {{-- card item 4 end --}}
            </div>

            <div class="col">
                {{-- card item 5 start --}}
                <div class="border rounded-0 p-2 card-parent">
                    <div class="rank-num px-2">5</div>
                    <img src="{{ asset('images/items/item5.svg') }}" class="card-img-top rank-image" alt="owan">
                    <div class="product_detail mt-2">
                        <h5 class="text-truncate">Card title</h5>
                        <h5>Price</h5>
                    </div>
                </div>
                {{-- card item 5 end --}}
            </div>
        </div>
        {{-- Top5 Ranking end --}}

        {{-- Graph  --}}
        <div class="row">
            <div class="col-6">
                <h3 class="fw-bold">Monthly Sales</h3>
                <canvas id="monthlyPlot" style="width:100%;max-width:700px"></canvas>
            </div>
            <div class="col-6">
                <h3 class="fw-bold">Daily Sales</h3>
                <canvas id="dailyPlot" style="width:100%;max-width:700px"></canvas>
            </div>
        </div>
        {{-- Graph end --}}
    </div>
    {{-- Date-Range  --}}
    <script src="{{ asset('js/adminDashboard.js') }}"></script>
@endsection