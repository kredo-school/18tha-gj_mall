<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

{{-- Edit payment address Modal --}}
<div class="modal fade" id="edit_address">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h1 class="modal-title h4">Edit Address Information</h1>
            </div>
            <form action="" method="post">  
                <div class="modal-body">   
                    @csrf

                    <div class="mb-3">
                        <label for="recipient" class="form-label">Recipient</label>
                        <input type="text" name="recipient" id="recipient" class="form-control" value="John Doe" placeholder=" ">
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country" class="form-select">
                                <option value="" hidden>Select Country</option>
                                <option value="" selected>USA</option>
                                <option value="">JAPAN</option>
                                <option value="">UK</option>
                                <option value="">UAE</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" class="form-control" placeholder=" ">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="unit_number" class="form-label">Unit Number</label>
                            <input type="number" name="unit_number" id="unit_number" class="form-control" placeholder=" ">
                        </div>
                        <div class="col">
                            <label for="street_number" class="form-label">Street Number</label>
                            <input type="number" name="street_number" id="street_number" class="form-control" value="123" placeholder=" ">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address_line_1" class="form-label">Address Line 1</label>
                        <input type="text" name="address_line_1" id="address_line_1" class="form-control" value="Mountain View" placeholder=" ">
                    </div>

                    <div class="mb-3">
                        <label for="address_line_2" class="form-label">Address Line 2</label>
                        <input type="text" name="address_line_2" id="address_line_2" class="form-control" value="Bay View Drive" placeholder=" ">
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="region" class="form-label">Region</label>
                            <select name="region" id="region" class="form-select">
                                <option value="" hidden>Select Region</option>
                                <option value="" selected>CA</option>
                                <option value="">TX</option>
                                <option value="">NY</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="number" name="postal_code" id="postal_code" class="form-control" value="94043" placeholder=" ">
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
{{-- Edit payment address Modal End --}}