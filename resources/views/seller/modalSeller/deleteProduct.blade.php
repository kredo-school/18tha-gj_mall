<link rel="stylesheet" href="{{ asset('css/seller/products.css') }}">

<div class="modal fade " id="DeleteProduct-{{ $product->id }}">
    <div class="modal-dialog ">
        <div class="modal-content">
            {{-- header --}}
            <div class="modal-head">
                <div class="row">
                    <div class="col text-white text-center py-2">
                        <h3 class="fw-bold mx-auto">
                            {{ __('Delete Product ID ' . $product->id) }}
                        </h3>
                        <h5>Are you sure you want to delete this product ?</h5>
                    </div>
                </div>
            </div>
            {{-- body --}}
            <div class="row ">
                <div class="col text-center pt-3">
                    @foreach ($product->productImage->take(1) as $prodcutImage)
                        <img src="{{ asset('storage/images/items/' . $prodcutImage->productImages->image) }}" alt=""
                            class="image-delete">
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col text-start py-2">
                    <div class="modal-body">
                        <p class="h5 pb-3"><strong class="fw-bold"> Title: </strong> {{ $product->name }}</p>
                        <p class="h5 pb-3"><strong class="fw-bold">Category: </strong>{{ $product->category->name }}</p>
                        <p class="h5 pb-3"><strong class="fw-bold">Description: </strong><br>{{ $product->description }}
                        </p>

                        <div class="row mt-3">
                            <div class="col-6">
                                <p class="h5 pb-3"><strong class="fw-bold"> Price: </strong> ${{ $product->price }}</p>
                                <p class="h5 pb-3"><strong class="fw-bold">Weight:
                                    </strong>{{ $product->productDetail->weight }}</p>
                            </div>
                            <div class="col-6">
                                <p class="h5 pb-3"><strong class="fw-bold"> Size: </strong>
                                    {{ $product->productDetail->size }}</p>
                                <p class="h5 pb-3"><strong class="fw-bold">Maximum Stock: </strong>
                                    {{ $product->qty_in_stock }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- footer --}}
            <div class="modal-footer modal-foot d-flex justify-content-around">
                <form action="{{ route('seller.products.destroy' , $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn custom-delete-cancel me-1" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn custom-delete ms-1">
                        Delete
                    </button>
                </form>

            </div>
        </div>


    </div>
</div>
</div>
</div>
