<div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Basic Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check In Date & Time</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input"
                        class="col-sm-9 col-form-label">{{ date('d M Y', strtotime($bookingDatas['chick_in_date'])) }} -
                        ( {{ date('h:i A', strtotime($bookingDatas['chick_in_time'])) }} )</label>
                </div>
            </div>
            <div class="row mb-4">
                @if ($bookingDatas['status'] == 2)
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Out Date & Time</label>
                @else
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check Out Date & Time</label>
                @endif
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">
                        @if ($bookingDatas['status'] == 2)
                        <span style="color:red;">{{ date('d M Y', strtotime($bookingDatas['out_date'])) }} - ({{ date('h:i A', strtotime($bookingDatas['out_time'])) }})</span>
                        @else
                        <span>{{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }} - ({{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }})</span>
                        @endif
                    </label>
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Total</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" style="color:green;">₹
                        {{ $bookingDatas['grand_total'] }}</label>
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Paid</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" style="color:#6f42c1;">₹
                        {{ $bookingDatas['total_paid'] }}</label>
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Balance</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" style="color:#e83e8c;">₹
                        {{ $bookingDatas['balance_amount'] }}</label>
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Front Proof</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <img src="{{ asset($bookingDatas['proofimage_one']) }}" style="width: 200px !important; height: 150px !important;"/>
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Back Proof</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <img src="{{ asset($bookingDatas['proofimage_two']) }}" style="width: 200px !important; height: 150px !important;"/>
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Profile</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <img src="{{ asset($bookingDatas['customer_photo']) }}" style="width: 200px !important; height: 150px !important;"/>
                </div>
            </div>
        </div>
    </div>
</div>
