<div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $branchwise_lists['branch_name'] }} Room Income Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Room Billing Cost</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">₹
                        {{ $branchwise_lists['Room_income'] }}</label>
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">GST Tax Cost</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">₹
                        {{ $branchwise_lists['gstamount'] }}</label>
                </div>
            </div>
            <hr>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Total Cost</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">₹
                        {{ $branchwise_lists['balanceamount_from_roomincome'] }}</label>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
