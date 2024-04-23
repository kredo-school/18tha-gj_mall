<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

{{-- Edit payment Modal --}}
<div class="modal fade" id="edit_payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h1 class="modal-title h4">Edit Payment Method</h1>
            </div>
            <form action="{{ route('customer.editPayment', $customer->payment->id) }}" method="post">  
                <div class="modal-body">   
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $customer->payment->card_name }}" placeholder=" ">
                    </div>

                    <div class="mb-3">
                        <label for="card_number" class="form-label">Card Number</label>
                        <div class="input-with-icon">
                            <input id="card_number" type="tel" name="card_number" class="form-control" inputmode="numeric" 
                                   maxlength="19" value="{{ $customer->payment->card_number }}"
                                   placeholder=" " required autocomplete="off">
                            <div id="card_logo" class="card-logo icon text-primary"></div>
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="expire_date" class="form-label">Expire Date</label>
                            <input type="date" name="expiry_date" id="expire_date" value="{{ $customer->payment->expiry_date }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="btn edit-cancel-button px-5" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn edit-button px-5">Change</button>           
                </div>
            </form>   

        </div>
    </div>
</div>

<script src="{{ asset('js/modalPayment.js') }}"></script>
{{-- Edit payment Modal End --}}