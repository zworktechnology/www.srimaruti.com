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
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check Out Date & Time</label>
                <label class="col-sm-1">-</label>
                <div class="col-sm-8">
                    <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">


                        @if ($bookingDatas['extended_date'] != '' && $bookingDatas['chick_out_date'] != '')
                            {{ date('d M Y', strtotime($bookingDatas['extended_date'])) }} - ({{ date('h:i A', strtotime($bookingDatas['extended_time'])) }})
                        @elseif($bookingDatas['chick_out_date'] != '')
                            {{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }} - ({{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }})
                        @else
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
        </div>
    </div>
</div>
