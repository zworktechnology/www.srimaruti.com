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
                                        </div>
                                    </div>
                                </div>

                                <br><br>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Booking Deatails
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
                                                    <th>Branch</th>
                                                    <th>Check In Date</th>
                                                    <th>Paid Date</th>
                                                    <th>Room Details</th>
                                                    <th>Cash Payment</th>
                                                    <th>Online Payment</th>
                                                    <th>GST</th>
                                                    <th>Check Out Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php

                                                $total_cashincome = 0;
                                                $total_cashgst = 0;
                                                $total_onlineincome = 0;
                                            @endphp
                                                @foreach ($checkin_Array as $keydata => $checkin_Arrays)
                                                    

                                                    @if(($checkin_Arrays['cash_income']) != '')
                                                        @php 
                                                            $total_cashincome += $checkin_Arrays['cash_income'];
                                                        @endphp
                                                    @endif

                                                    @if(($checkin_Arrays['case_income_gst']) != '')
                                                        @php 
                                                            $total_cashgst += $checkin_Arrays['case_income_gst'];
                                                        @endphp
                                                    @endif

                                                    @if(($checkin_Arrays['online_income']) != '')
                                                        @php 
                                                            $total_onlineincome += $checkin_Arrays['online_income'];
                                                        @endphp
                                                    @endif

                                                    
                                                    <tr>
                                                        <td>{{ $checkin_Arrays['booking_invoiceno'] }}</td>
                                                        <td></td>
                                                        <td>{{ $checkin_Arrays['check_in_date'] }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($checkin_Arrays['paidDate_arrays'])) }}</td>
                                                        
                                                        <td>
                                                            @foreach ($checkin_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $checkin_Arrays['id'])
                                                                    @if ($room_lists['roomcolorstatus'] == 'Couple Orange')
                                                                        <span style="color: orange;">{{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},<br/></span>

                                                                    @elseif($room_lists['roomcolorstatus'] == 'Couple Pink')
                                                                        <span style="color: #e560c1;">{{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},<br/></span>

                                                                    @elseif($room_lists['roomcolorstatus'] == 'Booked Red')
                                                                        <span style="color: red;">{{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},<br/></span>

                                                                    @elseif($room_lists['roomcolorstatus'] == 'Booked Green')
                                                                        <span style="color: green;">{{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},<br/></span>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $checkin_Arrays['cash_income'] }}</td>
                                                        <td>{{ $checkin_Arrays['online_income'] }}</td>
                                                        <td>{{ $checkin_Arrays['case_income_gst'] }}</td>
                                                        <td>{{ $checkin_Arrays['check_out_date'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                            
                                                <tr style="color: darkorange">
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Total :</th>
                                                    <th>{{ $total_cashincome }}</th>
                                                    <th>{{ $total_onlineincome }}</th>
                                                    <th>{{ $total_cashgst }}</th>
                                                </tr>
                                            </thead>
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
