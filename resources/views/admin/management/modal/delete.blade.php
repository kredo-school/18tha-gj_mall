{{-- Delete User --}}
<link rel="stylesheet" href="{{ asset('css/admin/management/deleteUser.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade " id="delete-user-">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header flex-column delete-header">
              <h1 class="modal-title fw-bold">Delete Admin ID - 1</h1>
              <p class="mb-0 small-title">Are you sure you want to delete this user?</p>
          </div>

        <div class="modal-body">
            <div class="pb-5">
                <p><strong class="fw-bold"> Name: </strong> John Smith</p>
            </div>
            <div class="pb-5">
                <p><strong class="fw-bold">E-mail: </strong>johnsmith@gmail.com</p>
            </div>
            <div class="pb-5">
                <p><strong class="fw-bold">Role: </strong>Admin</p>
            </div>

            {{-- <p><strong class="fw-bold mb-4"> Name: </strong> John Smith</p>
            <p><strong class="fw-bold mb-4">E-mail: </strong>johnsmith@gmail.com</p>
            <p><strong class="fw-bold mb-4">Role: </strong>Admin</p>                 --}}
        </div>
        <div class="modal-footer border-0 mx-auto montserrat">
            <form action="#" method="#">
                @csrf
                {{-- @method('') --}}
                <button type="button" class="btn btn-sm custom-button4 shadow me-1" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-sm custom-button5 shadow ms-1">Delete User</button>
            </form>
        </div>
  </div>
</div>
