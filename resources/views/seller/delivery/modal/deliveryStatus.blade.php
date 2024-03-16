{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/deliveryStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="change-status-">
  <div class="modal-dialog main">
      <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title text-light fw-bold mx-auto">
                  Delivery Status Detail
              </h3>
          </div>
          <div class="modal-body">
              <p>ID: #123456789</p>
              <p><strong class="fw-bold"> Category: </strong> Cloth</p>
              <p><strong class="fw-bold">Products Name: </strong>Kimono</p>
              <p><strong class="fw-bold">Price: </strong>$100</p>
              <p><strong class="fw-bold">Details(WxHxLxW): </strong>70cmx160cmx10cmx1kg</p>
              <p><strong class="fw-bold">is Fragile: </strong>No</p>
              <p><strong class="fw-bold">Seller Shop: </strong>Kimono Shop</p>
              <p><strong class="fw-bold">Description: </strong><br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure aliquid esse illo cum! Veniam at soluta, quas eaque odio laborum atque officiis numquam doloribus culpa dolor libero impedit veritatis voluptatem?</p>

              <div class="status">
                <form action="#">
                    <label for="status" class="h5 fw-bold">Status:</label>
                    <select name="stauts" id="status" class="form-select">
                        {{-- Seller can change only first and second action --}}
                        <option value="select">Select the status here...</option>
                        <option value="first">1: Waiting for Acceptance</option>
                        <option value="second">2: Completing Acceptance</option>
                        
                        {{-- <option value="third">3: During Transportation</option> --}}
                        {{-- <option value="forth">4: Completing Shipment</option> --}}
                    </select>
                </form>
            </div>
              
              
          </div>
          <div class="modal-footer border-0 mx-auto montserrat">
              <form action="#" method="#">
                  @csrf
                  {{-- @method('') --}}
                  <button type="button" class="btn btn-sm custom-button3 shadow me-1" data-bs-dismiss="modal">
                      Cancel
                  </button>
                  <button type="submit" class="btn btn-sm custom-button4 shadow ms-1">Complete</button>
              </form>
          </div>
      </div>
  </div>
</div>
