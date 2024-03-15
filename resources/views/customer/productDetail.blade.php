@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/product/productDetail.css') }}">
    
    @include('layouts.navbar')

    <div class="container">
        {{-- Product Detail Content  --}}
        <div class="row mt-5 justify-content-center">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1707343843982-f8275f3994c5?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block inner-image" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1707345512638-997d31a10eaa?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block inner-image" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1707327259268-2741b50ef5e5?q=80&w=1550&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block inner-image" alt="...">
                        </div>
                    </div>
                </div>

                <div id="thumbnailImages">
                    <div class="row mt-3 justify-content-center">
                        <div class="col-auto">
                            <img src="https://images.unsplash.com/photo-1707343843982-f8275f3994c5?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid thumbnail" alt="..." data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0">
                        </div>
                        <div class="col-auto">
                            <img src="https://images.unsplash.com/photo-1707345512638-997d31a10eaa?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid thumbnail" alt="..." data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1">
                        </div>
                        <div class="col-auto">
                            <img src="https://images.unsplash.com/photo-1707327259268-2741b50ef5e5?q=80&w=1550&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid thumbnail" alt="..." data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <h1>Product Name</h1>
                <a class="text-muted text-decoration-none">Shop Name</a>
                <span class="fs-3 mt-2 d-block text-danger">$20.00</span>

                {{-- Check: Creating backend, might recreate this part --}}
                <small class="fw-bold mt-3">20 Items Left</small>
                <div id="bar_main" class="mb-3">
                    <div id="bar_progress" class="bg-danger"></div>
                </div>

                <strong>Description</strong>
                <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quibusdam corporis culpa numquam aliquid similique praesentium ullam nisi, nostrum obcaecati incidunt? Velit aut ea id debitis fuga itaque perferendis impedit.
                </p>

                <div class="card car-body p-4" id="product_detail_card">
                    <div class="row mb-4">
                        <div class="col">
                            <label for="" class="form-label">Quantity</label>
                            <div class="qty-container">
                                <button class="qty-btn-minus" type="button"><i class="fa fa-minus"></i></button>
                                <input type="text" name="qty" value="0" class="input-qty border-0"/>
                                <button class="qty-btn-plus" type="button"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Maximum purchase 5</p>
                    </div>
                    
                    <div class="row">
                        <div class="col text-end">
                            <form action="" method="post">
                                @csrf

                                <button type="submit" class="btn create-button w-100">
                                    <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                                </button>
                            </form>
                        </div>

                        <div class="col">
                            <form action="" method="post">
                                @csrf

                                <button type="submit" class="btn create-button w-100">
                                    <i class="fa-solid fa-heart"></i> Whishlist
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Product Detail Content End --}}

        {{-- Product Detail Table  --}}
        <div class="row mt-5">
            <div class="col">
                <h2>Product Details</h2>
                
                <table class="table">
                    <tr>
                        <th id="table-title">Company</th>
                        <td>Company Name</td>
                    </tr>
                    
                    <tr>
                        <th id="table-title">Model</th>
                        <td>Product Model</td>
                    </tr>

                    <tr>
                        <th id="table-title">New Weight</th>
                        <td>Product Weight</td>
                    </tr>

                    <tr>
                        <th id="table-title">Material</th>
                        <td>Product Material</td>
                    </tr>

                    <tr>
                        <th id="table-title">Size</th>
                        <td>Product Size</td>
                    </tr>

                    <tr>
                        <th id="table-title">Shipping Method</th>
                        <td>Product Shipping Method</td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- Product Detail Table End --}}

        <div class="container">
 
            <h1 class="h2">Rating Reviews</h1>
 
            <div class="row">
                <div class="col">
                    <!-- Total Rating  -->
                    <div class="total_rating mb-4 d-flex align-items-center">
                        <span class="fa-solid fa-star icon text-warning"></span>
                        <span class="fa-solid fa-star icon text-warning"></span>
                        <span class="fa-solid fa-star icon text-warning"></span>
                        <span class="fa-solid fa-star icon text-dark"></span>
                        <span class="fa-solid fa-star icon text-dark"></span>
                       
                        <div class="badge style-seet color3 border p-2 ms-2">4/5</div>
                    </div>
                    <!-- Total Rating End -->
                </div>
            </div>
 
            <!-- Rating Card  -->
            <div class="row g-4 mb-3">
                <div class="col">
                    <div class="card card-body border-light-2">
                        <div class="row">
                            <div class="col-auto">
                                <img src="https://cdn.icon-icons.com/icons2/2468/PNG/512/user_icon_149329.png" alt="user_avatar" class="avatar rounded-5">
                            </div>
                            <div class="col">
                                <h2 class="fs-4">User Name</h2>
                                <div class="total_rating">
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                </div>
                                <div id="overflow-scroll">
                                    <p class="small">
                                       ecusandae voluptate cum. Ipsum?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 
                <div class="col d-none d-sm-block">
                    <div class="card card-body border-light-2">
                        <div class="row">
                            <div class="col-auto">
                                <img src="https://cdn.icon-icons.com/icons2/2468/PNG/512/user_icon_149329.png" alt="user_avatar" class="avatar rounded-5">
                            </div>
                            <div class="col">
                                <h2 class="fs-4">User Name</h2>
                                <div class="total_rating">
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                </div>
                                <div id="overflow-scroll">
                                    <p class="small">
                                        elit. Hic praesentium quisquam molestiae maiores atque, amet sint doloremque, accusamus harum nobis, ea dolorem? Nostrum debitis repellat fuga recusandae voluptate cum. Ipsum?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block">
                    <div class="card card-body border-light-2">
                        <div class="row">
                            <div class="col-auto">
                                <img src="https://cdn.icon-icons.com/icons2/2468/PNG/512/user_icon_149329.png" alt="user_avatar" class="avatar rounded-5">
                            </div>
                            <div class="col">
                                <h2 class="fs-4">User Name</h2>
                                <div class="total_rating">
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                </div>
                                <div id="overflow-scroll">
                                    <p class="small">
                                        elit. Hic praesentium quisquam molestiae maiores atque, amet sint doloremque, accusamus harum nobis, ea dolorem? Nostrum debitis repellat fuga recusandae voluptate cum. Ipsum?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col d-none d-xxl-block">
                    <div class="card card-body border-light-2">
                        <div class="row">
                            <div class="col-auto">
                                <img src="https://cdn.icon-icons.com/icons2/2468/PNG/512/user_icon_149329.png" alt="user_avatar" class="avatar rounded-5">
                            </div>
                            <div class="col">
                                <h2 class="fs-4">User Name</h2>
                                <div class="total_rating">
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star text-warning"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                </div>
                                <div id="overflow-scroll">
                                    <p class="small">
                                        elit. Hic praesentium quisquam molestiae maiores atque, amet sint doloremque, accusamus harum nobis, ea dolorem? Nostrum debitis repellat fuga recusandae voluptate cum. Ipsum?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rating Card  -->
        </div>
    </div>

    @include('layouts.footer')
    {{-- productDetail.js --}}
    <script src="{{ asset('js/productDetail.js') }}"></script>
@endsection