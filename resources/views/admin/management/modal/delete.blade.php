{{-- Delete User --}}
<link rel="stylesheet" href="{{ asset('css/admin/management/deleteUser.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade " id="delete-user-{{ $admin->id }}">
    <div class="modal-dialog text-start">
        <div class="modal-content">
            <div class="modal-header flex-column delete-header">
                <h1 class="modal-title fw-bold">Delete Admin ID - {{ $admin->id }}</h1>
                <p class="mb-0 small-title">Are you sure you want to delete this user?</p>
            </div>

            <form action="{{ route('admin.destroy', $admin->id) }}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-body">
                    <div class="pb-5">
                        <p><strong class="fw-bold"> Name: </strong>{{ $admin->first_name }} {{ $admin->last_name }}</p>
                    </div>
                    <div class="pb-5">
                        <p><strong class="fw-bold">E-mail: </strong>{{ $admin->email }}</p>
                    </div>
                    <div class="pb-5">
                        <p><strong class="fw-bold">Phone Number: </strong>{{ $admin->phone_number }}</p>
                    </div>
                    <div class="pb-5">
                        <p><strong class="fw-bold">Role: </strong>{{ $admin->role }}</p>
                    </div>
                </div>
                <div class="modal-footer border-0 montserrat">
                    <button type="button" class="btn btn-sm custom-button4 shadow mx-auto" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-sm custom-button5 shadow mx-auto">Delete User</button>      
                </div>
            </form>
    </div>
</div>
