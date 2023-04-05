<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel">New Room</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form method="POST" action="{{ route('room.store') }}" autocomplete="off">
            @csrf
            <div class="modal-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Branch </label>
                    <div class="col-sm-12">
                        <select class="form-control js-example-basic-single" name="branch_id" required>
                            <option value="" disabled selected hidden class="text-muted">
                                Select Branch</option>
                            @foreach ($branch as $branchs)
                            <option value="{{ $branchs->id }}">{{ $branchs->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Floor </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="room_floor" placeholder="Enter floor ">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Number </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="room_number" placeholder="Enter room number ">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Type </label>
                    <div class="col-sm-12">
                        <select class="form-control js-example-basic-single" name="room_type" required>
                            <option value="" disabled selected hidden class="text-muted">Select Type</option>
                            <option value="A/C" class="text-muted">A/C</option>
                            <option value="Non A/c" class="text-muted">Non A/C</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Category </label>
                    <div class="col-sm-12">
                        <select class="form-control js-example-basic-single" name="room_category" required>
                            <option value="" disabled selected hidden class="text-muted">Select Category</option>
                            <option value="Single" class="text-muted">Single</option>
                            <option value="Double" class="text-muted">Double</option>
                            <option value="Triple" class="text-muted">Triple</option>
                            <option value="Quad" class="text-muted">Quad</option>
                            <option value="Service Apartment" class="text-muted">Service Apartment</option>
                            <option value="Suite" class="text-muted">Suite</option>
                            <option value="Family" class="text-muted">Family</option>
                        </select>
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
