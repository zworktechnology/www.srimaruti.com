<h4 class="card-title mb-4">Pricing Calculation</h4>
<div data-repeater-list="group-a">
    <div data-repeater-item class="row">
        <div class="inner-repeater mb-4">
            <div data-repeater-list="inner-group" class="inner form-group">

            <form autocomplete="off" method="POST" action="{{ route('booking.pricing', ['id' => $data->id]) }}" enctype="multipart/form-data">
            @csrf
                <div data-repeater-item class="inner mb-3 row">
                    <div class="col-md-3 col-8">
                        <label for="horizontal-firstname-input" class="col-form-label">
                            Total - Room Price </label>
                    </div>
                    <div class="col-md-9 col-3">
                        <input type="email" class="form-control" name="email_id" placeholder="Enter here ">
                    </div>
                </div>
                <div data-repeater-item class="inner mb-3 row">
                    <div class="col-md-3 col-8">
                        <label for="horizontal-firstname-input" class="col-form-label">
                            GST </label>
                    </div>
                    <div class="col-md-4 col-5">
                        <input type="email" class="form-control" name="email_id" placeholder="GST Amount - Enter here ">
                    </div>
                    <div class="col-md-5 col-3">
                        <input type="email" class="form-control" name="email_id" placeholder="Gst % - Enter here ">
                    </div>
                </div>
                <div data-repeater-item class="inner mb-3 row">
                    <div class="col-md-3 col-8">
                        <label for="horizontal-firstname-input" class="col-form-label">
                            Discount </label>
                    </div>
                    <div class="col-md-4 col-5">
                        <input type="email" class="form-control" name="email_id" placeholder="Discount Amount - Enter here ">
                    </div>
                    <div class="col-md-5 col-3">
                        <input type="email" class="form-control" name="email_id" placeholder="Discount % - Enter here ">
                    </div>
                </div>
                <div data-repeater-item class="inner mb-3 row">
                    <div class="col-md-3 col-8">
                        <label for="horizontal-firstname-input" class="col-form-label">
                            Additional Charge </label>
                    </div>
                    <div class="col-md-4 col-5">
                        <input type="email" class="form-control" name="email_id" placeholder="Additional Amount - Enter here ">
                    </div>
                    <div class="col-md-5 col-3">
                        <input type="email" class="form-control" name="email_id" placeholder="Note - Enter here ">
                    </div>
                </div>
                <div data-repeater-item class="inner mb-3 row">
                    <div class="col-md-3 col-8">
                        <label for="horizontal-firstname-input" class="col-form-label">
                            Grand Total - To Pay </label>
                    </div>
                    <div class="col-md-9 col-3">
                        <input type="email" class="form-control" name="email_id" placeholder="Enter here ">
                    </div>
                </div>
                <div data-repeater-item class="inner mb-3 row">
                    <div class="col-md-3 col-8">
                        <label for="horizontal-firstname-input" class="col-form-label">
                            Payment Method </label>
                    </div>
                    <div class="col-md-9 col-5">
                        <select class="form-control js-example-basic-single" name="payment_method" required>
                            <option value="" disabled selected hidden class="text-muted">Select Payment Via</option>
                            <option value="Cash" class="text-muted">Cash</option>
                            <option value="Card" class="text-muted">Card</option>
                            <option value="Online Payment" class="text-muted">Online Payment</option>
                        </select>
                    </div>
                </div>

            </form>

            </div>
        </div>
    </div>
</div>
