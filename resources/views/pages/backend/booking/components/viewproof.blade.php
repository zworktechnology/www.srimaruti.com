<div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Proof Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Front Proof</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <img src="{{ asset($bookingDatas['proofimage_one']) }}"/>
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Back Proof</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <img src="{{ asset($bookingDatas['proofimage_two']) }}"/>
                </div>
            </div>
            <daciv class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Profile</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <img src="{{ asset($bookingDatas['customer_photo']) }}"/>
                </div>
            </div>
        </div>
    </div>
</div>
