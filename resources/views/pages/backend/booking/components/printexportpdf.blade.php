@extends('layouts.auth')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">PDF Detail</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="-webkit-box-shadow: none; box-shadow: none;">
                            <div class="card-body">
                                <hr>
                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    Manager : <span style="color: #acafb7;">{{ $manager->name }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    Branch : <span style="color: #acafb7;">{{ $branch->name }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-4" style="text-align: end;">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    From Date : <span
                                                        style="color: #acafb7;">{{ date('d M, Y', strtotime($from_date)) }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    To Date : <span
                                                        style="color: #acafb7;">{{ date('d M, Y', strtotime($to_date)) }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <br />
                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Check In Room Deatails
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
                                                    <th>Booking ID</th>
                                                    <th>Date</th>
                                                    <th>Room Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($checkin_Array as $keydata => $checkin_Arrays)
                                                    <tr>
                                                        <td>{{ $checkin_Arrays['booking_invoiceno'] }}</td>
                                                        <td>{{ date('d M,Y', strtotime($checkin_Arrays['check_in_date'])) }}
                                                        </td>
                                                        <td>
                                                            @foreach ($checkin_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $checkin_Arrays['id'])
                                                                    {{ $room_lists['roomno'] }} -
                                                                    {{ $room_lists['roomtype'] }},
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                </div>

                                <br />
                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Check Out Room Deatails
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
                                                    <th>Booking ID</th>
                                                    <th>Date</th>
                                                    <th>Room Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($checkout_Array as $keydata => $checkout_Arrays)
                                                    <tr>
                                                        <td>{{ $checkout_Arrays['booking_invoiceno'] }}</td>
                                                        <td>{{ date('d M,Y', strtotime($checkout_Arrays['check_out_date'])) }}
                                                        </td>
                                                        <td>
                                                            @foreach ($checkout_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $checkout_Arrays['id'])
                                                                    {{ $room_lists['roomno'] }} -
                                                                    {{ $room_lists['roomtype'] }},
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <br />
                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Income
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
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($income as $keydata => $incomes)
                                                    <tr>
                                                        <td>{{ date('d M,Y', strtotime($incomes->date)) }}</td>
                                                        <td>{{ $incomes->amount }}</td>
                                                        <td>{{ $incomes->namelist->name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <br />
                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Expence
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
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($expence as $keydata => $expences)
                                                    <tr>
                                                        <td>{{ date('d M,Y', strtotime($expences->date)) }}</td>
                                                        <td>{{ $expences->amount }}</td>
                                                        <td>{{ $expences->namelist->name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-6 col-6">
                                        <br><br><br>
                                        <h6 class="m-0">Manager Signature</h6>
                                    </div>
                                    <div class="col-sm-6 col-6" style="text-align: end;">
                                        <br><br><br>
                                        <h6 class="m-0">For <span
                                                style="font-family: 'Cinzel Decorative', cursive; font-weight: bold;">Sri
                                                Maruti Inn</span></h6>
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
