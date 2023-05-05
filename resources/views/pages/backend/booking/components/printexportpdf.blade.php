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

                                <hr>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    Manager : <span
                                                        style="color: #acafb7;">{{ $manager->name}}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    Branch : <span style="color: #acafb7;">{{ $branch->name}}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-4" style="text-align: end;">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    From Date : <span
                                                        style="color: #acafb7;">{{ date('d-m-Y', strtotime($from_date)) }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    To Date : <span style="color: #acafb7;">{{ date('d-m-Y', strtotime($to_date)) }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br/>
                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                Check In Room Deatails 
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <br/>
                                <div class="py-2">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Checkin Date</th>
                                                    <th>Room No - Type</th>
                                                    <th>Day</th>
                                                    <th>Price / Day</th>
                                                    <th>Total</th>
                                                    <th>Tax</th>
                                                    <th>Grand Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($checkin_Array as $keydata => $checkin_Arrays)
                                                    <tr>
                                                        
                                                        
                                                            <td>{{ date('d-m-Y', strtotime($checkin_Arrays['check_in_date'])) }}</td>
                                                                    
                                                                <td>
                                                                
                                                                @foreach ($checkin_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $checkin_Arrays['id'])
                                                                    {{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }} <br />
                                                                     
                                                                    @endif
                                                                    @endforeach
                                                                      
                                                                </td>
                                                                
                                                                
                                                                
                                                               
                                                                <td>{{ $checkin_Arrays['days'] }}</td>
                                                                <td>
                                                                @foreach ($checkin_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $checkin_Arrays['id'])    
                                                                    {{ $room_lists['booking_room_price'] }} <br />
                                                                    @endif
                                                                    
                                                                    @endforeach
                                                                </td>
                                                                <td>{{ $checkin_Arrays['total'] }}</td>
                                                                <td>{{ $checkin_Arrays['gst_amount'] }}</td>
                                                                <td>{{ $checkin_Arrays['grand_total'] }}</td>


                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>
                                    <br/>
                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                Check Out Room Deatails 
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>

                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Checkout Date</th>
                                                    <th>Room No - Type</th>
                                                    <th>Day</th>
                                                    <th>Price / Day</th>
                                                    <th>Total</th>
                                                    <th>Tax</th>
                                                    <th>Grand Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($checkout_Array as $keydata => $checkout_Arrays)
                                                    <tr>
                                                        
                                                        
                                                            <td>{{ date('d-m-Y', strtotime($checkout_Arrays['check_out_date'])) }}</td>
                                                                    
                                                                <td>
                                                                
                                                                @foreach ($checkout_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $checkout_Arrays['id'])
                                                                    {{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }} <br />
                                                                     
                                                                    @endif
                                                                    @endforeach
                                                                      
                                                                </td>
                                                                
                                                                
                                                                
                                                               
                                                                <td>{{ $checkout_Arrays['days'] }}</td>
                                                                <td>
                                                                @foreach ($checkout_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $checkout_Arrays['id'])    
                                                                    {{ $room_lists['booking_room_price'] }} <br />
                                                                    @endif
                                                                    
                                                                    @endforeach
                                                                </td>
                                                                <td>{{ $checkout_Arrays['total'] }}</td>
                                                                <td>{{ $checkout_Arrays['gst_amount'] }}</td>
                                                                <td>{{ $checkout_Arrays['grand_total'] }}</td>


                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>

                                    <div class="row" style="display: flex;">
                                        <div class="col-sm-6 col-6">
                                            <br><br><br>
                                            <h6 class="m-0">Manager Signature</h6>
                                        </div>
                                        <div class="col-sm-6 col-6" style="text-align: end;">
                                            <br><br><br>
                                            <h6 class="m-0">For <span style="font-family: 'Cinzel Decorative', cursive; font-weight: bold;">Sri Maruti Inn</span></h6>
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
