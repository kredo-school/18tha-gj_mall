@extends('seller.layouts.app')

@section('title', 'Seller Ads Create')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <h2 class="my-4">Create Advertisment</h2>

    <div class="row justify-content-end me-4">
        <div class="col mt-4">
            <form action="{{ route('seller.ads.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <h4>Image</h4>

                    {{-- create images (just one) --}}
                    <div class="col-auto" style="position: relative; display: inline-block;">
                        <div class="image-num">
                            1
                        </div>
                        <label class="d-inline plus-circle-overlay">
                            {{-- this appears if the images are selected in order to change the images --}}
                            <input type="file" id="cat_image" style="display: none;" name="image">
                            +
                        </label>
                        <div class="mt-3 image-md">
                            <img src="#" id="category-img-tag" />
                        </div>

                    </div>
                    @error('image')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <label for="title" class="form-label h4 fw-bold">Title</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-6">
                        <label for="product-id" class="form-label h4 fw-bold">Product Id</label>
                        <select name="product_id" id="product-id" class="form-select">
                            <option disabled selected>Select Product ID</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->id . ' -- ' . $product->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="content" class="form-label h4 fw-bold">Description</label>
                        <textarea name="content" id="content" rows="5" class="form-control">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row my-4">
                    <div class="col-6"></div>
                    <div class="col-3">
                        <button class="btn custom-button-cancel w-100">Cancel</button>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn custom-button-save w-100">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/sellerAdCreate.js') }}"></script>
@endsection
