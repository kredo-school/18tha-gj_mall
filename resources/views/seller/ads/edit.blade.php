@extends('seller.layouts.app')

@section('title', 'Seller Ads Edit')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <h2 class="my-4">Edit Advertisment -- {{ __('Ad ID ' . $ad->id) }}</h2>

    <div class="row justify-content-end">
        <div class="col mt-4">
            <form action={{ route("seller.ads.update", $ad->id) }} method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <div class="row">
                    <h4>Image</h4>

                    {{-- create images (just one) --}}
                    <div class="col-auto" style="position: relative; display: inline-block;">
                        <div class="image-num">
                            1
                        </div>
                        <label class="d-inline pen-circle-overlay">
                            <input type="file" style="display: none;" id="cat_image" name="image">
                            <i class="fa-solid fa-pen"></i>
                        </label>
                        <div class="mt-3">
                            <img src="{{ asset('storage/images/ads/' . $ad->image_name) }}" alt=""
                                class="image-banner" id="category-img-tag">
                        </div>
                    </div>

                    @error('image')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror

                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="title" class="form-label h4 fw-bold ">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                value="{{ old('title', $ad->title) }}">
                        </div>
                        @error('title')
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-6">
                            <label for="product-id" class="form-label h4 fw-bold">Product Id</label>
                            <select name="product_id" id="product-id" class="form-select">
                                <option disabled selected>Select Product ID</option>
                                @foreach ($products as $product)
                                    @if ($product->id == $ad->product_id)
                                        <option value="{{ $product->id }}" selected>
                                            {{  $product->id . ' -- ' . $product->name }}
                                        </option>
                                    @else
                                        <option value="{{ $product->id }}">
                                            {{  $product->id . ' -- ' . $product->name }}
                                        </option>
                                    @endif
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
                            <textarea name="content" id="content" rows="5" class="form-control">{{ old('content', $ad->content) }}</textarea>
                        </div>
                    </div>
                    @error('content')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror

                    <div class="row my-4">
                        <div class="col-6"></div>
                        <div class="col-3">
                            <button class="btn custom-edit-cancel w-100">Cancel</button>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn custom-edit-update w-100">Update</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <script src="{{ asset('js/sellerAdEdit.js') }}"></script>
    @endsection
