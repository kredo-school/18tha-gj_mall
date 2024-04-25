@extends('seller.layouts.app')

@section('title', 'Seller DashBoard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/sellerDashboard.css') }}">

    @php
        $uniqueMessages = [];

        foreach ($productsWithMessages as $message) {
            foreach ($message->messages as $item) {
                $productId = $item->product->id;
                $customerId = $item->customer->id;
                $key = "{$productId}_{$customerId}";

                // Store message if not already added
                if (!isset($uniqueMessages[$key])) {
                    $uniqueMessages[$key] = $item;
                }
            }
        }
    @endphp

    <div class="my-4">
        <h1>Sales Dashboard</h1>
        <p>Hi {{Auth::guard("seller")->user()->last_name}} {{Auth::guard("seller")->user()->first_name}}! Welcome to Sales Dashboard!</p>
    </div>

    <div class="row mb-3">
        <div class="col">
            <table class="table table-sm w-50 align-middle">
                <thead class="table-secondary">
                    <th scope="col">Product</th>
                    <th scope="col">UserName</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($uniqueMessages as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->customer->first_name }} {{ $item->customer->last_name }}</td>
                            <td>
                                <a href="{{ route('livechat', ['product_id' => $item->product->id, 'user_id' => $item->customer->id]) }}" class="text-decoration-none">
                                    <button class="btn btn-primary">Chat with customer</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('seller.message.delete', ['customer_id' => $item->customer->id, 'product_id' => $item->product->id, 'seller_id' =>  $item->product->seller_id ]) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger" >
                                        Solved
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
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

            <table class="table text-center table-hover bg-white border">
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

    <script type="text/javascript">
        // Monthly Chart
        // Pass Datas
        new Chart("monthlyPlot", {
            type: "bar",
            data: {
                labels:  @json($month),
                datasets: [{
                        backgroundColor: Array.from({
                            length:  @json($month).length
                        }, () => "#0AA873"),
                        data: @json($monthly_amount),
                        label: "Monthly Sales Amount Recent 12 months",
                        order: 1,
                    },
                    {
                        backgroundColor: Array.from({
                            length:  @json($month).length
                        }, () => "#FF3A3A"),
                        data: @json($forecast),
                        label: "Monthly Sales Amount Forcast",
                        type: "line",
                        order: 0,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            },
        });

        // Daily Chart

        new Chart("dailyPlot", {
            type: "line",
            data: {
                labels: @json($Xvalues),
                datasets: [{
                        // backgroundColor: barColors2,
                        label: "Last Month",
                        data: @json($LastMonthYvalues),
                    },
                    {
                        // backgroundColor: barColors2,
                        label: "This Month",
                        data: @json($thisMonthYvalues),
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
