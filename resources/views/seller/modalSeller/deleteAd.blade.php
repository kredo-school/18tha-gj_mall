<link rel="stylesheet" href="{{ asset('css/seller/ads.css') }}">

<div class="modal fade " id="Ad-Delete-Modal-{{$ad->id}}">
    <div class="modal-dialog ">
        <div class="modal-content">
            {{-- header --}}
            <div class="modal-head">
                <div class="row">
                    <div class="col text-white text-center py-2">
                        <h3 class="fw-bold mx-auto">
                            Delete Ad ID - {{$ad->id}}
                        </h3>
                        <h5>Are you sure you want to delete this ad ?</h5>
                    </div>
                </div>
            </div>
            {{-- body --}}
            <div class="row ">
                <div class="col text-center pt-3">
                    <img src="{{ asset("storage/images/ads/".$ad->image_name  ) }}" alt="" class="image-sm">
                </div>
            </div>
            <div class="row">
                <div class="col text-start py-2">
                    <div class="modal-body">
                        <p class="h5 py-5"><strong class="fw-bold"> Title: </strong> {{$ad->title}}</p>
                        <p class="h5 pb-5"><strong class="fw-bold">Products ID - Name: </strong>{{$ad->id}} -- {{$ad->product->name}}</p>
                        <p class="h5 pb-2"><strong class="fw-bold">Description: </strong><br>{{$ad->content}}</p>
                    </div>
                </div>
            </div>
            {{-- footer --}}
            <div class="modal-footer modal-foot d-flex justify-content-around">
                <form action="{{route("seller.ads.destroy",$ad->id)}}" method="POST">
                    @method('DELETE')
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
