@extends('seller.layouts.app')

@section('title', 'Seller DashBoard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/sellerDashboard.css') }}">

    <div class="container p-5">
        <div class="row justify-content-end">
            <div class="col">
                <h1 class="fw-bold">Sales Dashboard</h1>
                <p>Hi User! Welcome to Sales Dashboard!</p>

                <div class="row mt-4">
                    <div class="col-3 py-3">
                        <h3 class="fw-bold">Today's Date</h3>
                        <div class="card shadow-sm mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('images/seller/totalOrder.png') }}">
                                    </div>
                                    <div class="col-auto ms-3">
                                        {{-- insert total number of sales order in that day of the shop --}}
                                        <h5>Total Orders</h5>
                                        <h2>75</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('images/seller/totalSales.png') }}">
                                    </div>
                                    <div class="col-auto ms-3">
                                        {{-- insert total sales in that day of the shop --}}
                                        <h5>Total Sales</h5>
                                        <h2>$1,500</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 text-center py-3">
                        {{-- Search bar --}}
                        <div class="row mb-4">
                            <div class="col-8">
                                <form action="#">
                                    <input type="search" name="search" placeholder="Search..."
                                        class="form-control form-control-sm">
                                </form>
                            </div>
                            <div class="col-4">
                                Filtered By
                                <button class="btn btn-sm bg-dark rounded-pill text-white mx-2 shadow">Date</button>
                            </div>
                        </div>


                        <table class="table text-center table-hover align-middle bg-white border">
                            <thead class="small table-secondary text-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Product name</th>
                                    <th>Quantity sold</th>
                                    <th>Total Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Sort from the latest get about paginate 5~10 records from the DB --}}
                                {{-- No.1 --}}
                                <tr>
                                    <td>2024/3/2</td>
                                    <td>Kimono</td>
                                    <td>2</td>
                                    <td>$200</td>
                                </tr>
                                {{-- No.2 --}}
                                <tr>
                                    <td>2024/3/2</td>
                                    <td>Dish</td>
                                    <td>10</td>
                                    <td>$500</td>
                                </tr>
                                {{-- No.3 --}}
                                <tr>
                                    <td>2024/3/1</td>
                                    <td>Plate</td>
                                    <td>3</td>
                                    <td>$57</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-5">

                    <div class="col-6">
                        <h3 class="fw-bold">Monthly Sales</h3>
                        {{-- <div id="monthlyPlot"></div> --}}
                        <canvas id="monthlyPlot" style="width:100%;max-width:700px"></canvas>
                    </div>
                    <div class="col-6">
                        <h3 class="fw-bold">Daily Sales</h3>
                        {{-- <div id='dailyPlot'></div> --}}
                        <canvas id="dailyPlot" style="width:100%;max-width:700px"></canvas>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/sellerDashboard.js') }}"></script>
@endsection
