{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/customerStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="change-status-">
  <div class="modal-dialog main">
      <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title text-light fw-bold mx-auto">
                  Answer Inquiry ID 1
              </h3>
          </div>
          <div class="modal-body">
              <p class="inquiry-title">Question</p>
              <div>
                  <p class="inquiry-title">Title</p>
                  <p class="inquiry-content">Refund</p>
              </div>

              <div>
                <p class="inquiry-title">Inquiry Category</p>
                <p class="inquiry-content">Refund</p>
              </div>

              <div>
                <p class="inquiry-title">Content</p>
                <p class="inquiry-content">I misordered the size.</p>
              </div>

              <div>
                {{-- css - style.css --}}
                <label for="content" class="form-label inquiry-title">Answer</label>
                <textarea name="content" id="content" rows="5" class="form-control" placeholder="Please write the answer here..."></textarea>
              </div>

              <div class="status">
                  <form action="#">
                      <label for="status" class="inquiry-title">Status:</label><br>
                      <select name="stauts" id="status" class="inquiry-content form-control">
                          <option value="select">1: Unsolved</option>
                          <option value="first">1: Unsolved</option>
                          <option value="second">2: Answer</option>
                          <option value="third">3: Solved</option>
                      </select>
                  </form>
              </div>
              
              
          </div>
          <div class="modal-footer border-0 mx-auto montserrat">
              <form action="#" method="#">
                  @csrf
                  {{-- @method('') --}}
                  <button type="button" class="btn btn-sm custom-button4 shadow me-1" data-bs-dismiss="modal">
                      Cancel
                  </button>
                  <button type="submit" class="btn btn-sm custom-button5 shadow ms-1">Complete</button>
              </form>
          </div>
      </div>
  </div>
</div>
