{{-- Delete User --}}
<link rel="stylesheet" href="{{ asset('css/admin/management/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade " id="edit-user-">
  <div class="modal-dialog main">
      <div class="modal-content">
          <div class="modal-header edit-header">
              <h3 class="modal-title text-light fw-bold mx-auto">
                  Edit Admin ID - 1
              </h3>
          </div>

            <div class="modal-body">
                {{-- Name part --}}
                <div class="row mb-3">
                    <div class="col">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="John">
                    </div>
                    <div class="col">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="Smith">
                    </div>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                <label for="recipient" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="johonsmith@gmail.com">
                </div>

                {{-- password --}}
                <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="xxxxxxxx">
                </div>
                
                {{-- Status --}}
                <div class="status">
                    <form action="#">
                        <label for="status" class="fw-bold">Status:</label>
                        <select name="stauts" id="status" class="form-select">
                            <option value="select" hidden>Select the role here...</option>
                            <option value="zero">0: Seller</option>
                            <option value="first" selected>1: Admin</option>
                            <option value="second">2: Stuff</option>
                            <option value="third">3: Translator</option>
                            <option value="forth">4: Assessor</option>
                            <option value="fifth">5: Delivery</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="modal-footer border-0 mx-auto montserrat">
                <form action="#" method="#">
                    @csrf
                    {{-- @method('') --}}
                    <button type="button" class="btn btn-sm cancel-button shadow me-1" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-sm update-button shadow ms-1">Update User</button>
                </form>
            </div>
      </div>
  </div>
</div>
