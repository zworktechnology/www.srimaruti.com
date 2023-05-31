@extends('layouts.auth')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Report Detail</h4>
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
                                                   <th>Sl.No</th>
                                                    <th>Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Proof Image</th>
                                                    <th>CheckIn Date</th>
                                                    <th>Out Date</th>
                                                    <th>Head Count</th>
                                                    <th>Room No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Reportdata_Array as $keydata => $Reportdata_Arrays)
                                                    <tr>
                                                    <td>{{ ++$keydata }}</td>
                                                        <td>{{ $Reportdata_Arrays['customer_name'] }}</td>
                                                        <td>{{ $Reportdata_Arrays['whats_app_number'] }}</td>
                                                        <td><a href="{{ asset($Reportdata_Arrays['proofimage_one']) }}"target="_blank"><span style="color: black;">
                                                               <img src="{{ asset($Reportdata_Arrays['proofimage_one']) }}" alt="image description" style="width:70px; height:50px;">
                                                            </a>
                                                         </td>
                                                        <td>{{ date('d M,Y', strtotime($Reportdata_Arrays['check_in_date'])) }}
                                                        </td>
                                                        @if ($Reportdata_Arrays['check_out_date'] != '')
                                                            <td>{{ date('d M,Y', strtotime($Reportdata_Arrays['check_out_date'])) }}
                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                        <td>{{ $Reportdata_Arrays['total_count'] }}</td>
                                                        <td>
                                                            @foreach ($Reportdata_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $Reportdata_Arrays['id'])
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

                             
                              

                                <br>

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
