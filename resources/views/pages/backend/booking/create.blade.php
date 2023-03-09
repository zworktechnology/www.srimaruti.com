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
                                                <input type="number" class="form-control" name="phone_number" placeholder="Enter here ">
                                                <div class="form-check mt-2">
                                                    <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                                    <label class="form-check-label" for="formrow-customCheck">Same number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Whatsapp Number </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="whats_app_number" placeholder="Enter here ">
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
                                                <textarea type="text" class="form-control" name="email_id" placeholder="Enter here "></textarea>
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
                                                <input type="file" class="form-control" name="customer_photo">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Rooms</h4>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Branch </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="branch_id" required>
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
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="email_id" placeholder="Adult - Enter here ">
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="email_id" placeholder="Child - Enter here ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item class="row">
                                        <div class="inner-repeater mb-4">
                                            <div data-repeater-list="inner-group" class="inner form-group">
                                                <div data-repeater-item class="inner mb-3 row">
                                                    <div class="col-md-3 col-8">
                                                        <label for="horizontal-firstname-input" class="col-form-label">
                                                            Room Count Number - 01</label>
                                                    </div>
                                                    <div class="col-md-8 col-5">
                                                        <select class="form-control js-example-basic-single" name="branch_id" required>
                                                            <option value="" disabled selected hidden class="text-muted">
                                                                Select Room</option>
                                                            @foreach ($room as $rooms)
                                                            <option value="{{ $rooms->id }}">Room No. {{ $rooms->room_number }} - {{ $rooms->room_floor }} Floor - {{ $rooms->room_type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 col-4">
                                                        <div class="d-grid">
                                                            <input data-repeater-create type="button" class="btn btn-success inner" value="Add" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Book Now</button>
                                    <button type="submit" class="btn btn-primary">Book & Check In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
