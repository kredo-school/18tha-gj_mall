@extends('seller.layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/create-products.css') }}">

    <div class="row justify-content-end bg-white">
        <div class="col mt-4">
            <h2>Create Product</h2>
            <div class="form">
                <div class="row">
                    <h3>Images</h3>

                    {{-- create images --}}
                    <div class="col-auto" style="position: relative; display: inline-block;">
                        <div class="image-num">
                            1
                        </div>
                        <div class="mt-3">
                            <img src="{{ asset('images/items/item1.jpg') }}" alt="" class="image-md">
                        </div>
                        <label class="d-inline plus-circle-overlay">
                            {{-- this appears if the images are selected in order to change the images --}}
                            <input type="file" style="display: none;">
                            +
                        </label>
                    </div>
                    <div class="col-auto" style="position: relative; display: inline-block;">
                        <div class="image-num">
                            2
                        </div>
                        <div class="mt-3">
                            <img src="{{ asset('images/items/item2.png') }}" alt="" class="image-md">
                        </div>
                        <label class="d-inline plus-circle-overlay">
                            <input type="file" style="display: none;">
                            +
                        </label>
                    </div>

                    {{-- when the images isn't in the database, only the below component will show up --}}
                    <div class="col-auto align-middle ps-5" style="position: relative; display: inline-block;">
                        <label class="d-inline plus-circle">
                            <input type="file" style="display: none;">
                            +
                        </label>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-5">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>

                    <div class="col-5">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option disabled selected>Select Category</option>
                            <option value="">category1</option>
                            <option value="">category2</option>
                            <option value="">ategory3</option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="is_fragile" class="form-label">Is Fragile</label><br>
                        <input type="checkbox" name="is_fragile" id="is_fragile" class="form-check-input">
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="desc" id="description" rows="5" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>

                    <div class="col-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" name="size" id="size" class="form-control">
                        <p class="text-muted text-small">ex.L:30cm W:15cm H:10cm</p>
                    </div>

                    <div class="col-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="text" name="weight" id="weight" class="form-control">
                        <p class="text-muted text-small">ex.300g, 20kg</p>
                    </div>

                    <div class="col-3">
                        <label for="stock" class="form-label">Maximum Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control">
                        <p class="text-muted text-small">ex.100</p>
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
