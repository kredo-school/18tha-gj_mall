{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/deliveryStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="change-status-{{ $order->id }}">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h3 class="modal-title text-light fw-bold mx-auto">
                    Delivery Status Detail
                </h3>
            </div>
            <div class="modal-body">
                <div class="pt-3">
                    <p><strong class="fw-bold">Order ID: </strong>{{ $order->order_id }}</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Product Category: </strong>{{ $order->product->category->name }}</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Products Name: </strong>{{ $order->product->name }}</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Details(WxHxLxW): </strong>{{ $order->product->productDetail->weight }}</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Fragile: </strong>
                        @if ($order->product->productDetail->is_Fragile == 1)
                            Yes
                        @else
                            No
                        @endif
                    </p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Shipping Method: </strong>{{ $order->shopOrder->ShippingMethod->name }}</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Description: </strong><br>{{ $order->product->description }}</p>

                </div>

                <div class="status">
                    <form action="{{ route('admin.delivery.update', $order->shopOrder->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                         <label for="status" class="h5 fw-bold">Status:</label>
                        <select name="status" id="status" class="form-select">
                            <option value="select">Select the status here...</option>
                            @foreach ($order_statuses->take(2) as $order_status)
                                @if ($order_status->id == $order->status_id)
                                    <option value="{{ $order_status->id }}" selected>{{ $order_status->status }}
                                    </option>
                                @else
                                    <option value="{{ $order_status->id }}">{{ $order_status->status }}</option>
                                @endif
                            @endforeach
                        </select>
                    </form>
                </div>              
            </div>

            <div class="modal-footer border-0 mx-auto montserrat">
                    <button type="button" class="btn btn-sm cancel-delivery-button shadow me-1" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-sm complete-delivery-button shadow mx-auto">Complete</button>
                </form>
            </div>
        </div>
    </div>
</div>
