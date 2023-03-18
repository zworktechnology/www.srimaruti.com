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
                            <form autocomplete="off" method="POST" action="{{ route('booking.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Customer Name </label>
                                            <div class="col-sm-9">
                                                <input type="name" class="form-control" name="booking_customer_name" placeholder="Enter here " value="{{ $data->customer_name }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Contact Number </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{ $data->phone_number }}" placeholder="Enter here ">
                                                <div class="form-check mt-2">
                                                    <input type="checkbox" class="form-check-input whatsapp_check" id="formrow-customCheck">
                                                    <label class="form-check-label" for="formrow-customCheck">Same number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Whatsapp Number </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control whats_app_number" value="{{ $data->whats_app_number }}" name="whats_app_number" placeholder="Enter here ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Email ID </label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email_id" placeholder="Enter here " value="{{ $data->email_id }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Address </label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="address" placeholder="Enter here ">{{ $data->address }}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Proof Details</h4>
                                        <hr>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Address Proof </label>
                                            <div class="col-sm-5">
                                                <p>{{ $data->proof_type }}</p>
                                            </div>
                                            <div class="col-sm-2">
                                                <a target="_blank" href="{{ asset('assets/customer_details/proof/' . $data->proof_image) }}">
                                                    <p>View Proof</p>
                                                </a>
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="{{ asset('assets/customer_details/proof/' . $data->proof_image) }}" download>
                                                    <p>Download Proof</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Photo </label>
                                            <div class="col-sm-5">
                                                <p>-----</p>
                                            </div>
                                            <div class="col-sm-2">
                                                <a target="_blank" href="{{ asset('assets/customer_details/profile/' . $data->customer_photo) }}">
                                                    <p>View Photo</p>
                                                </a>
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="{{ asset('assets/customer_details/profile/' . $data->customer_photo) }}" download>
                                                    <p>Download Photo</p>
                                                </a>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Rooms Details</h4>
                                        <hr>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Branch </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single branch_id" name="branch_id" id="branch_id" required>
                                                    <option value="" disabled selected hidden class="text-muted">
                                                        Select Branch</option>
                                                    @foreach ($branch as $branchs)
                                                    <option value="{{ $branchs->id }}" @if ($branchs->id === $data->branch_id) selected='selected' @endif>{{ $branchs->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                People </label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="adult_count" placeholder="Adult - Enter here " value="{{ $data->adult_count }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="child_count" placeholder="Child - Enter here " value="{{ $data->child_count }}">
                                            </div>
                                        </div>
                                        <div data-repeater-list="group-a">
                                            <div data-repeater-item class="row">
                                                <div class="inner-repeater mb-4">
                                                    <div data-repeater-list="inner-group" class="inner form-group">
                                                        <div data-repeater-item class="inner mb-3 row">
                                                            <div class="col-sm-3">
                                                                <label for="horizontal-firstname-input" class="col-form-label">
                                                                    Room Number</label>
                                                            </div>
                                                            <div class="dynamic_field col-sm-9">
                                                                <table class="table-fixed col-12 " id="">
                                                                    <tbody>
                                                                        @foreach ($BookingRooms as $index => $BookingRoomss)
                                                                        <tr>
                                                                            <td class="col-12 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider">
                                                                                <input type="hidden" id="room_auto_id" name="room_auto_id[]" value="{{ $BookingRoomss->id }}" />
                                                                                @foreach ($room as $rooms)
                                                                                @if ($rooms['id'] == $BookingRoomss['room_id'])
                                                                                <input type="text" class="form-control customer_booked_room" disabled name="customer_booked_room[]" placeholder="" value="Room No{{ $rooms->room_number }} - Floor {{ $rooms->room_floor }} - {{ $rooms->room_type }}">
                                                                                <input type="hidden" id="room_id" name="room_id[]" value="{{ $rooms->id }}" />
                                                                                @endif
                                                                                @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Timing & Days Details</h4>
                                        <hr>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Booking Date & Time</label>
                                            <div class="col-sm-5">
                                                <input type="date" class="form-control" name="booking_date" placeholder="Enter here " value="{{ $data->booking_date }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="time" class="form-control" name="booking_time" placeholder="Enter here " value="{{ $data->booking_time }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Check IN - Date & Time</label>
                                            <div class="col-sm-5">
                                                <input type="date" class="form-control" name="chick_in_date" placeholder="Enter here " value="{{ $data->chick_in_date }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="time" class="form-control" name="chick_in_time" placeholder="Enter here " value="{{ $data->chick_in_time }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Check Out - Date & Time</label>
                                            <div class="col-sm-5">
                                                <input type="date" class="form-control" name="chick_out_date" placeholder="Enter here " value="{{ $data->chick_out_date }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="time" class="form-control" name="chick_out_time" placeholder="Enter here " value="{{ $data->chick_out_time }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Days</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="chick_out_date" placeholder="Enter here ">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Pricing Calculation</h4>
                                        <hr>
                                        <div data-repeater-list="group-a">
                                            <div data-repeater-item class="row">
                                                <div class="inner-repeater mb-4">
                                                    <div data-repeater-list="inner-group" class="inner form-group">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="bookandcheckin" style="margin-right: 10px;">Save & Check Out</button>
                                    <button type="submit" class="btn btn-primary" name="bookandcheckin">Save, Check Out & Print Bill</button>
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
    $(document).ready(function() {

        $('.whatsapp_check').click(function() {
            if ($(this).is(':checked')) {
                var phone_number = $('#phone_number').val();
                $('.whats_app_number').val(phone_number);
            } else {
                $('.whats_app_number').val('');
            }
        });


        var phone_number = $('#phone_number').val();
        var whats_app_number = $('.whats_app_number').val();
        if (phone_number == whats_app_number) {
            $('.whatsapp_check').prop('checked', true);
        } else {
            $('.whatsapp_check').prop('checked', false);
        }



        var branch_id = $('#branch_id').val();
        $.ajax({
            url: '/getBranchwiseRoom/' + branch_id
            , type: 'get'
            , dataType: 'json'
            , success: function(response) {
                console.log(response['data']);
                var len = response['data'].length;
                $('.room_id').html('');

                var $select = $(".room_id").append(
                    $('<option>', {
                        value: '0'
                        , text: 'Select'
                    }));
                $(".room_id").append($select);

                for (var i = 0; i < len; i++) {

                    if (response['data'][i].booking_status != 1) {

                        $(".room_id").append($('<option>', {
                            value: response['data'][i].id
                            , text: 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type
                        , }));

                    }



                }
            }
        });




        $('#branch_id').on('change', function() {
            var branch_id = this.value;

            $.ajax({
                url: '/getBranchwiseRoom/' + branch_id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    console.log(response['data']);
                    var len = response['data'].length;
                    $('.room_id').html('');

                    var $select = $(".room_id").append(
                        $('<option>', {
                            value: '0'
                            , text: 'Select'
                        }));
                    $(".room_id").append($select);

                    for (var i = 0; i < len; i++) {

                        if (response['data'][i].booking_status != 1) {

                            $(".room_id").append($('<option>', {
                                value: response['data'][i].id
                                , text: 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type
                            , }));

                        }



                    }
                }
            });
        });


    });

    var i = 0;
    var j = 0;
    $(document).ready(function() {
        $("#addroomfields").click(function() {
            ++i;
            $("#roomfields").append(
                '<tr><td class="col-sm-3 px-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider"><input type="hidden" id="room_auto_id"name="room_auto_id[]" /><select class="form-control js-example-basic-single room_id" name="room_id[]" id="room_id' + i + '" required><option value="" selected hidden class="text-muted">Select Room</option></select></td><td class="col-sm-2"><button class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >Remove</button></td></tr>'
            );

            var branch_id = $('.branch_id').val();
            //alert('branch_id');
            $.ajax({
                url: '/getBranchwiseRoom/' + branch_id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    console.log(response['data']);
                    var len = response['data'].length;

                    //$('.room_id').html('');


                    var selectedValues = new Array();
                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            if (response['data'][i].booking_status != 1) {

                                var id = response['data'][i].id;
                                var name = 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type;
                                var option = "<option value='" + id + "'>" + name + "</option>";
                                selectedValues.push(option);

                            }


                        }
                    }

                    ++j;
                    $('#room_id' + j).append(selectedValues);


                }
            });
        });
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

</script>
@endsection
