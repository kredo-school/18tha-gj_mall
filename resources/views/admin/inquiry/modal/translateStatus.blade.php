{{-- If the question is for a seller(Japanese shop), the translator need to translate into English --}}

<link rel="stylesheet" href="{{ asset('css/admin/customerStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="translate-status-">
  <div class="modal-dialog main">
      <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title text-light fw-bold mx-auto">
                  Answer Inquiry ID 2
              </h3>
          </div>
          <div class="modal-body">
              <p class="inquiry-title">Question</p>

              <div class="pt-2">
                  <p class="inquiry-title">Title:</p>
                  <p class="inquiry-content">Shipment Cost</p>
              </div>

              <div class="pt-2">
                <p class="inquiry-title">Inquiry Category:</p>
                <p class="inquiry-content">Shipment</p>
              </div>

              <div class="pt-2">
                <p class="inquiry-title">Content:</p>
                <p class="inquiry-content">How much is the shipment cost to UK?</p>
              </div>

              {{-- Answer in Japanese --}}
              <div class="pt-2">
                <p class="inquiry-title">Answer:</p>
                <p class="inquiry-content">イギリスまでの送料は購入金額に関わらず、送料$20が発生いたします。日本からイギリスまでは航空便となります。</p>
              </div>

              <div class="pt-2">
                {{-- css - using style.css --}}
                <label for="content" class="form-label inquiry-title">Translation:</label>
                <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Please write the answer here..."></textarea>
              </div>

              {{-- Status - select the status --}}
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
                  <button type="button" class="btn btn-sm custom-button4 shadow me-1" data-bs-dismiss="modal">
                      Cancel
                  </button>
                  <button type="submit" class="btn btn-sm custom-button5 shadow ms-1">Complete</button>
              </form>
          </div>
      </div>
  </div>
</div>
