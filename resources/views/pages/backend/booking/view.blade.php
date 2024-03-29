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
                                <ol>
                                    <a href="javascript:window.print()"
                                                    class="btn btn-primary w-md waves-effect waves-light officecopy"><i
                                                        class="fa fa-print"></i>&nbsp;&nbsp; Print Copy</a>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12" style="display: flex; margin-top: 20px;">
                        <div class="col-lg-6">
                            <div class="card" style="-webkit-box-shadow: none; box-shadow: none; margin-right: 10px;">
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
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        Mr / Ms : <span
                                                            style="color: #acafb7;">{{ $data->customer_name }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        GSTIN : <span style="color: #acafb7;">{{ $data->gst_number }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">Check In Date : <span
                                                            style="color: #acafb7; font-size: 0.9rem;">{{ date('d M Y', strtotime($data->check_in_date)) }}</span>  Time
                                                        : <span style="color: #acafb7; font-size: 0.9rem;">
                                                            {{ date('h:i A', strtotime($data->check_in_time)) }}</span></h5>
                                                </div>
                                                <div class="mt-4 mb-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">Check Out Date : <span
                                                            style="color: #acafb7; font-size: 0.9rem;">{{ date('d M Y', strtotime($data->check_out_date)) }}</span>  Time
                                                            : <span style="color: #acafb7; font-size: 0.9rem;">
                                                                {{ date('h:i A', strtotime($data->check_out_time)) }}</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4" style="text-align: end;">
                                            <div class="text-muted text-sm-end">
                                                <div>
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        Bill No : <span
                                                            style="color: #acafb7;">{{ $data->booking_invoiceno }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        Date : <span style="color: #acafb7;">{{ date('d M Y', strtotime($data->created_at)) }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        No of Persons : <span
                                                            style="color: #acafb7;">{{ $data->male_count + $data->female_count + $data->child_count }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        Copy : <span
                                                            style="color: #ea5c0b;">Customer  Copy</span>
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
                                                    <tr hidden>
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
                                                <br><br><br>
                                                <h6 class="m-0">Guest Signature</h6>
                                            </div>
                                            <div class="col-sm-6 col-6" style="text-align: end;">
                                                <br><br><br>
                                                <h6 class="m-0">For <span style="font-family: 'Cinzel Decorative', cursive; font-weight: bold;">Sri Maruti Inn</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "vertical"></div>
                        <div class="col-lg-6">
                            <div class="card" style="-webkit-box-shadow: none; box-shadow: none; margin-left: 10px;">
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
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        Mr / Ms : <span
                                                            style="color: #acafb7;">{{ $data->customer_name }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        GSTIN : <span style="color: #acafb7;">{{ $data->gst_number }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">Check In Date : <span
                                                            style="color: #acafb7; font-size: 0.9rem;">{{ date('d M Y', strtotime($data->check_in_date)) }}</span>  Time
                                                        : <span style="color: #acafb7; font-size: 0.9rem;">
                                                            {{ date('h:i A', strtotime($data->check_in_time)) }}</span></h5>
                                                </div>
                                                <div class="mt-4 mb-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">Check Out Date : <span
                                                            style="color: #acafb7; font-size: 0.9rem;">{{ date('d M Y', strtotime($data->check_out_date)) }}</span>  Time
                                                            : <span style="color: #acafb7; font-size: 0.9rem;">
                                                                {{ date('h:i A', strtotime($data->check_out_time)) }}</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4" style="text-align: end;">
                                            <div class="text-muted text-sm-end">
                                                <div>
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        Bill No : <span
                                                            style="color: #acafb7;">{{ $data->booking_invoiceno }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        Date : <span style="color: #acafb7;">{{ date('d M Y', strtotime($data->created_at)) }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        No of Persons : <span
                                                            style="color: #acafb7;">{{ $data->male_count + $data->female_count + $data->child_count }}</span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-12" style="margin-bottom: -15px;">
                                                        Copy : <span
                                                            style="color: #ea5c0b;">Office  Copy</span>
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
                                                    <tr hidden>
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
                                                <br><br><br>
                                                <h6 class="m-0">Guest Signature</h6>
                                            </div>
                                            <div class="col-sm-6 col-6" style="text-align: end;">
                                                <br><br><br>
                                                <h6 class="m-0">For <span style="font-family: 'Cinzel Decorative', cursive; font-weight: bold;">Sri Maruti Inn</span></h6>
                                            </div>
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

        <script>
            $(document).on('click', '.officecopy', function() {
                $(".office_copy").show();
                $(".customer_copy").hide();
            });
            $(document).on('click', '.customercopy', function() {
                $(".customer_copy").show();
                $(".office_copy").hide();
            });
        </script>
    @endsection
