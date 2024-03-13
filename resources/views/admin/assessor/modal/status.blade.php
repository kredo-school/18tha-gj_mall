{{-- Change Status --}}
<div class="modal fade " id="change-status-">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header  bg-success">
              <h3 class="modal-title text-light fw-bold mx-auto">
                  Evaluation Status Detail
              </h3>
          </div>
          <div class="modal-body">
              <p class="h5">ID: #123456789</p>
              <p class="h5"><strong class="fw-bold"> Category: </strong> Cloth</p>
              <p class="h5"><strong class="fw-bold">Products Name: </strong>Kimono</p>
              <p class="h5"><strong class="fw-bold">Price: </strong>$100</p>
              <p class="h5"><strong class="fw-bold">Details(WxHxLxW): </strong>70cmx160cmx10cmx1kg</p>
              <p class="h5"><strong class="fw-bold">is Fragile </strong>No</p>
              <p class="h5"><strong class="fw-bold">Seller Shop </strong>Kimono Shop</p>
              <p class="h5"><strong class="fw-bold">Description: </strong><br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure aliquid esse illo cum! Veniam at soluta, quas eaque odio laborum atque officiis numquam doloribus culpa dolor libero impedit veritatis voluptatem?</p>

              <div class="status">
                  <form action="#">
                      <label for="status" class="h5 fw-bold">Status:</label>
                      <select name="stauts" id="status" style="width: 400px">
                          <option value="select">Select the status here...</option>
                          <option value="first">1: Waiting for Evaluation</option>
                          <option value="second">2: Evaluating</option>
                          <option value="third">3: Waiting for Display</option>
                          <option value="forth">4: Suspended</option>
                      </select>
                  </form>
              </div>
              
              
          </div>
          <div class="modal-footer border-0 mx-auto">
              <form action="#" method="#">
                  @csrf

                  <button type="button" class="btn btn-outline-success btn-sm me-1 shadow" data-bs-dismiss="modal" style="width: 210px">
                      Cancel
                  </button>
                  <button type="submit" class="btn btn-success btn-sm fw-light ms-1 shadow" style="width: 210px">Save</button>
              </form>
          </div>
      </div>
  </div>
</div>