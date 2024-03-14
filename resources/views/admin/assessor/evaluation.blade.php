@extends('admin.layouts.app')

@section('title', 'Admin Evaluation')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-2">
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
                Filtered By <button class="btn btn-sm bg-dark rounded-pill text-white mx-2 shadow">Status</button>
                <button class="btn btn-sm bg-secondary rounded-pill text-white mx-2 shadow">Category</button>
            </div>

            <table class="table table-hover align-middle bg-white border ms-4">
                <thead class="small table-secondary text-light">
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Size (cm)</th>
                        <th>Weight</th>
                        <th>is Fragile</th>
                        <th>Seller Name</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                  {{-- No.1 --}}
                    <tr>
                        <td>1</td>
                        <td>Cloth</td>
                        <td>Kimono</td>
                        <td>$100</td>
                        <td>160(S)</td>
                        <td>1kg</td>
                        <td>No</td>
                        <td>Kimono Shop</td>
                        <td>This is a tradistional cloth</td>
                        <td>
                          <button class="btn btn-sm rounded-pill btn-success shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Change Status</button>
                          @include('admin.assessor.modal.status')
                        </td>
                    </tr>
                    {{-- No.2 --}}
                    <tr>
                        <td>2</td>
                        <td>Dish</td>
                        <td>Arita-yaki</td>
                        <td>$50</td>
                        <td>Φ20</td>
                        <td>0.5kg</td>
                        <td>Yes</td>
                        <td>Dish Shop</td>
                        <td>This is a tradistional dish</td>
                        <td>
                            <button class="btn btn-sm rounded-pill btn-success shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Change Status</button>

                            @include('admin.assessor.modal.status')
                        </td>
                    </tr>
                    {{-- No.3 --}}
                    <tr>
                      <td>3</td>
                      <td>xxx</td>
                      <td>xxx</td>
                      <td>$500</td>
                      <td>xxx</td>
                      <td>10kg</td>
                      <td>No</td>
                      <td>xxx Shop</td>
                      <td>xxxxxxxxxxx</td>
                      <td>
                          <button class="btn btn-sm rounded-pill btn-success shadow" data-bs-toggle="modal" data-bs-target="#change-status-">Change Status</button>

                          @include('admin.assessor.modal.status')
                      </td>
                  </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="banner mt-4">
                <a href="#">
                    <img src="{{ asset('images/banner/banner2.png')}}" style="width: 100%">
                </a>
            </div>
        </div>

    </div>
@endsection