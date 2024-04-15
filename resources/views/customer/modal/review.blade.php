<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

@if ($order->product->isReview())
    {{-- Edit Review Modal --}}
    <div class="modal fade" id="product-review-edit-modal-{{ $order->product->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <h1 class="modal-title h4">Edit Review of "{{ $order->product->name }}"</h1>
                    <p class="mb-0">Please review this product! Thank you for your cooperation!</p>
                </div>
                
                <div class="modal-body">   
                    <div class="row mb-4">
                        <div class="col-5 text-center">
                            @if ($order->product->productImage->isNotEmpty())
                                <img src="{{ asset('storage/images/items/'. $order->product->productImage->first()->productImages->image) }}" class="product-image">
                            @else
                                <img src="{{ asset('images/items/no-image.svg') }}" class="product-image">
                            @endif
                        </div>
                        <div class="col-7">
                            <strong class="d-block mb-3 modal_strong">Shop Name: 
                                <span class="fw-normal">{{ $order->product->seller->first_name }}{{ $order->product->seller->last_name }}</span>
                            </strong>
                            <strong class="d-block mb-3 modal_strong">Category: 
                                <span class="fw-normal">{{ $order->product->category->name }}</span>
                            </strong>
                            <strong class="d-block modal_strong">Price: 
                                <span class="fw-normal">${{ $order->product->price }}</span>
                            </strong>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <h2 class="h4">Description</h2>
                            <p>{{ $order->product->description }}</p>
                        </div>
                    </div>

                    @php
                        $review = $order->product->getReview($order->product->id);
                    @endphp
                    
                    <form action="{{ route('review.update', ['order_line_id' => $order->order_id, 'product_id' => $order->product->id, 'review_id' => $review['id']]) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-4 align-items-center">
                            <div class="col">
                                <label for="title" class="form-label">Title</label>
                                @if(isset($review['title']))
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Write your opinion breifly." value="{{ old('title', $review['title']) }}">
                                @else
                                    No title found
                                @endif
                            </div>
                            <div class="col">
                                <label for="rating" class="form-label">Rating</label>                  
                                @if(isset($review['rating']))
                                    <input type="number" name="rating" id="rating" value="{{ old('rating', $review['rating']) }}" hidden>
                                @endif

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ratings">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if(isset($review['rating']) && $review['rating'] >= $i)
                                                <i class="fas fa-star text-warning" data-value="{{ $i }}"></i>
                                            @else
                                                <i class="fas fa-star" data-value="{{ $i }}"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="comment" class="form-label">Comment</label>
                                @if(isset($review['content']))
                                    <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Please describe your review for this product or the reason you rated the stars">{{ old('comment', $review['content']) }}</textarea>
                                @else
                                    No Comment found
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="btn edit-cancel-button w-25" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn edit-button w-25">Save</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    {{-- Edit Review Modal --}}

    {{-- Delete Review Modal --}}
    <div class="modal fade" id="product-review-delete-modal-{{ $order->product->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header delete flex-column">
                    <h1 class="modal-title h4">Delete Review of "{{ $order->product->name }}"</h1>
                    <p class="mb-0">Are you sure you want to delete this review ?</p>
                </div>
                
                <form action="{{ route('review.destroy', $review['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-body">   
                        <div class="row mb-4">
                            <div class="col-5 text-center">
                                @if ($order->product->productImage->isNotEmpty())
                                    <img src="{{ asset('storage/images/items/'. $order->product->productImage->first()->productImages->image) }}" class="product-image">
                                @else
                                    <img src="{{ asset('images/items/no-image.svg') }}" class="product-image">
                                @endif
                            </div>
                            <div class="col-7">
                                <strong class="d-block mb-3 modal_strong">Shop Name: 
                                    <span class="fw-normal">{{ $order->product->seller->first_name }}{{ $order->product->seller->last_name }}</span>
                                </strong>
                                <strong class="d-block mb-3 modal_strong">Category: 
                                    <span class="fw-normal">{{ $order->product->category->name }}</span>
                                </strong>
                                <strong class="d-block modal_strong">Price: 
                                    <span class="fw-normal">${{ $order->product->price }}</span>
                                </strong>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <h2 class="h4">Description</h2>
                                <p>{{ $order->product->description }}</p>
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col">
                                <label for="title" class="form-label">Title</label>
                                @if(isset($review['title']))
                                    <p>{{ $review['title'] }}</p>
                                @else
                                    No title found
                                @endif
                            </div>
                            <div class="col">
                                <label for="rating" class="form-label">Rating</label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ratings">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if(isset($review['rating']) && $review['rating'] >= $i)
                                                <i class="fas fa-star text-warning" data-value="{{ $i }}"></i>
                                            @else
                                                <i class="fas fa-star" data-value="{{ $i }}"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="comment" class="form-label">Comment</label>
                                @if(isset($review['content']))
                                    <textarea name="comment" id="comment" rows="5" class="form-control" readonly>{{ $review['content'] }}</textarea>
                                @else
                                    No Comment found
                                @endif
                            </div>
                        </div>      
                    </div>

                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="btn delete-cancel-button w-25" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn delete-button w-25">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete Review Modal --}}
@else
    {{-- Crate Review Modal --}}
    <div class="modal fade" id="product-review-modal-{{ $order->product->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <h1 class="modal-title h4">Review of "{{ $order->product->name }}"</h1>
                    <p class="mb-0">Please review this product! Thank you for your cooperation!</p>
                </div>
                
                <div class="modal-body">   
                    <div class="row mb-4">
                        <div class="col-5 text-center">
                            @if ($order->product->productImage->isNotEmpty())
                                <img src="{{ asset('storage/images/items/'. $order->product->productImage->first()->productImages->image) }}" class="product-image">
                            @else
                                <img src="{{ asset('images/items/no-image.svg') }}" class="product-image">
                            @endif
                        </div>
                        <div class="col-7">
                            <strong class="d-block mb-3 modal_strong">Shop Name: 
                                <span class="fw-normal">{{ $order->product->seller->first_name }}{{ $order->product->seller->last_name }}</span>
                            </strong>
                            <strong class="d-block mb-3 modal_strong">Category: 
                                <span class="fw-normal">{{ $order->product->category->name }}</span>
                            </strong>
                            <strong class="d-block modal_strong">Price: 
                                <span class="fw-normal">${{ $order->product->price }}</span>
                            </strong>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <h2 class="h4">Description</h2>
                            <p>{{ $order->product->description }}</p>
                        </div>
                    </div>

                    <form action="{{ route('review.store', ['order_line_id' => $order->order_id, 'product_id' => $order->product->id]) }}" method="post">
                        @csrf

                        <div class="row mb-4 align-items-center">
                            <div class="col">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Write your opinion breifly.">
                            </div>
                            <div class="col">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" name="rating" id="rating" hidden>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ratings">
                                        <i class="fas fa-star" data-value="1"></i>
                                        <i class="fas fa-star" data-value="2"></i>
                                        <i class="fas fa-star" data-value="3"></i>
                                        <i class="fas fa-star" data-value="4"></i>
                                        <i class="fas fa-star" data-value="5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Please describe your review for this product or the reason you rated the stars"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="btn edit-cancel-button w-25" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn edit-button w-25">Send</button>
                    </div>
                </form>   
            </div>
        </div>
    </div>
    {{-- Crate Review Modal End --}}
@endif

{{-- Rating JQuery  --}}
<script src="{{ asset('js/orderHistory.js') }}"></script>