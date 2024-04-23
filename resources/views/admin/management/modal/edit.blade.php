{{-- Delete User --}}
<link rel="stylesheet" href="{{ asset('css/admin/management/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="edit-user-{{ $admin->id }}">
    <div class="modal-dialog main text-start">
        <div class="modal-content">
            <div class="modal-header edit-header">
                <h3 class="modal-title text-light fw-bold mx-auto">
                    Edit Admin ID - {{ $admin->id }}
                </h3>
            </div>

            <form method="POST" action="{{ route('admin.update', $admin->id) }}"  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    {{-- Name part --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label for="first-name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control"  value="{{ old('first_name', $admin->first_name) }}">
                        </div>
                        <div class="col">
                            <label for="last-name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"  value="{{ old('last_name', $admin->last_name) }}">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $admin->email) }}">
                    </div>

                    {{-- Phone Number --}}
                    <div class="mb-3">
                        <label for="phone-number" class="form-label">Phone Number</label>
                        <input type="phone_number" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $admin->phone_number) }}">
                    </div>  

                    {{-- password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="{{ substr(old('password', $admin->password), 0, 8) }}" >
                    </div>
                    
                    {{-- Status --}}
                    <div class="status">
                        <label for="role" id="role">Status:</label>
                        <select name="role" id="role" class="form-select">
                            <option hidden>{{old('role', $admin->role)}}</option>
                            <option value="1">1: Admin</option>
                            <option value="2">2: Stuff</option>
                            <option value="3">3: Translator</option>
                            <option value="4">4: Assessor</option>
                            <option value="5">5: Delivery</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer border-0 montserrat">
                    <button type="button" class="btn btn-sm cancel-user-button shadow mx-auto" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-sm register-user-button shadow mx-auto">Update User</button>                  
                </div>
            </form>
        </div>
    </div>
</div>
