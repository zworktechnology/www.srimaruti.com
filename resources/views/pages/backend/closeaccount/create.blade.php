<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel">New Close Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form method="POST" action="{{ route('closeaccount.store') }}" autocomplete="off">
            @csrf
            <div class="modal-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Date </label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" name="date" placeholder="Enter date *" value="{{ $today }}" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Closer Name </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="closer_name" placeholder="Enter closer name *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Branch </label>
                    <div class="col-sm-12">
                        <select class="form-control js-example-basic-single" name="branch_id" required>
                            <option value="" disabled selected hidden class="text-muted">
                                Select branch *</option>
                            @foreach ($branch as $branchs)
                            <option value="{{ $branchs->id }}">{{ $branchs->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        2000 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_2000" placeholder="Enter 2000 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        500 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_500" placeholder="Enter 500 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        200 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_200" placeholder="Enter 200 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        100 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_100" placeholder="Enter 100 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        50 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_50" placeholder="Enter 50 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        20 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_20" placeholder="Enter 20 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        10 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_10" placeholder="Enter 10 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        5 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_5" placeholder="Enter 5 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        2 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_2" placeholder="Enter 2 *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        1 </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="count_1" placeholder="Enter 1 *" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" hidden>Close</button>
                <button type="submit" class="btn btn-primary">Save now</button>
            </div>
        </form>
    </div>
</div>
