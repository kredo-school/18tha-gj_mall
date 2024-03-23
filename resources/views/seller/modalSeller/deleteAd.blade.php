<link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">

<div class="modal fade " id="DeleteModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            {{-- header --}}
            <div class="modal-head">
                <div class="row">
                    <div class="col text-white text-center py-2">
                        <h3 class="fw-bold mx-auto">
                            Delete Ad ID -xxx
                        </h3>
                        <h5>Are you sure you want to delete this ad ?</h5>
                    </div>
                </div>
            </div>
            {{-- body --}}
            <div class="row ">
                <div class="col text-center pt-3">
                    <img src="{{ asset("images/items/item2.svg") }}" alt="" class="image-sm">
                </div>
            </div>
            <div class="row">
                <div class="col text-start py-2">
                    <div class="modal-body">
                        <p class="h5 py-5"><strong class="fw-bold"> Title: </strong> Awsome craft is coming soon!!</p>
                        <p class="h5 pb-5"><strong class="fw-bold">Products ID - Name: </strong>ID - Kimono</p>
                        <p class="h5 pb-2"><strong class="fw-bold">Description: </strong><br>Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Iure aliquid esse illo cum! Veniam at soluta, quas eaque odio
                            laborum
                            atque officiis numquam doloribus culpa dolor libero impedit veritatis voluptatem?</p>
                    </div>
                </div>
            </div>
            {{-- footer --}}
            <div class="modal-footer modal-foot d-flex justify-content-around">
                <form action="#" method="#">
                    @csrf
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
