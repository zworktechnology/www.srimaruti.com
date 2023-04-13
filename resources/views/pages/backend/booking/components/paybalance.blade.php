
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pay Balance Amount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" method="POST"
                    action="{{ route('booking.pay_balance', ['id' => $bookingDatas['id']]) }}">
                    @method('PUT')
                    @csrf

                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Customer Name
                        </label>
                        <div class="col-sm-8">
                            <span class="form-control">{{ $bookingDatas['customer_name'] }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Days </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control days" disabled style="color:green" name="days"
                                id="days" value="{{ $bookingDatas['days'] }}" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Grand
                            Total</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="background: #dfdc7d;" disabled
                                name="grand_total" id="grand_total" value="{{ $bookingDatas['grand_total'] }}" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Total Paid
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control paid_amount" style="background: #82e182;" disabled
                                id="paid_amount" value="{{ $bookingDatas['total_paid'] }}" name="paid_amount"
                                placeholder="Enter here ">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Balance</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control balance_amount" style="background: #e99e9e"
                                id="balance_amount" disabled value="{{ $bookingDatas['balance_amount'] }}"
                                name="balance_amount" placeholder="Enter here ">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                            Paid Amounts </label>
                        <div class="col-sm-8 row">


                            @foreach ($bookingDatas['terms'] as $index => $term_arr)
                                @if ($term_arr['booking_id'] == $bookingDatas['id'])
                                    <span class="col-sm-4">
                                        <input type="text" style="background: #e0ddeb;" class="form-control term"
                                            disabled id="term" value="{{ $term_arr['term'] }}">
                                    </span>
                                    <span class="col-sm-4">
                                        <input type="text" disabled style="background: #e0ddeb;"
                                            class="form-control payable_amount" id="payable_amount"
                                            value="{{ $term_arr['payable_amount'] }}">
                                    </span>
                                    <span class="col-sm-4">
                                        <input type="text" disabled style="background: #e0ddeb;"
                                            class="form-control paymentmethod" id="paymentmethod"
                                            value="{{ $term_arr['payment_method'] }}">
                                    </span>
                                @endif
                            @endforeach


                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Term <span
                                style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="payment_term" required>
                                <option value="" selected class="text-muted">Select</option>
                                <option value="Term II" class="text-muted">Term II</option>
                                <option value="Term III" class="text-muted">Term III</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Payment Method
                            <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="payment_method" required>
                                <option value="" selected class="text-muted">Select Payment Via
                                </option>
                                <option value="Cash" class="text-muted">Cash</option>
                                <option value="Online Payment" class="text-muted">Online Payment
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Payable Amount
                            <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control payable_amount" id="payable_amount"
                                value="" name="payable_amount" placeholder="Enter here ">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Pay</button>
                        <button type="button" class="btn btn-secondary paybalanceclosebutton"
                            data-bs-dismiss="modal">No, Get Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

