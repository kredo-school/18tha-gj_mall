<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

{{-- Edit payment Modal --}}
<div class="modal fade" id="edit_payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h1 class="modal-title h4">Edit Payment Method</h1>
            </div>
            <form action="" method="post">  
                <div class="modal-body">   
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="John Doe" placeholder=" ">
                    </div>

                    <div class="mb-3">
                        <label for="card_number" class="form-label">Card Number</label>
                        <div class="input-with-icon">
                            <input id="card_number" type="tel" class="form-control" inputmode="numeric" 
                                   autocomplete="cc-number" maxlength="19" 
                                   value="4538 6845 4587 1145"
                                   placeholder="xxxx xxxx xxxx xxxx" required>
                            <div id="card_logo" class="card-logo icon text-primary"></div>
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="expire_date" class="form-label">Expire Date</label>
                            <input type="date" name="expire_date" id="expire_date" class="form-control">
                        </div>
                        <div class="col">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="password" name="cvv" id="cvv" class="form-control" value="123" placeholder=" " maxlength="3">
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="btn edit-cancel-button px-5" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn edit-button px-5">Change</button>           
                </div>
            </form>   

        </div>
    </div>
</div>

<script src="{{ asset('js/modalPayment.js') }}"></script>
{{-- Edit payment Modal End --}}