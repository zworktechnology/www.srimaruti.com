<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail View</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mb-4">
                <div class="col-sm-4">
                    <label class="col-sm-12 col-form-label">Amount</label>
                </div>
                <div class="col-sm-4">
                    <label class="col-sm-12 col-form-label">Count</label>
                </div>
                <div class="col-sm-4">
                    <label class="col-sm-12 col-form-label">Total</label>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="2000">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_2000 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 2000 * $datas->count_2000 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="500">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_500 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 500 * $datas->count_500 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="200">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_200 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 200 * $datas->count_200 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="100">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_100 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 100 * $datas->count_100 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="50">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_50 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 50 * $datas->count_50 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="20">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_20 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 20 * $datas->count_20 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="10">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_10 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 10 * $datas->count_10 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="5">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_5 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 5 * $datas->count_5 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="2">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_2 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 2 * $datas->count_2 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="1">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->count_1 }}">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ 1 * $datas->count_1 }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-8">
                    <label class="col-sm-12 col-form-label">Grand_total</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="{{ $datas->total }}">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
