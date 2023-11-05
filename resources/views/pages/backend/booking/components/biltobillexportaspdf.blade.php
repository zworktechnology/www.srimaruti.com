@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Bill To Bill Export as PDF</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('booking.billtobill_printexportpdf') }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                {{ __('messages.from_billno') }} <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <select class="form-control from_billno"
                                                        name="from_billno" id="from_billno" required>
                                                        <option value="" selected hiddden>Select One</option>
                                                        @foreach ($Booking as $Bookings)
                                                            <option value="{{ $Bookings->id }}">{{ $Bookings->booking_invoiceno }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                {{ __('messages.to_billno') }} <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <select class="form-control to_billno"
                                                        name="to_billno" id="to_billno" required>
                                                        <option value="" selected hiddden>Select One</option>
                                                        @foreach ($Booking as $Bookingss)
                                                            <option value="{{ $Bookingss->id }}">{{ $Bookingss->booking_invoiceno }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Search</button>
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
