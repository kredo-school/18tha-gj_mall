@extends('seller.layouts.app')

@section('title', 'Seller Product Edit')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seller/products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <h2 class="my-4">Edit Product - {{ __('Product ID ' . $product->id) }}</h2>

    <div class="row justify-content-end">
        <div class="col mt-4">

            <div class="row">
                <h4>Images</h4>
                {{-- create images --}}

                {{-- existing images --}}
                <div class="col-auto">
                    @foreach ($product->productImage as $productImage)
                        <div class="col-auto" style="position: relative; display: inline-block;">
                            <div class="image-num">
                                {{ $loop->index + 1 }}
                            </div>
                            <div class="mt-3">
                                <img src="{{ asset('storage//images/items/' . $productImage->productImages->image) }}"
                                    alt="" class="image-md">
                            </div>
                            <form
                                action="{{ route('seller.products.image.destroy', ['i_id' => $productImage->image_id, 'p_id' => $productImage->product_id]) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="d-inline pen-trash-overlay border-0"
                                    onclick="return confirm('Do you really want to delete this image? If it is deleted and want to use the same image, you have to reupload the image again.')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    @endforeach
                </div>

                <div class="col ms-auto">
                    {{-- create images with JavascriptS --}}
                    <form action="{{ route('seller.products.update', $product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div id="file_list" class="row">
                            <label class="js-file col-2" for="t">
                                <input id="t" class="js-inputFile" type="file" name="images[]"
                                    accept="image/*" />
                            </label>
                        </div>
                        @error('images')
                            <div class="mt-2 small text-danger">{{ $message }}</div>
                        @enderror
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-5">
                    <label for="title" class="form-label h4 fw-bold">Title</label>
                    <input type="text" id="title" name="name" class="form-control" placeholder="title"
                        value={{ old('title', $product->name) }}>
                </div>
                @error('name')
                    <div class="mt-2 small text-danger">{{ $message }}</div>
                @enderror

                <div class="col-5">
                    <label for="category" class="form-label h4 fw-bold">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            @if ($category->id == $product->category_id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category')
                        <div class="mt-2 small text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-auto mx-auto">
                    <label for="fragile h4 fw-bold">Fragile</label>
                    <p>
                        @if ($product->productDetail->is_fragile == 1)
                            <input type="checkbox" name="fragile" id="fragile" class="form-check-input" checked>
                        @else
                            <input type="checkbox" name="fragile" id="fragile" class="form-check-input">
                        @endif
                    </p>
                    @error('fragile')
                        <div class="mt-2 small text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <label for="description" class="form-label h4 fw-bold">Description</label>
                    <textarea name="desc" id="description" rows="5" class="form-control">{{ old('desc', $product->description) }}</textarea>
                </div>
                @error('desc')
                    <div class="mt-2 small text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mt-4">
                <div class="col-3">
                    <label for="price" class="form-label h4 fw-bold">Price</label>
                    <input type="text" name="price" id="price" class="form-control"
                        value="{{ old('price', $product->price) }}">
                </div>
                @error('price')
                    <div class="mt-2 small text-danger">{{ $message }}</div>
                @enderror

                <div class="col-3">
                    <label for="size" class="form-label h4 fw-bold">Size</label>
                    <input type="text" name="size" id="size" class="form-control"
                        placeholder="L:30cm W:15cm H:10cm" value="{{ old('size', $product->productDetail->size) }}">
                    <p class="text-muted text-small">ex.L:30cm W:15cm H:10cm</p>
                </div>
                @error('size')
                    <div class="mt-2 small text-danger">{{ $message }}</div>
                @enderror

                <div class="col-3">
                    <label for="weight" class="form-label h4 fw-bold">Weight</label>
                    <input type="text" name="weight" id="weight" class="form-control" placeholder="300g"
                        value="{{ old('weght', $product->productDetail->weight) }}">
                    <p class="text-muted text-small">ex.300g, 20kg</p>
                </div>
                @error('weight')
                    <div class="mt-2 small text-danger">{{ $message }}</div>
                @enderror

                <div class="col-3">
                    <label for="stock" class="form-label h4 fw-bold">Maximum Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" placeholder="10"
                        value="{{ old('stock', $product->qty_in_stock) }}">
                    <p class="text-muted text-small">ex.100</p>
                </div>
                @error('stock')
                    <div class="mt-2 small text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="row my-4">
                <div class="col-6"></div>
                <div class="col-3">
                    <a href="{{ url('/seller/products/dashboard') }}"
                        class="btn custom-edit-cancel w-100 text-decoration-none">Cancel</a>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn custom-edit-update w-100">Update</button>
                </div>
            </div>
            </form>
        </div>

    </div>
    <script src="{{ asset('js/sellerProductEdit.js') }}"></script>
@endsection
