@extends('seller.layouts.app')

@section('title', 'Seller Product Create')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        #preview img {
            max-height: 200px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <h2 class="my-4">Create Product</h2>
    <div class="row justify-content-end">
        <div class="col mt-4">
            <form action="{{ route('seller.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <h4>Images</h4>

                    {{-- create images with JavascriptS --}}
                    <div id="file_list" class="row">
                        <label class="col-2 js-file" for="t">
                            <input id="t" class="js-inputFile" type="file" name="images[]" accept="image/*" />
                        </label>
                    </div>
                    @error('images')
                        <div class="mt-2 small text-danger">{{ $message }}</div>
                    @enderror


                    {{-- mulpile input file version --}}
                    {{-- <div class="col-auto">
                        <label for="files" class="btn custom-button-save mb-2 fs-6" style="height:35px;">+ add images</label>
                        <input type="file" accept="image/*" multiple style="display: none;" name="images[]"
                            id="files">
                        <div id="preview"></div>
                        @error('images')
                            <div class="mt-2 small text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}



                    <div class="row mt-4">
                        <div class="col-5">
                            <label for="title" class="form-label h4 fw-bold">Title</label>
                            <input type="text" id="title" name="name" class="form-control"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-5">
                            <label for="category" class="form-label h4 fw-bold">Category</label>
                            <select name="category" id="category" class="form-select">
                                <option disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-auto mx-auto">
                            <label for="fragile" class="h4 fw-bold">Fragile</label>
                            <p>
                                <input type="checkbox" name="fragile" id="fragile" class="form-check-input">
                            </p>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="description" class="form-label h4 fw-bold">Description</label>
                            <textarea name="desc" id="description" rows="5" class="form-control">{{ old('desc') }}</textarea>
                        </div>
                        @error('desc')
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mt-4">
                        <div class="col-3">
                            <label for="price" class="form-label h4 fw-bold">Price</label>
                            <input name="price" id="price" class="form-control" value="{{ old('price') }}">
                            @error('price')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-3">
                            <label for="size" class="form-label h4 fw-bold">Size</label>
                            <input type="text" name="size" id="size" class="form-control"
                                value="{{ old('size') }}">
                            <p class="text-muted text-small">ex.L:30cm W:15cm H:10cm</p>
                            @error('size')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-3">
                            <label for="weight" class="form-label h4 fw-bold">Weight</label>
                            <input type="text" name="weight" id="weight" class="form-control"
                                value="{{ old('weight') }}">
                            <p class="text-muted text-small">ex.300g, 20kg</p>
                            @error('weight')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-3">
                            <label for="stock" class="form-label h4 fw-bold">Maximum Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control"
                                value="{{ old('stock') }}">
                            <p class="text-muted text-small">ex.100</p>
                            @error('stock')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row my-4">
                        <div class="col-6"></div>
                        <div class="col-3">
                            <a class="btn custom-button-cancel text-decoration-none w-100"
                                href="{{ url('seller/products/dashboard') }}">Cancel</a>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn custom-button-save w-100">Save</button>
                        </div>
                    </div>
            </form>
        </div>

    </div>

    <script src="{{ asset('js/sellerProductCreate.js') }}"></script>

@endsection
