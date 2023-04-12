<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel">New Open Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form method="POST" action="{{ route('openaccount.store') }}" autocomplete="off">
            @csrf
            <div class="modal-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Date </label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" name="date" placeholder="Enter floor " value="{{ $today }}">
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
                        Amount </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="amount" placeholder="Enter amount *" required>
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
