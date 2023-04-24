@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">New Booking</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('booking.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <h4 class="card-title mb-4" style="color: #5b73e8">Profile</h4>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Customer Name <span style="color: red;">*</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="name" class="form-control booking_customer_name"
                                                        name="booking_customer_name" placeholder="Enter here " required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Contact Number <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control phone_number"
                                                        name="phone_number" id="phone_number" placeholder="Enter here "
                                                        required>
                                                    <div class="phonenumber_list" style="display:none"></div>
                                                    <div class="form-check mt-2">
                                                        <input type="checkbox" class="form-check-input whatsapp_check"
                                                            id="formrow-customCheck">
                                                        <label class="form-check-label" for="formrow-customCheck">Same as
                                                            Whatsapp number</label>
                                                    </div>
                                                </div>
                                                {{ csrf_field() }}
                                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                    Whatsapp <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control whats_app_number"
                                                        name="whats_app_number" placeholder="Enter here " required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Email ID </label>
                                                <div class="col-sm-4">
                                                    <input type="email" class="form-control email_id" name="email_id"
                                                        placeholder="Enter here ">
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                    Address </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control address" name="address"
                                                        placeholder="Enter here ">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    GST Number </label>
                                                <div class="col-sm-9">
                                                    <input type="name" class="form-control" name="gst_number"
                                                        placeholder="Enter here ">
                                                </div>
                                            </div>

                                            <hr>
                                            <h4 class="card-title mb-4" style="color: #5b73e8">Head Rooms</h4>

                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Count <span style="color: red;">*</span> </label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" name="male_count"
                                                        placeholder="Male Count - Enter here " required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" name="female_count"
                                                        placeholder="Female Count- Enter here " required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" name="child_count"
                                                        placeholder="Child Count - Enter here " required>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Check In Date <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control check_in_date"
                                                        name="check_in_date" placeholder="Enter here "
                                                        value="{{ $today }}" required>
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                    Time <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <input type="time" class="form-control" name="check_in_time"
                                                        placeholder="Enter here " value="{{ $timenow }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Check Out Date </label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control check_out_date"
                                                        name="check_out_date" placeholder="Enter here " value="">
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                    Time </label>
                                                <div class="col-sm-4">
                                                    <input type="time" class="form-control" name="check_out_time"
                                                        placeholder="Enter here " value="{{ $timenow }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Days <span style="color: red;">*</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control days" id="days"
                                                        name="days" placeholder="Enter here " required>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Branch <span style="color: red;">*</span> </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control js-example-basic-single branch_id"
                                                        name="branch_id" id="branch_id" required>
                                                        <option value="" disabled selected hidden
                                                            class="text-muted">
                                                            Select Branch</option>
                                                        @foreach ($branch as $branchs)
                                                            <option value="{{ $branchs->id }}">{{ $branchs->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="row">
                                                    <div class="inner-repeater mb-4">
                                                        <div data-repeater-list="inner-group" class="inner form-group">
                                                            <div data-repeater-item class="inner mb-3 row">
                                                                <div class="col-sm-3">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-form-label">
                                                                        Room Details <span style="color: red;">*</span>
                                                                    </label>
                                                                </div>
                                                                <div class="dynamic_field col-sm-9">
                                                                    <table class="table-fixed col-12 " id="">
                                                                        <tbody id="roomfields" class="responsive_cls">
                                                                            <tr>
                                                                                <td
                                                                                    class="col-12 col-md-3 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider">
                                                                                    <input type="hidden"
                                                                                        id="room_auto_id"
                                                                                        name="room_auto_id[]" />
                                                                                    <select class="form-control room_id"
                                                                                        name="room_id[]" id="room_id1"
                                                                                        required>
                                                                                        <option value="" selected
                                                                                            hidden class="text-muted">
                                                                                            Select Room</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="col-12 col-md-3"><input
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        name="room_type[]"
                                                                                        placeholder="Room type"
                                                                                        value="" required /></td>
                                                                                <td class="col-12 col-md-2"><input
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        id="room_price1"
                                                                                        name="room_price[]"
                                                                                        placeholder="Price Per Day"
                                                                                        value="" required /></td>
                                                                                <td class="col-12 col-md-2"><input
                                                                                        type="text"
                                                                                        class="form-control room_cal_price"
                                                                                        id="room_cal_price1"
                                                                                        name="room_cal_price[]"
                                                                                        placeholder="Price" value=""
                                                                                        required /></td>
                                                                                <td class="col-12 col-md-1"><button
                                                                                        style="width: 100px;"
                                                                                        class="py-2 mr-5 text-white font-medium rounded-lg text-sm  text-center btn btn-success"
                                                                                        type="button" id="addroomfields"
                                                                                        value="Add">Add</button>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row mb-4">
                                                <div class="col-sm-3">
                                                    <h4 class="card-title mb-4" style="color: #5b73e8">Proof</h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input id="default-radio-1" type="radio" checked value="1"
                                                        name="proofs"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="default-radio-1" class="ml-2"
                                                        style="font-weight:900">Single Proof</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input id="default-radio-1" type="radio" value="2"
                                                        name="proofs"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="default-radio-1" class="ml-2"
                                                        style="font-weight:900">Double Proof</label>
                                                </div>
                                            </div>


                                            <div id="singleproof">
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-3 col-form-label">
                                                        Proof 1 <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control js-example-basic-single"
                                                            name="prooftype_one" style="width: 100%;" required>
                                                            <option value="" disabled selected hidden
                                                                class="text-muted">Select Type</option>
                                                            <option value="Aadhaar Card" class="text-muted">Aadhaar Card
                                                            </option>
                                                            <option value="Pan Card" class="text-muted">Pan Card</option>
                                                            <option value="Voter ID" class="text-muted">Voter ID</option>
                                                            <option value="Driving Licence" class="text-muted">Driving
                                                                Licence</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="file" class="form-control" name="proofimage_one"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="doubleproof" style="display:none">
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-3 col-form-label">
                                                        Proof 2 </label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control js-example-basic-single"
                                                            name="prooftype_two" style="width: 100%;">
                                                            <option value="" disabled selected hidden
                                                                class="text-muted">Select Type</option>
                                                            <option value="Aadhaar Card" class="text-muted">Aadhaar Card
                                                            </option>
                                                            <option value="Pan Card" class="text-muted">Pan Card</option>
                                                            <option value="Voter ID" class="text-muted">Voter ID</option>
                                                            <option value="Driving Licence" class="text-muted">Driving
                                                                Licence</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="file" class="form-control" name="proofimage_two">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4" id="proof_photo">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    Photo <span style="color: red;">*</span> </label>
                                                <div class="col-sm-7">
                                                    <div style="display: flex; flex-wrap: wrap;">
                                                        <div id="my_camera"></div>
                                                        <div id="captured_image"
                                                            style="border:1px #584f72; background:#f6f6f6;">Your captured
                                                            image will appear here...</div>
                                                    </div>
                                                    <input style="margin-top: 10px; margin-left: 40px;" type=button
                                                        value="Take Snapshot" class="btn btn-success"
                                                        onClick="take_snapshot()" required>
                                                    <input type="hidden" name="customer_photo" class="image-tag">
                                                </div>
                                            </div>
                                            <hr>
                                            <h4 class="card-title mb-4" style="color: #5b73e8">Pricing Calculation</h4>

                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="row">
                                                    <div class="inner-repeater mb-4">
                                                        <div data-repeater-list="inner-group" class="inner form-group">
                                                            <div data-repeater-item class="inner mb-3 row">
                                                                <div class="col-md-3 col-12">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-form-label">
                                                                        Total - Room Price <span
                                                                            style="color: red;">*</span> </label>
                                                                </div>
                                                                <div class="col-md-9 col-12">
                                                                    <input type="text"
                                                                        class="form-control total_calc_price"
                                                                        style="background-color:#babcc5ad"
                                                                        name="total_calc_price" id="total_calc_price"
                                                                        placeholder="Enter here " required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">
                                                                    GST Amount <span style="color: red;">*</span> </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control gst_amount"
                                                                        name="gst_amount"
                                                                        placeholder="GST Amount - Enter here " required>
                                                                </div>
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-1 col-form-label">
                                                                    GST % <span style="color: red;">*</span> </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control gst_percentage"
                                                                        name="gst_percentage"
                                                                        placeholder="Gst % - Enter here " required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">
                                                                    Discount Amount <span style="color: red;">*</span>
                                                                </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control discount_amount"
                                                                        name="discount_amount"
                                                                        placeholder="Discount Amount - Enter here "
                                                                        required>
                                                                </div>
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-1 col-form-label">
                                                                    Dis % <span style="color: red;">*</span> </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control discount_percentage"
                                                                        name="discount_percentage"
                                                                        placeholder="Discount % - Enter here " required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4" hidden>
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">
                                                                    Additional Charge <span style="color: red;">*</span>
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control additional_charge"
                                                                        name="additional_charge" value="0"
                                                                        placeholder="Additional Amount - Enter here "
                                                                        required>
                                                                </div>
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-1 col-form-label">
                                                                    Note <span style="color: red;">*</span> </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control additional_charge_notes"
                                                                        name="additional_charge_notes"
                                                                        placeholder="Note - Enter here " required
                                                                        value="CC">
                                                                </div>
                                                            </div>
                                                            <div data-repeater-item class="inner mb-3 row">
                                                                <div class="col-md-3 col-12">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-form-label">
                                                                        Grand Total - To Pay <span
                                                                            style="color: red;">*</span> </label>
                                                                </div>
                                                                <div class="col-md-9 col-12">
                                                                    <input type="text" class="form-control grand_total"
                                                                        style="background-color:#babcc5ad"
                                                                        name="grand_total" placeholder="Enter here "
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div data-repeater-item class="inner mb-3 row" hidden>
                                                                <div class="col-md-3 col-12">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-form-label">
                                                                        Term <span style="color: red;">*</span> </label>
                                                                </div>
                                                                <div class="col-md-9 col-12">
                                                                    <select class="form-control" name="payment_term"
                                                                        required>
                                                                        <option value="" class="text-muted">Select
                                                                        </option>
                                                                        <option value="Term I" class="text-muted"
                                                                            selected>Term I</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div data-repeater-item class="inner mb-3 row">
                                                                <div class="col-md-3 col-12">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-form-label">
                                                                        Payable Amount <span style="color: red;">*</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-9 col-12">
                                                                    <input type="text"
                                                                        class="form-control payable_amount"
                                                                        name="payable_amount" placeholder="Enter here "
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div data-repeater-item class="inner mb-3 row">
                                                                <div class="col-md-3 col-12">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-form-label">
                                                                        Balance Amount <span style="color: red;">*</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-9 col-12">
                                                                    <input type="text"
                                                                        class="form-control balance_amount"
                                                                        style="background-color:#c7c21dad" value="0"
                                                                        name="balance_amount" placeholder="Enter here "
                                                                        required>
                                                                </div>
                                                            </div>


                                                            <div data-repeater-item class="inner mb-3 row">
                                                                <div class="col-md-3 col-12">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-form-label">
                                                                        Payment Method <span style="color: red;">*</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-9 col-12">
                                                                    <select class="form-control js-example-basic-single"
                                                                        name="payment_method" required>
                                                                        <option value="" selected hidden
                                                                            class="text-muted">Select Payment Via</option>
                                                                        <option value="Cash" class="text-muted">Cash
                                                                        </option>
                                                                        <option value="Online Payment" class="text-muted">
                                                                            Online Payment</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="checkin" value="checkin"
                                            style="margin-right: 10%;" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript">
        ;
        (function($, window, document, undefined) {
            $("#days").on("change", function() {
                var date = new Date($(".check_in_date").val()),
                    days = parseInt($("#days").val(), 10);

                if (!isNaN(date.getTime())) {
                    date.setDate(date.getDate() + days);

                    $(".check_out_date").val(date.toInputFormat());
                } else {
                    alert("Invalid Date");
                }
            });
            //From: http://stackoverflow.com/questions/3066586/get-string-in-yyyymmdd-format-from-js-date-object
            Date.prototype.toInputFormat = function() {
                var yyyy = this.getFullYear().toString();
                var mm = (this.getMonth() + 1).toString(); // getMonth() is zero-based
                var dd = this.getDate().toString();
                return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]); // padding
            };
        })(jQuery, this, document);

        // AJAX call for autocomplete
        $(document).ready(function() {
            $(".phone_number").keyup(function() {

                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('booking.autocomplete') }}",
                        data: {
                            query: query,
                            _token: _token
                        },

                        success: function(data) {
                            $('.phonenumber_list').fadeIn();
                            $('.phonenumber_list').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function() {
                $('#phone_number').val($(this).text());
                $('.phonenumber_list').fadeOut();
                $.ajax({
                    url: '/getoldCustomers/' + $(this).text(),
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response['data']);
                        var output = response['data'].length;
                        for (var i = 0; i < output; i++) {
                            //console.log(response[i].customer_name);
                            $('.booking_customer_name').val(response['data'][i].customer_name);
                            $('.whats_app_number').val(response['data'][i].whats_app_number);
                            $('.email_id').val(response['data'][i].email_id);
                            $('.address').val(response['data'][i].address);
                        }
                    }
                });
            });
        });

        $(document).ready(function() {

            $('.whatsapp_check').click(function() {
                if ($(this).is(':checked')) {
                    var phone_number = $('#phone_number').val();
                    $('.whats_app_number').val(phone_number);
                } else {
                    $('.whats_app_number').val('');
                }
            });

            $('#branch_id').on('change', function() {
                var branch_id = this.value;
                $.ajax({
                    url: '/getBranchwiseRoom/' + branch_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
                        var len = response['data'].length;
                        $('.room_id').html('');
                        $('.room_price').html('');
                        $('.room_cal_price').html('');

                        var $select = $(".room_id").append(
                            $('<option>', {
                                value: '0',
                                text: 'Select'
                            }));
                        $(".room_id").append($select);

                        for (var i = 0; i < len; i++) {

                            if (response['data'][i].booking_status != 1) {

                                $(".room_id").append($('<option>', {
                                    value: response['data'][i].id,
                                    text: 'Room No ' + response['data'][i]
                                        .room_number + ' - ' + response['data'][i]
                                        .room_floor + ' Floor',
                                }));

                            }
                        }
                    }
                });
            });

            // Room onchange function

            var k = 1;
            $('#room_id' + k).on('change', function() {
                //alert(this.value);
                var room_id_s = this.value;

                $.ajax({
                    url: '/getPriceforRooms/' + room_id_s,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {

                        $("#room_price1").val('');
                        var price = response['data'];

                        //$("#room_price1").val(price);

                        //var days = $(".days").val();
                        //var Amount = days * price;
                        //$("#room_cal_price1").val(Amount);

                        $(document).on("keyup", '#room_price1', function() {
                            var price1 = $(this).val();
                            //alert(price1);
                            var days = $(".days").val();
                            var Amount = days * price1;
                            $("#room_cal_price1").val(Amount);

                            var totalAmount = 0;
                            var days = $(".days").val();

                            $("input[name='room_cal_price[]']").each(function() {
                                //alert($(this).val());
                                totalAmount = Number(totalAmount) + Number($(
                                    this).val());
                                $('.total_calc_price').val(totalAmount);
                            });

                            var additional_charge = $(".additional_charge").val();
                            var total_calc_price = $(".total_calc_price").val();

                            var discount_percentage = $(".discount_percentage").val();
                            var discount_in_amount = (discount_percentage / 100) *
                                total_calc_price;
                            $('.discount_amount').val(discount_in_amount.toFixed(2));

                            var gst_percentage = $(".gst_percentage").val();
                            var gst_in_amount = (gst_percentage / 100) *
                                total_calc_price;
                            $('.gst_amount').val(gst_in_amount.toFixed(2));

                            var grand_total = (Number(total_calc_price) + Number(
                                    gst_in_amount) + Number(additional_charge)) -
                                Number(discount_in_amount);
                            $('.grand_total').val(grand_total.toFixed(2));
                            var payable_amount = $(".payable_amount").val();
                            var balance = Number(grand_total.toFixed(2)) - Number(
                                payable_amount);
                            $('.balance_amount').val(balance.toFixed(2));
                        });

                    }
                });
            });


            // Radion button onchange Function

            $("input[name$='proofs']").click(function() {
                var proofs_value = $(this).val();
                //alert(proofs_value);
                if (proofs_value == '1') {
                    $("#singleproof").show();
                    $("#doubleproof").hide();
                    $("#proof_photo").show();
                } else if (proofs_value == '2') {
                    $("#doubleproof").show();
                    $("#singleproof").show();
                    $("#proof_photo").show();
                }


                //var totalAmount = 0;
                //var days = $(".days").val();

                //$("input[name='room_cal_price[]']").each(function() {
                //alert($(this).val());
                //    totalAmount = Number(totalAmount) + Number($(this).val());
                //   $('.total_calc_price').val(totalAmount);
                //});
            });

        });


        // Add Another Room Script

        var i = 1;
        var j = 1;
        var l = 1;
        var h = 1;
        //var add_count = [];
        //console.log(add_count);


        $(document).ready(function() {
            $("#addroomfields").click(function() {
                ++i;
                $("#roomfields").append(
                    '<tr><td class="col-12 col-md-3 pr-2 py-1 text-left text-xs font-medium text-black-700 tracking-wider"><input type="hidden" id="room_auto_id" name="room_auto_id[]" /><select class="form-control js-example-basic-single room_id" name="room_id[]" id="room_id' + i + '" required><option value="" selected hidden class="text-muted">Select Room</option></select></td><td class="col-12 col-md-3" style="margin-left: 3px;"><input type="text" class="form-control" name="room_type[]" placeholder="Room type" value=""/></td><td class="col-12 col-md-2" style="margin-left: 3px;"><input type="text" class="form-control" id="room_price' + i + '" name="room_price[]" placeholder="Price Per Day" value="" required/></td><td class="col-12 col-md-2" style="margin-left: 3px;"><input type="text" class="form-control room_cal_price" id="room_cal_price' + i + '" name="room_cal_price[]" placeholder="Price" value="" required/></td><td class="col-12 col-md-1" style="margin-left: 4px;"><button style="width: 100px;" class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >Remove</button></td></tr>'
                );

                var branch_id = $('.branch_id').val();
                //alert('branch_id');
                $.ajax({
                    url: '/getBranchwiseRoom/' + branch_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
                        var len = response['data'].length;


                        var selectedValues = new Array();


                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                if (response['data'][i].booking_status != 1) {

                                    var id = response['data'][i].id;
                                    var name = 'Room No ' + response['data'][i].room_number +
                                        ' - ' + response['data'][i].room_floor + ' Floor - ' +
                                        response['data'][i].room_type;
                                    var option = "<option value='" + id + "'>" + name +
                                        "</option>";

                                    var price = response['data'][i].price_per_day;
                                    selectedValues.push(option);
                                }

                            }
                        }


                        ++j;
                        $('#room_id' + j).append(selectedValues);

                        //add_count.push(Object.keys(selectedValues).length);

                    }
                });



                // Room Onchange Function
                ++l;
                ++h;
                $('#room_id' + l).on('change', function() {

                    //alert(l);
                    var room_id_s = this.value;

                    $.ajax({
                        url: '/getPriceforRooms/' + room_id_s,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {

                            $('#room_price' + h).val('');
                            var price = response['data'];

                            //$('#room_price' + h).val(price);

                            //var days = $(".days").val();
                            //var Amount = days * price;
                            //$('#room_cal_price' + h).val(Amount);


                            $(document).on("keyup", '#room_price' + h, function() {
                                var price = $(this).val();
                                //alert(price);
                                var days = $(".days").val();
                                var Amount = days * price;
                                $('#room_cal_price' + h).val(Amount);

                                var totalAmount = 0;
                                var days = $(".days").val();

                                $("input[name='room_cal_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        totalAmount = Number(totalAmount) +
                                            Number($(this).val());
                                        $('.total_calc_price').val(
                                            totalAmount);
                                    });

                                var additional_charge = $(".additional_charge")
                                    .val();
                                var total_calc_price = $(".total_calc_price")
                                    .val();

                                var discount_percentage = $(
                                    ".discount_percentage").val();
                                var discount_in_amount = (discount_percentage /
                                    100) * total_calc_price;
                                $('.discount_amount').val(discount_in_amount
                                    .toFixed(2));

                                var gst_percentage = $(".gst_percentage").val();
                                var gst_in_amount = (gst_percentage / 100) *
                                    total_calc_price;
                                $('.gst_amount').val(gst_in_amount.toFixed(2));

                                var grand_total = (Number(total_calc_price) +
                                    Number(gst_in_amount) + Number(
                                        additional_charge)) - Number(
                                    discount_in_amount);
                                $('.grand_total').val(grand_total.toFixed(2));
                                var payable_amount = $(".payable_amount").val();
                                var balance = Number(grand_total.toFixed(2)) -
                                    Number(payable_amount);
                                $('.balance_amount').val(balance.toFixed(2));


                            });




                        }
                    });
                });




            });


        });




        $(document).on("keyup", 'input.days', function() {
            var days = $(this).val();

            for (var i = 0; i < 100; i++) {
                var room_price = $('#room_price' + i).val();

                var total = room_price * days;
                console.log(total);
                $('#room_cal_price' + i).val(total);
            }

            var totalAmount = 0;
            $("input[name='room_cal_price[]']").each(function() {
                //alert($(this).val());
                totalAmount = Number(totalAmount) + Number($(this).val());
                $('.total_calc_price').val(totalAmount);
            });

            var additional_charge = $(".additional_charge").val();
            var total_calc_price = $(".total_calc_price").val();

            var discount_percentage = $(".discount_percentage").val();
            var discount_in_amount = (discount_percentage / 100) * total_calc_price;
            $('.discount_amount').val(discount_in_amount.toFixed(2));

            var gst_percentage = $(".gst_percentage").val();
            var gst_in_amount = (gst_percentage / 100) * total_calc_price;
            $('.gst_amount').val(gst_in_amount.toFixed(2));

            var grand_total = (Number(total_calc_price) + Number(gst_in_amount) + Number(additional_charge)) -
                Number(discount_in_amount);
            $('.grand_total').val(grand_total.toFixed(2));
            var payable_amount = $(".payable_amount").val();
            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
            $('.balance_amount').val(balance.toFixed(2));
        });






        // GST Calculation
        $(document).on("keyup", 'input.gst_amount', function() {
            var gstamount = $(this).val();
            var total_calc_price = $(".total_calc_price").val();
            var gst_in_percentage = (gstamount * 100) / total_calc_price;
            $('.gst_percentage').val(gst_in_percentage.toFixed(2));

            var additional_charge = $(".additional_charge").val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_amount = $(".discount_amount").val();
            var gst_amount = $(".gst_amount").val();

            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(
                discount_amount);
            $('.grand_total').val(grand_total.toFixed(2));
            var payable_amount = $(".payable_amount").val();
            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
            $('.balance_amount').val(balance.toFixed(2));

        });

        $(document).on("keyup", 'input.gst_percentage', function() {
            var gst_percentage = $(this).val();
            var total_calc_price = $(".total_calc_price").val();
            var gst_in_amount = (gst_percentage / 100) * total_calc_price;
            $('.gst_amount').val(gst_in_amount.toFixed(2));

            var additional_charge = $(".additional_charge").val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_amount = $(".discount_amount").val();
            var gst_amount = $(".gst_amount").val();

            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(
                discount_amount);
            $('.grand_total').val(grand_total.toFixed(2));
            var payable_amount = $(".payable_amount").val();
            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
            $('.balance_amount').val(balance.toFixed(2));

        });


        //Discount Calculation

        $(document).on("keyup", 'input.discount_amount', function() {
            var discount_amount = $(this).val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_in_percentage = (discount_amount * 100) / total_calc_price;
            $('.discount_percentage').val(discount_in_percentage.toFixed(2));

            var additional_charge = $(".additional_charge").val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_amount = $(".discount_amount").val();
            var gst_amount = $(".gst_amount").val();

            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(
                discount_amount);
            $('.grand_total').val(grand_total.toFixed(2));
            var payable_amount = $(".payable_amount").val();
            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
            $('.balance_amount').val(balance.toFixed(2));

        });


        $(document).on("keyup", 'input.discount_percentage', function() {
            var discount_percentage = $(this).val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_in_amount = (discount_percentage / 100) * total_calc_price;
            $('.discount_amount').val(discount_in_amount.toFixed(2));

            var additional_charge = $(".additional_charge").val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_amount = $(".discount_amount").val();
            var gst_amount = $(".gst_amount").val();

            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(
                discount_amount);
            $('.grand_total').val(grand_total.toFixed(2));
            var payable_amount = $(".payable_amount").val();
            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
            $('.balance_amount').val(balance.toFixed(2));

        });


        // Grand Total Calculation

        $(document).on("keyup", 'input.additional_charge', function() {
            var additional_charge = $(this).val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_amount = $(".discount_amount").val();
            var gst_amount = $(".gst_amount").val();

            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(
                discount_amount);
            $('.grand_total').val(grand_total.toFixed(2));

            var payable_amount = $(".payable_amount").val();
            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
            $('.balance_amount').val(balance.toFixed(2));


        });



        $(document).on("keyup", 'input.payable_amount', function() {
            var payable_amount = $(this).val();

            var additional_charge = $(".additional_charge").val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_amount = $(".discount_amount").val();
            var gst_amount = $(".gst_amount").val();

            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(
                discount_amount);
            $('.grand_total').val(grand_total.toFixed(2));
            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
            $('.balance_amount').val(balance.toFixed(2));
        });





        // Web Camera Script

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();


            var totalAmount = 0;
            var days = $(".days").val();

            $("input[name='room_cal_price[]']").each(function() {
                //alert($(this).val());
                totalAmount = Number(totalAmount) + Number($(this).val());
                $('.total_calc_price').val(totalAmount);
            });



            var additional_charge = $(".additional_charge").val();
            var total_calc_price = $(".total_calc_price").val();
            var discount_amount = $(".discount_amount").val();
            var gst_amount = $(".gst_amount").val();

            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(
                discount_amount);
            $('.grand_total').val(grand_total.toFixed(2));
            var payable_amount = $(".payable_amount").val();
            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
            $('.balance_amount').val(balance.toFixed(2));

        });

        Webcam.set({
            width: 350,
            height: 200,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('captured_image').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
@endsection
