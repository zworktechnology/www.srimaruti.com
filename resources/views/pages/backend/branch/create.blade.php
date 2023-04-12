<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel">New Branch</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form method="POST" action="{{ route('branch.store') }}" autocomplete="off">
            @csrf
            <div class="modal-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Name </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" placeholder="Enter name *" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Address </label>
                    <div class="col-sm-12">
                        <textarea type="text" class="form-control" name="address" placeholder="Enter address "></textarea>
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
