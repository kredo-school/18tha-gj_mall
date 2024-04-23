{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/management/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade " id="create-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header edit-header">
                <h2 class="text-light fw-bold m-auto">
                    Create Admin Users
                </h2>
            </div>

            <form action="{{ route('admin.store') }}" method="POST">
            @csrf
                <div class="modal-body">
                    {{-- Name part --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label for="first-name" class="form-label fw-bold">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="last-name" class="form-label fw-bold">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    {{-- Phone Number --}}
                    <div class="mb-3">
                        <label for="phone_number" class="form-label fw-bold">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" class="form-control">
                    </div>
                    

                    {{-- password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    
                    {{-- Status --}}
                    <div class="status">
                        <label for="role" id="role" class="fw-bold">Status:</label>
                        <select name="role" id="role" class="form-select">
                            <option value="select">Select the role here...</option>
                            <option value="1">1: Admin</option>
                            <option value="2">2: Stuff</option>
                            <option value="3">3: Translator</option>
                            <option value="4">4: Assessor</option>
                            <option value="5">5: Delivery</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0  montserrat">
                    <button type="button" class="btn btn-sm cancel-user-button shadow mx-auto" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-sm register-user-button shadow  mx-auto">Register User</button>                  
                </div>
            </form>
        </div>
    </div>
</div>
