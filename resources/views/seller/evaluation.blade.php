@extends('seller.layouts.app')

@section('title', 'Evaluation')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Evaluation Products List</h1>

            {{-- Search bar --}}
            <div class="col-8 my-2">
                <div class="navbar-nav">
                    <form action="#" style="width: 300px">
                        <input type="search" name="search" placeholder="Search..." style="width: 500px"  class="form-control form-control-sm">
                    </form>
                </div>
            </div>
            <div class="col-4 mt-2">
                Filtered By <button class="btn btn-sm bg-dark rounded-pill text-white mx-2">Status</button>
                <button class="btn btn-sm bg-secondary rounded-pill text-white mx-2">Category</button>
            </div>

            <table class="table table-hover align-middle bg-white border ms-4">
                <thead class="small table-secondary text-light">
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Weight</th>
                        <th>is Fragile</th>
                        <th>Seller Name</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cloth</td>
                        <td>Kimono</td>
                        <td>$100</td>
                        <td>160cm(S)</td>
                        <td>1kg</td>
                        <td>No</td>
                        <td>Kimono Shop</td>
                        <td>This is a tradistional cloth</td>
                        <td>Evaluating</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dish</td>
                        <td>Arita-yaki</td>
                        <td>$50</td>
                        <td>160cm(S)</td>
                        <td>0.5kg</td>
                        <td>Yes</td>
                        <td>Dish Shop</td>
                        <td>This is a tradistional dish</td>
                        <td>Evaluating</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="banner mt-4">
                <a href="#">
                    <img src="{{ asset('images/banner/banner1.png')}}" style="width: 970px">
                </a>
            </div>
        </div>

    </div>
@endsection