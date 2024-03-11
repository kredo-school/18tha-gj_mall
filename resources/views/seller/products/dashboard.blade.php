@extends('seller.layouts.app')

@section('content')
    <style>

        .card-parent {
            position: relative;
            display: inline-block;"
        }
        .rank-num {
            position: absolute;
            top: 0%;
            left: 0%;
            color: #000000;
            /* Text color */
            font-size: 20px;
            /* Adjust font size as needed */
            font-weight: bold;
            /* Adjust font weight as needed */
            background-color: #F2F2F2;
            z-index: 1;
            /* Ensure text is above the image */
            "
        }
        .rank-image {
            width: 160px;
            height: 160px
        }
        .table-thead {
            backgroundcolor: #F2F2F2;
        }
    </style>

</head>

<body>
    <main class="bg-white">
        {{-- @yield('content') --}}
        <div class="container">
            <div class="row justify-content-end">
                <div class="col mb-4 border-start ps-5">
                    <h2 class="py-4">Products Dashboard</h2>
                    <div class="row">
                        {{-- show top5 sold items in the shop --}}
                        <div class="col-auto">
                            {{-- card item 1 start --}}
                            <div class="border rounded-0 p-2 card-parent">

                                <div class="rank-num px-2">
                                    1
                                </div>
                                <img src="{{ asset('images/items/item1.jpg') }}" class="card-img-top rank-image"
                                    alt="owan">
                                <div class="row mx-1 mt-2">
                                    <div class="col-6 text-start">
                                        <h5>Card title</h5>
                                    </div>
                                    <div class="col-6 text-end px-1">
                                        <h5>Price</h5>
                                    </div>
                                </div>


                            </div>
                            {{-- card item 1 end --}}

                            {{-- card item 2 start --}}
                            <div class="border rounded-0 p-2 card-parent">

                                <div class="rank-num px-2">
                                    2
                                </div>
                                <img src="{{ asset('images/items/item2.png') }}" class="card-img-top rank-image"
                                    alt="owan">
                                <div class="row mx-1 mt-2">
                                    <div class="col-6 text-start">
                                        <h5>Card title</h5>
                                    </div>
                                    <div class="col-6 text-end px-1">
                                        <h5>Price</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- card item 2 end --}}

                            {{-- card item 3 start --}}
                            <div class="border rounded-0 p-2 card-parent">

                                <div class="rank-num px-2">
                                    3
                                </div>
                                <img src="{{ asset('images/items/item3.png') }}" class="card-img-top rank-image"
                                    alt="owan">
                                <div class="row mx-1 mt-2">
                                    <div class="col-6 text-start">
                                        <h5>Card title</h5>
                                    </div>
                                    <div class="col-6 text-end px-1">
                                        <h5>Price</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- card item 3 end --}}

                            {{-- card item 4 start --}}
                            <div class="border rounded-0 p-2 card-parent">

                                <div class="rank-num px-2">
                                    4
                                </div>
                                <img src="{{ asset('images/items/item4.png') }}" class="card-img-top rank-image"
                                    alt="owan">
                                <div class="row mx-1 mt-2">
                                    <div class="col-6 text-start">
                                        <h5>Card title</h5>
                                    </div>
                                    <div class="col-6 text-end px-1">
                                        <h5>Price</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- card item 4 end --}}
                            {{-- card item 5 start --}}
                            <div class="border rounded-0 p-2 card-parent">

                                <div class="rank-num px-2">
                                    5
                                </div>
                                <img src="{{ asset('images/items/item5.png') }}" class="card-img-top rank-image"
                                    alt="owan">
                                <div class="row mx-1 mt-2">
                                    <div class="col-6 text-start">
                                        <h5>Card title</h5>
                                    </div>
                                    <div class="col-6 text-end px-1">
                                        <h5>Price</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- card item 5 end --}}
                        </div>


                    </div>

                    {{-- search bar --}}
                    <div class="row mt-4">
                        <div class="col-8">
                            <form action="" method="get">
                                <input type="text" name="search" id="search" class="border rounded rounded-3 mt-4 form-control" placeholder="Search here ..." >
                            </form>
                        </div>
                        {{-- create button --}}
                        <div class="col-auto mt-4">
                            <a href="">
                                <div class="button btn text-white w-100" style="background-color: #30567A">Create Product</div>
                            </a>
                        </div>
                    </div>

                    {{-- product lists --}}
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Is fragile</th>
                                <th>Wigth</th>
                                <th>Size</th>
                                <th>Maximum Stock</th>
                                <th>Category</th>
                                <th>Delivery Type</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            {{-- get data from products table of the seller --}}
                            <tr>
                                <td>1234</td>
                                <td>Owan</td>
                                <td>$100</td>
                                <td>Awsome Product</td>
                                <td>○</td>
                                <td>200 g</td>
                                <td>φ100mm H80mm</td>
                                <td>50</td>
                                <td>Kitchen Tools</td>
                                <td>Shipping</td>
                                <td style="color: #0AA873;"><i class="fa-regular fa-pen-to-square"></i></td>
                                <td style="color: #FF3A3A;"><i class="fa-solid fa-trash"></i></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </main>
    </div>
</body>

</html>
@endsection
