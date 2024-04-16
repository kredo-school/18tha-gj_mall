@extends('seller.layouts.app')

@section('title', 'Seller DashBoard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/sellerDashboard.css') }}">

    <div class="my-4">
        <h1>Sales Dashboard</h1>
        <p>Hi User! Welcome to Sales Dashboard!</p>
    </div>

    <div class="row mb-4">
        <div class="col-auto py-3">
            <h3>{{ $yesterday }}</h3>

            <div class="card shadow-sm mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/seller/totalOrder.svg') }}" style="width: 88px; height: 88px;">
                        </div>
                        <div class="col-auto ps-5">
                            <h2>{{ $countYesterday[0]->total_sales }}</h2>
                            <h5>Total Sales</h5>
                            <span class="text-muted">
                                @if ($countCompare > 1)
                                    <i class="fa-regular fa-circle-up text-success"></i>
                                    {{ $countCompare }}
                                    % <br> (vs {{ $day_before_yesterday }} )
                                @else
                                    <i class="fa-regular fa-circle-down text-danger"></i>
                                    {{ $countCompare }}
                                    % <br> (vs {{ $day_before_yesterday }} )
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mt-2">

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/seller/totalSales.svg') }}" style="width: 88px; height: 88px;">
                        </div>
                        <div class="col-auto ps-5">
                            <h2>$ {{ $countYesterday[0]->total_amount }}</h2>
                            <h5>Total Amount</h5>
                            <span class="text-muted">
                                @if ($amountCompare > 1)
                                    <i class="fa-regular fa-circle-up text-success"></i>
                                    {{ $amountCompare }}
                                    % <br> (vs {{ $day_before_yesterday }} )
                                @else
                                    <i class="fa-regular fa-circle-down text-danger"></i>
                                    {{ $amountCompare }}
                                    % <br> (vs {{ $day_before_yesterday }} )
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-center py-3">
            {{-- Search bar --}}
            <form action="{{ route('seller.dashboard') }}" method="GET">
                <div class="row mb-4 align-items-center">
                    <div class="col">
                        <input type="search" name="search" placeholder="Search for the list below..."
                            class="form-control">
                    </div>
                    <div class="col-auto">
                        <div class="p-3 input-group">
                            <label for="daterange" class="input-group-text">
                                <i class="fa-solid fa-calendar-days icon text-primary"></i>
                            </label>
                            <input type="text" id="daterange" name="daterange" class="form-control" />
                            <button type="submit" class="btn btn-primary"> GET </button>
                        </div>
                    </div>
                </div>
            </form>

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
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->date }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->total_sales }}</td>
                            <td>$ {{ $order->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-6">
            <h3>Monthly Sales</h3>
            <h6>Value of each month</h6>
            <canvas id="monthlyPlot"></canvas>
        </div>
        <div class="col-6">
            <h3>Daily Sales</h3>
            <h6>Cumulative value from the first day of the month</h6>
            <canvas id="dailyPlot"></canvas>
        </div>

    </div>
    <script src="{{ asset('js/sellerDashboard.js') }}"></script>
    <script type="text/javascript">
        // Monthly Chart
        // Pass Datas
        const xValues = @json($month);
        const yValues = @json($monthly_amount);
        const barColors = Array.from({
            length: xValues.length
        }, () => "#0AA873");
        new Chart("monthlyPlot", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues,
                    label: "Monthly Sales Amount Recent 12 months"
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Sales Recent 12 months"
                }
            }
        });

        // Daily Chart
        new Chart("dailyPlot", {
            type: "line",
            data: {
                labels: @json($output[$names[0]]['day']),
                datasets: [{
                        // backgroundColor: barColors2,
                        label: @json($names[0]),
                        data: @json($output[$names[0]]['accum_amount'])
                    },
                    {
                        // backgroundColor: barColors2,
                        label: @json($names[1]),
                        data: @json($output[$names[1]]['accum_amount'])
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Daily Sales Since Last month"
                }
            }
        });
    </script>
    <script src="{{ asset('js/sellerDashboard.js') }}"></script>
    <script>
        var dashboardRoute = "{{ route('seller.dashboard') }}";
    </script>
@endsection
