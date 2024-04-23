{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/deliveryStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="change-status-{{ $order->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-light fw-bold mx-auto">
                    Delivery Status Detail
                </h3>
            </div>
            <div class="modal-body">
                <div class="pt-3">
                    <p><strong class="fw-bold"> Order ID: </strong> {{ $order->order_id }}</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold"> Product Category: </strong> {{ $order->product->category->name }}</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Products Name: </strong>{{ $order->product->name }}</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Details(WxHxLxW): </strong>{{ $order->product->productDetail->size }}
                        {{ $order->product->productDetail->weight }}</p>
                </div>

                <div class="pt-3">
                    <p><strong class="fw-bold">Fragile: </strong>
                        @if ($order->product->productDetail->is_fragile == 1)
                            Yes
                        @else
                            No
                        @endif
                    </p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Shipping method: </strong>{{ $order->shopOrder->shippingMethod->name }}
                    </p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Product Description: </strong>{{ $order->product->description }}</p>
                </div>
                <form action="{{ route('seller.delivery.update', $order->shopOrder->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <label for="status" class="h5 fw-bold">Status:</label>
                    <select name="status" id="status" class="form-select">
                        <option value="select">Select the status here...</option>
                        @foreach ($order_statuses->take(7) as $order_status)
                            @if ($order_status->id == $order->status_id)
                                <option value="{{ $order_status->id }}" selected>{{ $order_status->status }}
                                </option>
                            @else
                                <option value="{{ $order_status->id }}">{{ $order_status->status }}</option>
                            @endif
                        @endforeach
                    </select>


            </div>

            <div class="modal-footer border-0 mx-auto montserrat">
                <button type="button" class="btn btn-sm cancel-delivery-button shadow me-1" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-sm complete-delivery-button shadow ms-1">Complete</button>

            </div>
            </form>
        </div>

    </div>
</div>
