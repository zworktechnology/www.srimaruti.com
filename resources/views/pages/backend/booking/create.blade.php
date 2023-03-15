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
                            <form autocomplete="off" method="POST" action="{{ route('booking.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Customer Name </label>
                                            <div class="col-sm-9">
                                                <input type="name" class="form-control" name="booking_customer_name" placeholder="Enter here ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Contact Number </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Enter here ">
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
                                                <input type="number" class="form-control whats_app_number" name="whats_app_number" placeholder="Enter here ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Email ID </label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email_id" placeholder="Enter here ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Address </label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="address" placeholder="Enter here "></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Proof</h4>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Proof Type </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="proof_type" required>
                                                    <option value="" disabled selected hidden class="text-muted">Select Type</option>
                                                    <option value="Aadhaar Card" class="text-muted">Aadhaar Card</option>
                                                    <option value="Pan Card" class="text-muted">Pan Card</option>
                                                    <option value="Voter ID" class="text-muted">Voter ID</option>
                                                    <option value="Driving Licence" class="text-muted">Driving Licence</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Proof Document </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="proof_image">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Photo </label>
                                            <div class="col-sm-9">
                                                <div style="display: flex;">
                                                    <div id="my_camera"></div>
                                                    <div id="captured_image" style="border:1px #584f72; background:#f6f6f6;">Your captured image will appear here...</div>
                                                </div>
                                                <input style="margin-top: 10px; margin-left: 40px;" type=button value="Take Snapshot" class="btn btn-success" onClick="take_snapshot()">
                                                <input type="hidden" name="customer_photo" class="image-tag">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Rooms</h4>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Branch </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single branch_id" name="branch_id" id="branch_id" required>
                                                    <option value="" disabled selected hidden class="text-muted">
                                                        Select Branch</option>
                                                    @foreach ($branch as $branchs)
                                                    <option value="{{ $branchs->id }}">{{ $branchs->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                People </label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="adult_count" placeholder="Adult - Enter here ">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="child_count" placeholder="Child - Enter here ">
                                            </div>
                                        </div>
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
                                                            <tbody id="roomfields">
                                                                <tr>
                                                                    <td class="col-9 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider">
                                                                        <input type="hidden" id="room_auto_id" name="room_auto_id[]" />
                                                                        <select class="form-control room_id" name="room_id[]" id="" required>
                                                                            <option value="" disabled selected hidden class="text-muted">
                                                                                Select Room</option>
                                                                        </select></td>
                                                                    <td class="col-2"><button class="text-white font-medium rounded-lg text-sm  text-center btn btn-success" type="button" id="addfloorfields" value="Add">Add Another Room</button>
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
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" style="margin-right: 10px;" name="booknow" value="Book Now">
                                    <input type="submit" class="btn btn-primary" name="bookandcheckin" value="Book & Check IN" />
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
                        $(".room_id").append($('<option>', {
                            value: response['data'][i].id
                            , text: 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type
                        , }));
                    }
                }
            });
        });
    });

    var i = 0;
    $(document).ready(function() {
        $("#addfloorfields").click(function() {
            ++i;
            $("#roomfields").append(
                '<tr><td class="col-sm-3 px-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider"><input type="hidden" id="room_auto_id"name="room_auto_id[]" /><select class="form-control js-example-basic-single room_id" name="room_id[]" id="" required><option value="" disabled selected hidden class="text-muted">Select Room</option></select></td><td class="col-sm-2"><button class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >Remove</button></td></tr>'
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

                    $('.room_id').html('');

                    var $select = $(".room_id").append(
                        $('<option>', {
                            value: '0'
                            , text: 'Select'
                        }));
                    $(".room_id").append($select);
                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type;
                            var option = "<option value='" + id + "'>" + name + "</option>";
                            $(".room_id").append(option);
                        }
                    }
                }
            });
        });
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

    Webcam.set({
        width: 350
        , height: 200
        , image_format: 'jpeg'
        , jpeg_quality: 90
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
