{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/evaluationStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade " id="change-status">
    <div class="modal-dialog main">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fw-bold text-white mx-auto">
                    Evaluation Status Detail
                </h3>
            </div>

            <div class="modal-body">
                <div class="pt-3">
                    <p><strong class="fw-bold"> ID: </strong> #123456789</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold"> Category: </strong> Cloth</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Products Name: </strong>Kimono</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Price: </strong>$100</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Details(WxHxLxW): </strong>70cmx160cmx10cmx1kg</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Fragile: </strong>No</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Seller Shop: </strong>Kimono Shop</p>
                </div>
                <div class="pt-3">
                    <p><strong class="fw-bold">Description: </strong><br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure aliquid esse illo cum! Veniam at soluta, quas eaque odio laborum atque officiis numquam doloribus culpa dolor libero impedit veritatis voluptatem?</p>
                </div>
                
                {{-- Status --}}
                <div class="status">
                    <form action="#">
                        <label for="status" class="h5 fw-bold">Status:</label>
                        <select name="stauts" id="status" class="form-select">
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

                    <button type="button" class="btn cancel-status-button me-1 shadow" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn save-status-button ms-1 shadow">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>