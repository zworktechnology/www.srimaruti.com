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
                                <div class="invoice-title" style="display: flex;">
                                    <div class="mb-4 col-2">
                                        <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="logo" height="100"
                                            class="logo-dark" />
                                        <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="logo" height="100"
                                            class="logo-light" />
                                    </div>
                                    <div class="col-10" style="text-align: center;">
                                        <h1 style="color: #ea5c0b">Sri Maruti Inn</h1>
                                        @if ($data->branch_id == 1)
                                        <p style="color: #1e2739; margin-bottom: 0rem;">No. 122, South Chitra Street, Near Second Entrance, Srirangam, Tiruchirappalli - 620006.</p>
                                        <p style="color: #1e2739">Ph: 0431-2435749 | 96594 64543 | 99447 37705</p>
                                        @elseif ($data->branch_id == 2)
                                        <p style="color: #1e2739; margin-bottom: 0rem;">No. 1, Sakthi Avenue, Koil Marriage Hall Opp, Samayapuram, Tiruchirappalli - 621112.</p>
                                        <p style="color: #1e2739">Ph: 0431-2670060 | 96594 64249 | 99447 37705</p>
                                        @else
                                        <p style="color: #1e2739; margin-bottom: 0rem;">No. 4, Mass Garden, Salem Main Road, Gunaseelam, Tiruchirappalli - 621204.</p>
                                        <p style="color: #1e2739">Ph: 0431-6275275 | 90253 43955 | 99447 37705</p>
                                        @endif
                                    </div>
                                </div>

                                <hr>

                                <div class="invoice-title" style="display: flex;">
                                    <div class="col-6" style="text-align: start;">
                                        
                                        <h4 class="font-size-16">Invoice : <span style="color: #acafb7;">{{ $data->booking_invoiceno }}</span></h4>
                                        
                                    </div>
                                    <div class="col-6" style="text-align: end;">
                                        <h4 class="float-end font-size-16">Date : <span style="color: #acafb7;">{{ $today }}</span></h4>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-4 col-4">
                                        <div class="text-muted">
                                            <h5 class="font-size-16 mb-3">Billed To:</h5>
                                            <h5 class="font-size-15 mb-2" style="color: #acafb7;">{{ $data->customer_name }}</h5>
                                            <p class="mb-1" style="color: #acafb7;">+91 {{ $data->whats_app_number }}</p>
                                            <p class="mb-1" style="color: #acafb7;">{{ $data->gst_number }}</p>
                                            <p class="mb-1" style="color: #acafb7;">{{ $data->email_id }}</p>
                                            <p style="color: #acafb7;">{{ $data->address }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-8" style="text-align: end;">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-16 mb-1">Days: <span
                                                        style="color: #acafb7; font-size: 0.9rem;">{{ $data->days }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">Check In Date & Time: <span
                                                        style="color: #acafb7; font-size: 0.9rem;">{{ date('D - d M Y', strtotime($data->check_in_date)) }}
                                                        {{ date('h:i A', strtotime($data->check_in_time)) }}</span></h5>
                                            </div>
                                            <div class="mt-4 mb-4">
                                                <h5 class="font-size-16 mb-1">Check Out Date & Time: <span
                                                        style="color: #acafb7; font-size: 0.9rem;">{{ date('D - d M Y', strtotime($data->check_out_date)) }}
                                                        {{ date('h:i A', strtotime($data->check_out_time)) }}</span></h5>
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
                                                    <th scope="row" colspan="2" class="border-0 text-end">Grand Total
                                                    </th>
                                                    <td class="border-0 text-end">
                                                        <h4 class="m-0">₹ {{ $data->grand_total }}</h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-print-none mt-4">
                                        <div class="float-end">
                                            <a href="javascript:window.print()"
                                                class="btn btn-primary w-md waves-effect waves-light"><i
                                                    class="fa fa-print"></i>&nbsp;&nbsp; Print</a>
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
