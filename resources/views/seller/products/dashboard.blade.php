@extends('seller.layouts.app')

@section('title', 'Product Dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/productDashboard.css') }}">

    <div class="row justify-content-end">
        <div class="col mb-4 ps-5">
            <h2 class="py-4 fw-bold">Products Dashboard</h2>
            {{-- Top5 Ranking --}}
            <div class="row mb-5">
                <h2 class="fw-bold h3">Top5 BestSeller</h2>
                @foreach ($products_ranking as $product_ranking)
                    <div class="col-auto px-1">
                        <div class="border rounded-0 p-2 card-parent">
                            <div class="rank-num px-2">{{ $loop->index + 1 }}</div>
                            @if ($product_ranking->productImage->isNotEmpty())
                                <img src="{{ asset('storage/images/items/'. $product_ranking->productImage->first()->productImages->image) }}"
                                    class="card-img-top rank-image img img-fluid" alt="owan">
                            @else
                                <img src="{{ asset('images/items/no-image.svg') }}" alt="Product Image" class="card-img-top rank-image img img-fluid">
                            @endif

                            <div class="product_detail mt-2">
                                <h5 class="d-inline-block text-truncate" style="max-width: 180px;">
                                    {{ $product_ranking->name }}</h5>
                                <h5>$ {{ $product_ranking->price }}</h5>
                                <p>Total Sales: {{ $product_ranking->total_sales }}</p>
                            </div>
                        </div>

                    </div>
                @endforeach
                {{-- Top5 Ranking end --}}

                {{-- Search bar --}}
                <div class="row mt-4">
                    <div class="col-8 my-2">

                        <form action="{{ route('seller.products.search') }}" method="GET">

                            <input type="search" name="search" placeholder="Search..."
                                class="form-control form-control-sm">
                        </form>

                    </div>
                    <div class="col mt-1">
                        <a href="{{ route('seller.products.create') }}">
                            <button class=" btn custom-button w-100 shadow-sm">Create Product
                    </div>
                    </a>
                </div>
            </div>

            {{-- product lists --}}
            <div class="row">
                <div class="col">
                    <table class="table table-hover align-middle bg-white border mt-2">
                        <thead class="small table-secondary text-light">
                            <tr>
                                <th>Product ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Fragile</th>
                                <th>Weight</th>
                                <th>Size</th>
                                <th>Maximum Stock</th>
                                <th>Category</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center bg-white">
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        @if ($product->productDetail->is_fragile == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>{{ $product->productDetail->weight }}</td>
                                    <td>{{ $product->productDetail->size }}</td>
                                    <td>{{ $product->qty_in_stock }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <a href="{{ route('seller.products.edit', $product->id) }}"
                                            class="btn text-decoration-none edit-icon">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('seller.products.delete', $product->id) }}" type="button"
                                            class="btn text-decoration-none trash-icon" data-bs-toggle="modal"
                                            data-bs-target="#DeleteProduct-{{ $product->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('seller.modalSeller.deleteProduct')
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}

                </div>
            </div>
        @endsection
