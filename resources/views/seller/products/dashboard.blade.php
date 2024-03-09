<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Font Awsome  --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Original CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

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
    </style>

</head>

<body>
    <main class="py-4 bg-white">
        {{-- @yield('content') --}}
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-10 mb-4">
                    <h2>Products Dashboard</h2>
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
                        <tbody>
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
                                <td><i class="fa-regular fa-pen-to-square"></i></td>
                                <td><i class="fa-solid fa-trash"></i></td>
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
