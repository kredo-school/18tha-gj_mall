<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

{{-- Edit payment address Modal --}}
<div class="modal fade" id="edit_address">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h1 class="modal-title h4">Edit Address Information</h1>
            </div>
            <form action="{{ route('customer.editAddress', $customer->address->id) }}" method="post">
                <div class="modal-body">   
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="recipient" class="form-label">Recipient</label>
                        <p>{{ $customer->first_name }} {{ $customer->last_name }}</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country" class="form-select">
                                <option value="" hidden>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->alpha3 }}" {{ $country->alpha3 == $customer->address->country_code ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ $customer->address->city }}" placeholder=" ">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="unit_number" class="form-label">Unit Number</label>
                            <input type="number" name="unit_number" id="unit_number" class="form-control" value="{{ $customer->address->unit_number }}" placeholder=" ">
                        </div>
                        <div class="col">
                            <label for="street_number" class="form-label">Street Number</label>
                            <input type="number" name="street_number" id="street_number" class="form-control" value="{{ $customer->address->street_number }}" placeholder=" ">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address_line_1" class="form-label">Address Line 1</label>
                        <input type="text" name="address_line_1" id="address_line_1" class="form-control" value="{{ $customer->address->address_line1 }}" placeholder=" ">
                    </div>

                    <div class="mb-3">
                        <label for="address_line_2" class="form-label">Address Line 2</label>
                        <input type="text" name="address_line_2" id="address_line_2" class="form-control" value="{{ $customer->address->address_line2 }}" placeholder=" ">
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="number" name="postal_code" id="postal_code" class="form-control" value="{{ $customer->address->postal_code }}" placeholder=" ">
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
{{-- Edit payment address Modal End --}}