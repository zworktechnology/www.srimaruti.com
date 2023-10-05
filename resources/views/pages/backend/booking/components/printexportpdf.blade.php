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

                                <br><br>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Room Deatails
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
                                                    <th>Check In Date</th>
                                                    <th>Room Details</th>
                                                    <th>Cash Payment</th>
                                                    <th>GST</th>
                                                    <th>Online Payment</th>
                                                    <th>GST</th>
                                                    <th>Check Out Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $totalcashincom = 0;
                                                $totalcashgst = 0;
                                                $totalonlinceincom = 0;
                                                $totalonlinceincomgst = 0;

                                                $total_cashincome = 0;
                                                $total_cashgst = 0;
                                                $total_onlineincome = 0;
                                                $total_onlinegst = 0;
                                                @endphp
                                                @foreach ($checkin_Array as $keydata => $checkin_Arrays)
                                                    @php 
                                                    $total_cashincome += $checkin_Arrays['cash_income'];
                                                    $total_cashgst += $checkin_Arrays['case_income_gst'];
                                                    $total_onlineincome += $checkin_Arrays['online_income'];
                                                    $total_onlinegst += $checkin_Arrays['online_income_gst'];
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $checkin_Arrays['booking_invoiceno'] }}</td>
                                                        <td>{{ date('d M,Y', strtotime($checkin_Arrays['check_in_date'])) }}
                                                        </td>
                                                        <td>
                                                            @foreach ($checkin_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $checkin_Arrays['id'])
                                                                    @if ($room_lists['roomcolorstatus'] == 'Couple Orange')
                                                                        <span style="color: orange;">{{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},</span>

                                                                    @elseif($room_lists['roomcolorstatus'] == 'Couple Pink')
                                                                        <span style="color: #e560c1;">{{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},</span>

                                                                    @elseif($room_lists['roomcolorstatus'] == 'Booked Red')
                                                                        <span style="color: red;">{{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},</span>

                                                                    @elseif($room_lists['roomcolorstatus'] == 'Booked Green')
                                                                        <span style="color: green;">{{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},</span>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $checkin_Arrays['cash_income'] }}</td>
                                                        <td>{{ $checkin_Arrays['case_income_gst'] }}</td>
                                                        <td>{{ $checkin_Arrays['online_income'] }}</td>
                                                        <td>{{ $checkin_Arrays['online_income_gst'] }}</td>
                                                        @if ($checkin_Arrays['check_out_date'] != '')
                                                            <td>{{ date('d M,Y', strtotime($checkin_Arrays['check_out_date'])) }}
                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            <thead>
                                            @php
                                            $totl_filteramount = $total_cashincome + $total_onlineincome;
                                            @endphp
                                                <tr style="color: darkorange">
                                                    <th>Total :</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{ $total_cashincome }}</th>
                                                    <th>{{ $total_cashgst }}</th>
                                                    <th>{{ $total_onlineincome }}</th>
                                                    <th>{{ $total_onlinegst }}</th>
                                                    <th>{{ $totl_filteramount }}</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Other Income
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
                                                    <th>Details</th>
                                                    <th>Note</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($income as $keydata => $incomes)
                                                    <tr>
                                                        <td>{{ date('d M,Y', strtotime($incomes->date)) }}</td>
                                                        <td>{{ $incomes->namelist->name }}</td>
                                                        <td>{{ $incomes->note }}</td>
                                                        <td>{{ $incomes->amount }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <tr style="color: darkorange">
                                                    <th>Totel :</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{ $income_total }}</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Other Expence
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
                                                    <th>Details</th>
                                                    <th>Note</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($expence as $keydata => $expences)
                                                    <tr>
                                                        <td>{{ date('d M,Y', strtotime($expences->date)) }}</td>
                                                        <td>{{ $expences->namelist->name }}</td>
                                                        <td>{{ $expences->note }}</td>
                                                        <td>{{ $expences->amount }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <tr style="color: darkorange">
                                                    <th>Totel :</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{ $expence_total }}</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Calculation
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
                                                    <th>Room Income</th>
                                                    <th>Other Income</th>
                                                    <th>Total</th>
                                                    <th>Expence</th>
                                                    <th>Online Payment</th>
                                                    <th>Grand Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $room_cash_income + $room_online_income }}</td>
                                                    <td>{{ $income_total }}</td>
                                                    <td>{{ $room_cash_income + $income_total + $room_online_income }}</td>
                                                    <td>{{ $expence_total }}</td>
                                                    <td>{{ $room_online_income }}</td>
                                                    <td>{{ $room_cash_income + $income_total + $room_online_income - ($expence_total + $room_online_income) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
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
