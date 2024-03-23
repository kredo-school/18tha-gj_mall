{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/customerStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="change-status">
  <div class="modal-dialog main">
      <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title text-light fw-bold mx-auto">
                  Answer Inquiry ID 1
              </h3>
          </div>
          <div class="modal-body">
              <p class="question fw-bold">Question</p>
              
              <div class="pt-2">
                  <p class="inquiry-title">Title:</p>
                  <p class="inquiry-content">About Stock</p>
              </div>

              <div class="pt-2">
                <p class="inquiry-title">Inquiry Category:</p>
                <p class="inquiry-content">Question for the product</p>
              </div>

              <div class="pt-2">
                <p class="inquiry-title">Content:</p>
                <p class="inquiry-content">Is there any bigger size. I find bigger size than S size.</p>
              </div>

              <div class="pt-2">
                {{-- css - style.css --}}
                <label for="content" class="form-label inquiry-title">Answer:</label>
                <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Please write the answer here..."></textarea>
              </div>

              <div class="status pt-2">
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
                  <button type="button" class="btn btn-sm cancel-answer-button shadow me-1" data-bs-dismiss="modal">
                      Cancel
                  </button>
                  <button type="submit" class="btn btn-sm complete-answer-button shadow ms-1">Complete</button>
              </form>
          </div>
      </div>
  </div>
</div>
