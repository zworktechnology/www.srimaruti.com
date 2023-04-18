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
                                        <img src="{{ asset('assets/frontend/image/logo.png') }}" alt="logo"
                                            height="100" class="logo-dark" />
                                        <img src="{{ asset('assets/frontend/image/logo.png') }}" alt="logo"
                                            height="100" class="logo-light" />
                                    </div>
                                    <div class="col-10" style="text-align: center;">
                                        <h1 style="color: #ea5c0b; font-family: 'Cinzel Decorative', cursive; font-weight: bold;">Sri Maruti Inn</h1>
                                        @if ($data->branch_id == 1)
                                            <p style="color: #1e2739; margin-bottom: 0rem;">No. 122, South Chitra Street,
                                                Near Second Entrance, Srirangam, Tiruchirappalli - 620006.</p>
                                            <p style="color: #1e2739">Ph: 0431-2435749 | Cell: 96594 64543 | GSTIN:
                                                33AEFPR0922K1ZK</p>
                                        @elseif ($data->branch_id == 2)
                                            <p style="color: #1e2739; margin-bottom: 0rem;">No. 1, Sakthi Avenue, Koil
                                                Marriage Hall Opp, Samayapuram, Tiruchirappalli - 621112.</p>
                                            <p style="color: #1e2739">Ph: 0431-2670060 | Cell: 96594 64249 | GSTIN:
                                                33AEFPR0922K1ZK</p>
                                        @else
                                            <p style="color: #1e2739; margin-bottom: 0rem;">No. 4, Mass Garden, Salem Main
                                                Road, Gunaseelam, Tiruchirappalli - 621204.</p>
                                            <p style="color: #1e2739">Ph: 0431-6275275 | Cell: 90253 43955 | GSTIN:
                                                33AEFPR0922K1ZK</p>
                                        @endif
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    Mr / Ms : <span
                                                        style="color: #acafb7;">{{ $data->customer_name }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    GSTIN : <span style="color: #acafb7;">{{ $data->gst_number }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">Check In Date : <span
                                                        style="color: #acafb7; font-size: 0.9rem;">{{ date('d M Y', strtotime($data->check_in_date)) }}</span>  Time
                                                    : <span style="color: #acafb7; font-size: 0.9rem;">
                                                        {{ date('h:i A', strtotime($data->check_in_time)) }}</span></h5>
                                            </div>
                                            <div class="mt-4 mb-4">
                                                <h5 class="font-size-16 mb-1">Check Out Date : <span
                                                        style="color: #acafb7; font-size: 0.9rem;">{{ date('d M Y', strtotime($data->check_out_date)) }}</span>  Time
                                                        : <span style="color: #acafb7; font-size: 0.9rem;">
                                                            {{ date('h:i A', strtotime($data->check_out_time)) }}</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-4" style="text-align: end;">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    Bill No : <span
                                                        style="color: #acafb7;">{{ $data->booking_invoiceno }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    Date : <span style="color: #acafb7;">{{ date('d M Y', strtotime($today)) }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    No of Persons : <span
                                                        style="color: #acafb7;">{{ $data->male_count + $data->female_count + $data->child_count }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-2">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Particulars</th>
                                                    <th class="text-end">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($room_list as $index => $room_lists)
                                                    <tr>
                                                        <td scope="row">{{ $room_lists['room'] }}</td>
                                                        <td class="text-end">₹ {{ $room_lists['room_cal_price'] }}</td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <th scope="row" colspan="1" class="text-end">Amount</th>
                                                    <td class="text-end">₹ {{ $data->total }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="1" class="border-0 text-end">
                                                        SGST :</th>
                                                    <td class="border-0 text-end">₹ {{ $data->gst_amount / 2 }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="1" class="border-0 text-end">
                                                        CGST :</th>
                                                    <td class="border-0 text-end">₹ {{ $data->gst_amount / 2 }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="1" class="border-0 text-end">
                                                        Discount :</th>
                                                    <td class="border-0 text-end">- ₹ {{ $data->disc_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="1" class="border-0 text-end">Grand
                                                        Total
                                                    </th>
                                                    <td class="border-0 text-end">
                                                        <h4 class="m-0">₹ {{ $data->grand_total }}</h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>

                                    <div class="row" style="display: flex;">
                                        <div class="col-sm-6 col-6">
                                            <br><br>
                                            <h6 class="m-0">Guest Signature</h6>
                                        </div>
                                        <div class="col-sm-6 col-6" style="text-align: end;">
                                            <br><br>
                                            <h6 class="m-0">For Sri Maruti Inn</h6>
                                        </div>
                                    </div>

                                    <hr>


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
