<div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Check Out</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <p>Please confirm that you wish to check out customer Mr. or Ms. <b>{{ $bookingDatas['customer_name'] }}</b> at <b>{{ $timenow }}</b> on <b>{{ date('M d, Y', strtotime($today)) }}</b></p>


            <form autocomplete="off" method="POST"
                action="{{ route('booking.checkout', ['id' => $bookingDatas['id']]) }}">
                @method('PUT')
                @csrf
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Customer Name </label>
                    <div class="col-sm-9">
                        <span class="form-control">{{ $bookingDatas['customer_name'] }}</span>
                    </div>
                </div>

                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check-in Date </label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" id="checkin_date" disabled name="checkin_date"
                            placeholder="Enter here " value="{{ $bookingDatas['chick_in_date'] }}">
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" id="checkin_time" disabled name="checkin_time"
                            placeholder="Enter here " value="{{ $bookingDatas['chick_in_time'] }}">
                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check-out Date <span
                            style="color: red;">*</span></label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" id="checkout_date" disabled name="checkout_date"
                            placeholder="Enter here " value="{{ $bookingDatas['chick_out_date'] }}">
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" id="checkout_time" name="checkout_time"
                            placeholder="Enter here " value="{{ $bookingDatas['chick_out_time'] }}">
                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Days </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control no_of_days" disabled style="color:green"
                            name="no_of_days" id="no_of_days{{ $bookingDatas['id'] }}"
                            value="{{ $bookingDatas['days'] }}" />
                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Room Details </label>
                    <div class="col-sm-9">

                        <table class="table table-bordered dt-responsive nowrap col-12" id="">
                            <thead>
                                <tr>
                                    <th class="col-6">Room</th>
                                    <th class="col-3">Room Cost / Day</th>
                                    <th class="col-3">Room Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" class="form-control" name="booking_id" id="booking_id"
                                    value="{{ $bookingDatas['id'] }}" />
                                @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                    @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                        <script>
                                            $(document).ready(function() {
                                                $('.checkout' + {{ $bookingDatas['id'] }}).each(function() {
                                                    $(this).on('click', function(e) {
                                                        e.preventDefault();
                                                        var $this = $(this),
                                                            booking_id = $this.attr('data-id');




                                                        $(document).on("keyup", '#no_of_days' + {{ $bookingDatas['id'] }}, function() {
                                                            var no_of_days = $(this).val();
                                                            //console.log(no_of_days);

                                                            var booking_room_price = $('.booking_room_price' +
                                                                {{ $bookingDatas['id'] }}{{ $room_lists['id'] }}).val();

                                                            var CalAmount = no_of_days * booking_room_price;
                                                            $('#booking_room_cal_price' +
                                                                {{ $bookingDatas['id'] }}{{ $room_lists['id'] }}).val(
                                                                CalAmount);

                                                            var totalAmount = 0;
                                                            $('.booking_room_cal_price' + {{ $bookingDatas['id'] }}).each(
                                                                function() {

                                                                    totalAmount = Number(totalAmount) + Number($(this)
                                                                    .val());
                                                                    console.log(totalAmount);
                                                                    $('#total_calc_price' + {{ $bookingDatas['id'] }}).val(
                                                                        totalAmount);
                                                                });

                                                            var additional_charge = $('#additional_charge' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var total_calc_price = $('#total_calc_price' +
                                                                {{ $bookingDatas['id'] }}).val();

                                                            var discount_percentage = $('#discount_percentage' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var discount_in_amount = (discount_percentage / 100) *
                                                                total_calc_price;
                                                            $('#discount_amount' + {{ $bookingDatas['id'] }}).val(
                                                                discount_in_amount);


                                                            var gst_percentage = $('#gst_percentage' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var gst_in_amount = (gst_percentage / 100) * total_calc_price;
                                                            $('#gst_amount' + {{ $bookingDatas['id'] }}).val(gst_in_amount);


                                                            var grand_total = (Number(total_calc_price) + Number(
                                                                gst_in_amount) + Number(additional_charge)) - Number(
                                                                discount_in_amount);
                                                            $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total);
                                                            var payable_amount = $('#payable_amount' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var balance = Number(grand_total) - Number(payable_amount);
                                                            $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance);


                                                            $('.dayextra' + {{ $bookingDatas['id'] }}).show();


                                                        });


                                                        $(document).on("keyup", '#gst_amount' + {{ $bookingDatas['id'] }}, function() {
                                                            var gstamount = $(this).val();
                                                            var total_calc_price = $('#total_calc_price' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var gst_in_percentage = (gstamount * 100) / total_calc_price;
                                                            $('#gst_percentage' + {{ $bookingDatas['id'] }}).val(
                                                                gst_in_percentage);

                                                            var additional_charge = $('#additional_charge' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var total_calc_price = $('#total_calc_price' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var discount_amount = $('#discount_amount' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }})
                                                        .val();

                                                            var grand_total = (Number(total_calc_price) + Number(gst_amount) +
                                                                Number(additional_charge)) - Number(discount_amount);
                                                            $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total);
                                                            var payable_amount = $('#payable_amount' +
                                                                {{ $bookingDatas['id'] }}).val();
                                                            var balance = Number(grand_total) - Number(payable_amount);
                                                            $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance);

                                                        });


                                                        $(document).on("keyup", '#gst_percentage' + {{ $bookingDatas['id'] }},
                                                            function() {
                                                                var gst_percentage = $(this).val();
                                                                var total_calc_price = $('#total_calc_price' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var gst_in_amount = (gst_percentage / 100) * total_calc_price;
                                                                $('#gst_amount' + {{ $bookingDatas['id'] }}).val(gst_in_amount);

                                                                var additional_charge = $('#additional_charge' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var total_calc_price = $('#total_calc_price' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var discount_amount = $('#discount_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }})
                                                            .val();

                                                                var grand_total = (Number(total_calc_price) + Number(gst_amount) +
                                                                    Number(additional_charge)) - Number(discount_amount);
                                                                $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total);
                                                                var payable_amount = $('#payable_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var balance = Number(grand_total) - Number(payable_amount);
                                                                $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance);

                                                            });



                                                        $(document).on("keyup", '#discount_amount' + {{ $bookingDatas['id'] }},
                                                            function() {
                                                                var discount_amount = $(this).val();
                                                                var total_calc_price = $('#total_calc_price' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var discount_in_percentage = (discount_amount * 100) /
                                                                    total_calc_price;
                                                                $('#discount_percentage' + {{ $bookingDatas['id'] }}).val(
                                                                    discount_in_percentage);

                                                                var additional_charge = $('#additional_charge' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var total_calc_price = $('#total_calc_price' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var discount_amount = $('#discount_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }})
                                                            .val();

                                                                var grand_total = (Number(total_calc_price) + Number(gst_amount) +
                                                                    Number(additional_charge)) - Number(discount_amount);
                                                                $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total);
                                                                var payable_amount = $('#payable_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var balance = Number(grand_total) - Number(payable_amount);
                                                                $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance);

                                                            });




                                                        $(document).on("keyup", '#discount_percentage' + {{ $bookingDatas['id'] }},
                                                            function() {
                                                                var discount_percentage = $(this).val();
                                                                var total_calc_price = $('#total_calc_price' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var discount_in_amount = (discount_percentage / 100) *
                                                                    total_calc_price;
                                                                $('#discount_amount' + {{ $bookingDatas['id'] }}).val(
                                                                    discount_in_amount);

                                                                var additional_charge = $('#additional_charge' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var total_calc_price = $('#total_calc_price' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var discount_amount = $('#discount_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }})
                                                            .val();

                                                                var grand_total = (Number(total_calc_price) + Number(gst_amount) +
                                                                    Number(additional_charge)) - Number(discount_amount);
                                                                $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total);
                                                                var payable_amount = $('#payable_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var balance = Number(grand_total) - Number(payable_amount);
                                                                $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance);

                                                            });




                                                        $(document).on("keyup", '#additional_charge' + {{ $bookingDatas['id'] }},
                                                            function() {
                                                                var additional_charge = $(this).val();
                                                                var total_calc_price = $('#total_calc_price' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var discount_amount = $('#discount_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }})
                                                            .val();

                                                                var grand_total = (Number(total_calc_price) + Number(gst_amount) +
                                                                    Number(additional_charge)) - Number(discount_amount);
                                                                $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total);

                                                                var payable_amount = $('#payable_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var balance = Number(grand_total) - Number(payable_amount);
                                                                $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance);


                                                            });


                                                        $(document).on("keyup", '#payable_amount' + {{ $bookingDatas['id'] }},
                                                            function() {
                                                                var payable_amount = $(this).val();

                                                                var additional_charge = $('#additional_charge' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var total_calc_price = $('#total_calc_price' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var discount_amount = $('#discount_amount' +
                                                                    {{ $bookingDatas['id'] }}).val();
                                                                var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }})
                                                            .val();

                                                                var grand_total = (Number(total_calc_price) + Number(gst_amount) +
                                                                    Number(additional_charge)) - Number(discount_amount);
                                                                $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total);
                                                                var balance = Number(grand_total) - Number(payable_amount);
                                                                $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance);
                                                            });



                                                    });
                                                });
                                            });
                                        </script>
                                        <style>
                                            .not-allowed {
                                                cursor: not-allowed;
                                            }
                                        </style>

                                        <tr>
                                            <td><input type="text" disabled class="form-control"
                                                    name="booking_rooms[]" id="booking_rooms"
                                                    value="{{ $room_lists['room'] }}" />
                                                <input type="hidden" class="form-control" name="room_auto_id[]"
                                                    id="room_auto_id" value="{{ $room_lists['id'] }}" />
                                                <input type="hidden" class="form-control" name="room_id[]"
                                                    id="room_id" value="{{ $room_lists['room_id'] }}" />
                                            </td>
                                            <td><input type="text"
                                                    class="form-control not-allowed booking_room_price{{ $bookingDatas['id'] }}{{ $room_lists['id'] }}"
                                                    style="background: #e77e7e;" name="booking_room_price[]"
                                                    id="booking_room_price{{ $bookingDatas['id'] }}"
                                                    value="{{ $room_lists['booking_room_price'] }}" /></td>
                                            <td><input type="text"
                                                    class="form-control not-allowed booking_room_cal_price{{ $bookingDatas['id'] }}"
                                                    name="booking_room_cal_price[]" style="background: #e77e7e;"
                                                    id="booking_room_cal_price{{ $bookingDatas['id'] }}{{ $room_lists['id'] }}"
                                                    value="{{ $room_lists['room_cal_price'] }}" /></td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Total </label>
                    <div class="col-sm-9">
                        <input type="text" disabled class="form-control not-allowed" style="background: #eee;"
                            name="total_calc_price" id="total_calc_price{{ $bookingDatas['id'] }}"
                            value="{{ $bookingDatas['total'] }}" />
                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">GST Amount </label>
                    <div class="col-sm-4">
                        <input type="text" disabled class="form-control gst_amount"
                            id="gst_amount{{ $bookingDatas['id'] }}" name="gst_amount"
                            placeholder="GST Amount - Enter here " value="{{ $bookingDatas['gst_amount'] }}">
                    </div>
                    <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">GST % </label>
                    <div class="col-sm-3">
                        <input type="text" disabled class="form-control gst_percentage"
                            id="gst_percentage{{ $bookingDatas['id'] }}" name="gst_percentage"
                            placeholder="Gst % - Enter here " value="{{ $bookingDatas['gst_per'] }}">
                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Discount Amount </label>
                    <div class="col-sm-4">
                        <input type="text" disabled class="form-control discount_amount"
                            id="discount_amount{{ $bookingDatas['id'] }}" name="discount_amount"
                            placeholder="GST Amount - Enter here " value="{{ $bookingDatas['disc_amount'] }}">
                    </div>
                    <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Discount % </label>
                    <div class="col-sm-3">
                        <input type="text" disabled class="form-control discount_percentage"
                            id="discount_percentage{{ $bookingDatas['id'] }}" name="discount_percentage"
                            placeholder="Discount % - Enter here " value="{{ $bookingDatas['disc_per'] }}">
                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Additional Charge </label>
                    <div class="col-sm-4">
                        <input type="text" disabled class="form-control additional_charge"
                            id="additional_charge{{ $bookingDatas['id'] }}" name="additional_charge"
                            placeholder="Additional Amount - Enter here "
                            value="{{ $bookingDatas['additional_amount'] }}">
                    </div>
                    <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Note </label>
                    <div class="col-sm-3">
                        <input type="text" disabled class="form-control additional_charge_notes"
                            id="additional_charge_notes{{ $bookingDatas['id'] }}" name="additional_charge_notes"
                            placeholder="Note - Enter here " value="{{ $bookingDatas['additional_notes'] }}">
                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Grand Total - To Pay
                    </label>
                    <div class="col-sm-9">
                        <input type="text" disabled class="form-control" name="grand_total"
                            id="grand_total{{ $bookingDatas['id'] }}"
                            value="{{ $bookingDatas['grand_total'] }}" />
                    </div>
                </div>
                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Paid Amount </label>
                    <div class="col-sm-9">
                        <input type="text" disabled class="form-control payable_amount"
                            style="background-color:#a1efb2;color: black;"
                            id="payable_amount{{ $bookingDatas['id'] }}" value="{{ $bookingDatas['total_paid'] }}"
                            name="payable_amount" placeholder="Enter here ">
                    </div>
                </div>

                <div class="row mb-4 dayextra{{ $bookingDatas['id'] }}" style="display:none">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Term </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="payment_term">
                            <option value="" selected class="text-muted">Select</option>
                            <option value="Term II" class="text-muted">Term II</option>
                            <option value="Term III" class="text-muted">Term III</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4 dayextra{{ $bookingDatas['id'] }}" style="display:none">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Payment Method </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="payment_method">
                            <option value="" selected class="text-muted">Select Payment Via</option>
                            <option value="Cash" class="text-muted">Cash</option>
                            <option value="Online Payment" class="text-muted">Online Payment</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4" hidden>
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Balance Amount </label>
                    <div class="col-sm-9">
                        <input type="number" disabled class="form-control balance_amount"
                            style="background: #e3e361;" id="balance_amount{{ $bookingDatas['id'] }}"
                            name="balance_amount" placeholder="Enter here "
                            value="{{ $bookingDatas['balance_amount'] }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Checkout</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,
                        Get Back</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(".checkoutclose").click(function() {
        window.location.reload();
    });
    $(".checkoutclosebutton").click(function() {
        window.location.reload();
    });
    //$(document).ready(function() {
    //var check_in_date = $("#checkindate").val();
    //var check_out_date = $("#checkoutdate").val();


    //  var checkin_date = new Date (check_in_date);
    //  console.log(checkin_date);
    //  var checkout_date = new Date (check_out_date);
    //  console.log(checkout_date);


    //calculate total number of seconds between two dates
    // var total_seconds = Math.abs(checkin_date - checkout_date) / 1000;


    //calculate days difference by dividing total seconds in a day
    //  var days_difference = Math.floor (total_seconds / (60 * 60 * 24));
    //console.log(days_difference);
    //   $('.no_of_days').val(days_difference);


    // Get Room Price
    //   var totalAmount = 0;
    //   $("input[name='booking_room_price[]']").each(function() {
    //alert($(this).val());
    //                      totalAmount = Number(totalAmount) + Number($(this).val());
    //                      console.log(totalAmount);
    //                     $('.booking_room_totprice').val(totalAmount);
    //                 });

    //var booking_room_totprice = $(".booking_room_totprice").val();

    //   var total_room_cost = booking_room_totprice * days_difference;
    //  $('.total_room_cost').val(total_room_cost);
    //});
</script>
