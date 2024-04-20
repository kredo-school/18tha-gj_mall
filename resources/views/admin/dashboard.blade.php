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
                <p>Hi {{ $admin->first_name }} {{ $admin->last_name }}! Welcome to Admin Dashboard!</p>
            </div>
        </div>
        {{-- DashBoard Header End --}}

        {{--  Cards  --}}
        <div class="row mb-5">
            <div class="col-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('images/seller/totalOrder.svg') }}" class="card-img-size">
                            </div>
                            <div class="col-auto">
                                <h2 class="fw-bold">{{ $yesterday_qty }}</h2>
                                <h5>Total Sales</h5>
                                <span class="text-muted">
                                    @if ($percentage_change_qty < 0)
                                        <i class="fa-regular fa-circle-down text-danger"></i>
                                    @else
                                        <i class="fa-regular fa-circle-up text-success"></i>
                                    @endif
                                    {{ round($percentage_change_qty) }}%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('images/seller/totalSales.svg') }}" class="card-img-size">
                            </div>
                            <div class="col-auto">
                                <h2 class="fw-bold">${{ number_format($yesterday_sales, 2) }}</h2>
                                <h5>Total Sales</h5>
                                <span class="text-muted">
                                    @if ($percentage_change_sales < 0)
                                        <i class="fa-regular fa-circle-down text-danger"></i>
                                    @else
                                        <i class="fa-regular fa-circle-up text-success"></i>
                                    @endif
                                    {{ round($percentage_change_sales) }}%
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

            @forelse ($top_products as $product)
                <div class="col-auto">
                    <div class="border rounded-0 p-2 card-parent">
                        <div class="rank-num px-2">{{ $loop->index + 1 }}</div>
                        @if ($product->productImage->isNotEmpty())
                            <img src="{{ asset('storage/images/items/' . $product->productImage->first()->productImages->image) }}"
                                class="card-img-top rank-image" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/items/no-image.svg') }}" alt="Product Image"
                                class="card-img-top rank-image">
                        @endif

                        <div class="product_detail mt-2">
                            <h5 class="text-truncate" style="width: 150px">{{ $product->name }}</h5>
                            <h5>${{ number_format($product->price, 2) }}</h5>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        {{-- Top5 Ranking end --}}

        {{-- Graph  --}}
        <div class="row">
            <div class="col-6">
                <h3 class="fw-bold">Monthly Sales</h3>
                <canvas id="monthlyPlot" class="graph-size" monthlyYValues="{{ json_encode($monthlyYValues) }}"
                    monthlyYValues2="{{ json_encode($monthlyYValues2) }}"
                    data-year="{{ Carbon\Carbon::now()->format('Y') }}">
                </canvas>
            </div>
            <div class="col-6">
                <h3 class="fw-bold">Daily Sales</h3>
                <canvas id="dailyPlot" class="graph-size" data-sales-data="{{ json_encode($dailySalesData) }}">
                </canvas>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <h3 class="fw-bold">Daily Pageviews</h3>
                <h6>Recent 7Days</h6>
                <canvas id="pageViewPlot" class="graph-size" labels="{{ json_encode($labels) }}"
                    pageviews="{{ json_encode($pageviews) }}">
                </canvas>
            </div>
            <div class="col-6">
                <h3 class="fw-bold">Page View Rankings</h3>
                <h6>Total views of Recent 7Days</h6>
                <canvas id="pageRankingPlot" class="graph-size" paths="{{ json_encode($paths) }}"
                    ranking_pageviews="{{ json_encode($ranking_pageviews) }}">
                </canvas>
            </div>
        </div>
        {{-- Graph end --}}
    </div>

    {{-- Date-Range  --}}
    <script src="{{ asset('js/adminDashboard.js') }}"></script>
@endsection
