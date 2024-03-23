{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/management/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade " id="create-user">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header edit-header">
              <h2 class="text-light fw-bold m-auto">
                  Create Seller or Admin Users
              </h2>
          </div>
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
                <label for="recipient" class="form-label fw-bold">E-mail</label>
                <input type="email" name="email" id="email" class="form-control">
              </div>

              {{-- password --}}
              <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
              
              {{-- Status --}}
              <div class="status">
                  <form action="#">
                      <label for="status" id="status" class="fw-bold">Status:</label>
                      <select name="stauts" id="status" class="form-select">
                          <option value="select">Select the role here...</option>
                          <option value="zero">0: Seller</option>
                          <option value="first">1: Admin</option>
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
                  <button type="button" class="btn btn-sm cancel-user-button shadow me-1" data-bs-dismiss="modal">
                      Cancel
                  </button>
                  <button type="submit" class="btn btn-sm register-user-button shadow ms-1">Register User</button>
              </form>
          </div>
      </div>
  </div>
</div>
