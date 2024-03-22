<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

{{-- Crate Review Modal --}}
<div class="modal fade" id="product-review-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h1 class="modal-title h4">Review of "Product Name"</h1>
                <p class="mb-0">Please review this product! Thank you for your cooperation!</p>
            </div>
            
            <div class="modal-body">   
                <div class="row mb-4">
                    <div class="col-5 text-center">
                        <img src="{{ asset('images/account/bgAdmin.svg') }}" class="product-image">
                    </div>
                    <div class="col-7">
                        <strong class="d-block mb-3">Shop Name: <span class="fw-normal">Product Name</span></strong>
                        <strong class="d-block mb-3">Category: <span class="fw-normal">Product Category</span></strong>
                        <strong class="d-block">Price: <span class="fw-normal">$150</span></strong>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <h2 class="h4">Description</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo voluptates illum architecto cupiditate, eligendi odit mollitia, deleniti et commodi quisquam quidem inventore. Eius magni, cum totam distinctio blanditiis earum dolore?</p>
                    </div>
                </div>

                <form action="" method="post">
                    @csrf

                    <div class="row mb-4 align-items-center">
                        <div class="col">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Write your opinion breifly.">
                        </div>
                        <div class="col">
                            <label for="rating" class="form-label">Rating</label>
                            <div class="d-flex justify-content-between align-items-center">
                                {{-- Check: Might need to modify when creating BackEnd. --}}
                                <div class="ratings">
                                    <i class="fas fa-star" data-value="5"></i>
                                    <i class="fas fa-star" data-value="4"></i>
                                    <i class="fas fa-star" data-value="3"></i>
                                    <i class="fas fa-star" data-value="2"></i>
                                    <i class="fas fa-star" data-value="1"></i>
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
                </form>   
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" class="btn edit-cancel-button w-25" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn edit-button w-25">Send</button>
            </div>
        </div>
    </div>
</div>
{{-- Crate Review Modal End --}}

{{-- Edit Review Modal --}}
<div class="modal fade" id="product-review-edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h1 class="modal-title h4">Edit Review of "Product Name"</h1>
                <p class="mb-0">Please review this product! Thank you for your cooperation!</p>
            </div>
            
            <div class="modal-body">   
                <div class="row mb-4">
                    <div class="col-5 text-center">
                        <img src="{{ asset('images/account/bgAdmin.svg') }}" class="product-image">
                    </div>
                    <div class="col-7">
                        <strong class="d-block mb-3">Shop Name: <span class="fw-normal">Product Name</span></strong>
                        <strong class="d-block mb-3">Category: <span class="fw-normal">Product Category</span></strong>
                        <strong class="d-block">Price: <span class="fw-normal">$150</span></strong>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <h2 class="h4">Description</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo voluptates illum architecto cupiditate, eligendi odit mollitia, deleniti et commodi quisquam quidem inventore. Eius magni, cum totam distinctio blanditiis earum dolore?</p>
                    </div>
                </div>

                <form action="" method="post">
                    @csrf

                    <div class="row mb-4 align-items-center">
                        <div class="col">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Write your opinion breifly." value="Amazing Japanese Product!">
                        </div>
                        <div class="col">
                            <label for="rating" class="form-label">Rating</label>
                            <div class="d-flex justify-content-between align-items-center">
                                {{-- Check: Might need to modify when creating BackEnd. --}}
                                <div class="ratings">
                                    <i class="fas fa-star text-warning" data-value="5"></i>
                                    <i class="fas fa-star text-warning" data-value="4"></i>
                                    <i class="fas fa-star text-warning" data-value="3"></i>
                                    <i class="fas fa-star" data-value="2"></i>
                                    <i class="fas fa-star" data-value="1"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Please describe your review for this product or the reason you rated the stars">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, magni!</textarea>
                        </div>
                    </div>
                </form>   
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" class="btn edit-cancel-button w-25" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn edit-button w-25">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- Edit Review Modal --}}

{{-- Delete Review Modal --}}
<div class="modal fade" id="product-review-delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header delete flex-column">
                <h1 class="modal-title h4">Delete Review of "Product Name"</h1>
                <p class="mb-0">Are you sure you want to delete this review ?</p>
            </div>
            
            <div class="modal-body">   
                <div class="row mb-4">
                    <div class="col-5 text-center">
                        <img src="{{ asset('images/account/bgAdmin.svg') }}" class="product-image">
                    </div>
                    <div class="col-7">
                        <strong class="d-block mb-3">Shop Name: <span class="fw-normal">Product Name</span></strong>
                        <strong class="d-block mb-3">Category: <span class="fw-normal">Product Category</span></strong>
                        <strong class="d-block">Price: <span class="fw-normal">$150</span></strong>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <h2 class="h4">Description</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo voluptates illum architecto cupiditate, eligendi odit mollitia, deleniti et commodi quisquam quidem inventore. Eius magni, cum totam distinctio blanditiis earum dolore?</p>
                    </div>
                </div>

                <div class="row mb-4 align-items-center">
                    <div class="col">
                        <label for="title" class="form-label">Title</label>
                        <p>Amazing Japanese Product!</p>
                    </div>
                    <div class="col">
                        <label for="rating" class="form-label">Rating</label>
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- Check: Might need to modify when creating BackEnd. --}}
                            <div class="ratings">
                                <i class="fas fa-star text-warning" data-value="5"></i>
                                <i class="fas fa-star text-warning" data-value="4"></i>
                                <i class="fas fa-star text-warning" data-value="3"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="1"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea name="comment" id="comment" rows="5" class="form-control" readonly>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, magni!</textarea>
                    </div>
                </div>
                 
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" class="btn delete-cancel-button w-25" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn delete-button w-25">Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- Delete Review Modal --}}

{{-- Rating JQuery  --}}
<script src="{{ asset('js/orderHistory.js') }}"></script>