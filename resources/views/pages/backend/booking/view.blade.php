@extends('layouts.auth')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Invoice Detail</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Booking</a></li>
                                    <li class="breadcrumb-item active">Invoice Detail</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="-webkit-box-shadow: none; box-shadow: none;">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <h4 class="float-end font-size-16">Invoice #SMI{{ $data->id }}</h4>
                                    <div class="mb-4">
                                        <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="logo" height="70"
                                            class="logo-dark" />
                                        <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="logo" height="70"
                                            class="logo-light" />
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-muted">
                                            <h5 class="font-size-16 mb-3">Billed To:</h5>
                                            <h5 class="font-size-15 mb-2">{{ $data->customer_name }}</h5>
                                            <p class="mb-1">{{ $data->address }}</p>
                                            <p class="mb-1">{{ $data->email_id }}</p>
                                            <p>+91 {{ $data->whats_app_number }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-6">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-16 mb-1">Days: <span style="color: #acafb7; font-size: 0.9rem;">{{ $data->days }}</span></h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">Check In  Date & Time: <span style="color: #acafb7; font-size: 0.9rem;">{{ date('D - d M Y', strtotime($data->check_in_date)) }} {{ date('h:i A', strtotime($data->check_in_time)) }}</span></h5>
                                            </div>
                                            <div class="mt-4 mb-4">
                                                <h5 class="font-size-16 mb-1">Check Out Date & Time: <span style="color: #acafb7; font-size: 0.9rem;">{{ date('D - d M Y', strtotime($data->check_out_date)) }} {{ date('h:i A', strtotime($data->check_out_time)) }}</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="py-2">
                                    <h5 class="font-size-15">Booking summary</h5>

                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Room Details</th>
                                                    <th>Room Cost Per Date</th>
                                                    <th class="text-end" style="width: 120px;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($room_list as $index => $room_lists)
                                                <tr>
                                                    <th scope="row">{{ $room_lists['room'] }}</th>
                                                    <td>₹ {{ $room_lists['room_price'] }}</td>
                                                    <td class="text-end">₹ {{ $room_lists['room_cal_price'] }}</td>
                                                </tr>
                                                @endforeach


                                                <tr>
                                                    <th scope="row" colspan="2" class="text-end">Sub Total</th>
                                                    <td class="text-end">₹ {{ $data->total }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" class="border-0 text-end">
                                                        GST Tax - {{ $data->gst_per }} %:</th>
                                                    <td class="border-0 text-end">₹ {{ $data->gst_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" class="border-0 text-end">
                                                        Discount - {{ $data->disc_per }} %:</th>
                                                    <td class="border-0 text-end">- ₹ {{ $data->disc_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" class="border-0 text-end">
                                                        Extra Charge :</th>
                                                    <td class="border-0 text-end">₹ {{ $data->additional_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" class="border-0 text-end">Grand Total</th>
                                                    <td class="border-0 text-end">
                                                        <h4 class="m-0">₹ {{ $data->grand_total }}</h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-print-none mt-4">
                                        <div class="float-end">
                                            <a href="javascript:window.print()" class="btn btn-primary w-md waves-effect waves-light"><i class="fa fa-print"></i>&nbsp;&nbsp; Print</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
    @endsection
