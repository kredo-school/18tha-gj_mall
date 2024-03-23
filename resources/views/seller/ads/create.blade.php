@extends('seller.layouts.app')

@section('title', 'Seller Ads Create')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">

    <h2 class="my-4">Create Advertisment</h2>

    <div class="row justify-content-end me-4">
        <div class="col mt-4">
            <div class="form">
                <div class="row">
                    <h4>Image</h4>

                    {{-- create images (just one) --}}
                    <div class="col-auto" style="position: relative; display: inline-block;">
                        <div class="image-num">
                            1
                        </div>
                        <div class="mt-3">
                            <img src="{{ asset('images/items/item1.svg') }}" alt="" class="image-md">
                        </div>
                        <label class="d-inline plus-circle-overlay">
                            {{-- this appears if the images are selected in order to change the images --}}
                            <input type="file" style="display: none;">
                            +
                        </label>
                    </div>


                    {{-- when the images isn't in the database, only the below component will show up --}}
                    {{-- <div class="col-auto align-middle ps-5" style="position: relative; display: inline-block;">
                        <label class="d-inline plus-circle">
                            <input type="file" style="display: none;">
                            +
                        </label>
                    </div> --}}
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <label for="title" class="form-label h4 fw-bold">Title</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>

                    <div class="col-6">
                        <label for="product-id" class="form-label h4 fw-bold">Product Id</label>
                        <select name="category" id="category" class="form-select">
                            <option disabled selected>Select Product ID</option>
                            {{-- get from the database --}}
                            <option value="">id1 -- name1</option>
                            <option value="">id2 -- name2</option>
                            <option value="">id3 -- name3</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="content" class="form-label h4 fw-bold">Description</label>
                        <textarea name="content" id="content" rows="5" class="form-control"></textarea>
                    </div>
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
            </div>
        </div>
    </div>
@endsection
