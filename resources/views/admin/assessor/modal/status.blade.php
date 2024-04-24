{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/evaluationStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade " id="change-status-{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h3 class="modal-title fw-bold text-white mx-auto">
                    Evaluation Status Detail
                </h3>
            </div>

            <form method="POST" action="{{ route('admin.evaluation.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <div class="pt-3">
                        <p><strong class="fw-bold"> ID: </strong>{{ $product->id }}</p>
                    </div>
                    <div class="pt-3">
                        <p><strong class="fw-bold"> Category: </strong>{{ $product->category->name }}</p>
                    </div>
                    <div class="pt-3">
                        <p><strong class="fw-bold">Products Name: </strong>{{ $product->name }}</p>
                    </div>
                    <div class="pt-3">
                        <p><strong class="fw-bold">Price: </strong>{{ $product->price }}</p>
                    </div>
                    <div class="pt-3">
                        <p><strong class="fw-bold">Details(WxHxLxW): </strong>{{ $product->productDetail->size }} / {{ $product->productDetail->weight }}</p>
                    </div>
                    <div class="pt-3">
                        <p>
                            <strong class="fw-bold">Fragile: </strong>

                            @if ($product->productDetail->is_fragile == 0)
                                No
                            @elseif ($product->productDetail->is_fragile == 1)
                                Yes
                            @endif
                        </p>
                    </div>
                    <div class="pt-3">
                        <p><strong class="fw-bold">Seller Shop: </strong>{{ $product->seller->id }}</p>
                    </div>
                    <div class="pt-3">
                        <p><strong class="fw-bold">Description: </strong><br>{{ $product->description }}</p>
                    </div>
                    
                    {{-- Status --}}
                    <div class="status">
                        <label class="h5 fw-bold">Status:</label>
                        <select name="status_id" id="status_id" class="form-select">
                            <option hidden>{{ old('product->status_id', $product->status_id) }}</option>
                            <option value="1">1: Exhibit Request</option>
                            <option value="2">2: Waiting for Evaluation</option>
                            <option value="3">3: Evaluation</option>
                            <option value="4">4: Waiting for Display</option>
                            <option value="5">5: Exhibited</option>
                            <option value="6">6: Sold Out</option>
                            <option value="7">7: Suspended</option>
                        </select>
                    </div>
                    
                    
                </div>
                <div class="modal-footer border-0 mx-auto">
                        <button type="button" class="btn cancel-status-button mx-auto shadow" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn save-status-button mx-auto shadow">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>