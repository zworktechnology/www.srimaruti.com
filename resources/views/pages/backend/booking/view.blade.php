@extends('layouts.auth')

@section('content')



<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Profile</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row mb-4">
                            <div class="col-xl-3">
                                <div class="card " style="background: #dee8f147;">
                                    <div class="card-body">
                                       

                                      

                                        <div class="text-muted">
                                            <div class="table-responsive mt-4">
                                                <div>
                                                    
                                                    <h2 class="font-size-22" style="color:black; font-weight:800;">{{ $data->customer_name }}</h2>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1" style="color: #2b2e3b;">Mobile :</p>
                                                    <h5 class="font-size-14">{{ $data->phone_number }}</h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1" style="color: #2b2e3b;">Whatsapp Number :</p>
                                                    <h5 class="font-size-14">{{ $data->whats_app_number }}</h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1" style="color: #2b2e3b;">Email :</p>
                                                    <h5 class="font-size-14">{{ $data->email_id }}</h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1" style="color: #2b2e3b;">Address :</p>
                                                    <h5 class="font-size-14">{{ $data->address }}</h5>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-9">
                                <div class="card mb-0" style="background: #dee8f147;">
                                   
                                    <div class="tab-content p-4">
                                      
                                            <h6 class="font-size-18 mb-4" style="color: #2372b5;font-weight: 800;">{{$branch->name}}</h6>

                                            <div class="row">
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="card" style="background: #c8df6e;">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 align-self-center">
                                                                    <div class="pb-1">
                                                                        <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Check In</a></h5>
                                                                        <p class="" style="color:#495057">
                                                                            <i class="mdi mdi-account" ></i> {{ date('d M Y', strtotime($data->check_in_date)) }}  - ( {{ date('h:i A', strtotime($data->check_in_time)) }} )
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="card" style="background: #c8df6e;">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 align-self-center">
                                                                    <div class="pb-1">
                                                                        <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Check Out</a></h5>
                                                                        <p class="" style="color:#495057">
                                                                            <i class="mdi mdi-account" ></i> {{ date('d M Y', strtotime($data->check_out_date)) }}  - ( {{ date('h:i A', strtotime($data->check_out_time)) }} )
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="card" style="background: #dae4ed;">
                                                        <div class="card-body">
                                                            <h4 class="card-title mb-4 text-dark font-size-16">Count</h4>

                                                            <div data-simplebar style="max-height: 339px;">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless table-centered table-nowrap">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <h6 class="font-size-15 mb-1 fw-normal">Male Count</h6>
                                                                                </td>
                                                                                <td class="fw-semibold text-end" style="color:#495057">{{ $data->male_count }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h6 class="font-size-15 mb-1 fw-normal">Female Count</h6>
                                                                                </td>
                                                                                <td class=" fw-semibold text-end" style="color:#495057">{{ $data->female_count }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h6 class="font-size-15 mb-1 fw-normal">Child Count</h6>
                                                                                </td>
                                                                                <td class="fw-semibold text-end" style="color:#495057">{{ $data->child_count }}</td>
                                                                            </tr>
                                                                           
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="card" style="background: #dae4ed;">
                                                        <div class="card-body">
                                                            <h4 class="card-title mb-4 text-dark font-size-16">Proof</h4>
                                                            <div data-simplebar style="max-height: 339px;">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless table-centered table-nowrap">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <h6 class="font-size-15 mb-1 fw-normal">{{ $data->prooftype_one }}</h6>
                                                                                    <p class="text-muted font-size-13 mb-0" ><i class="mdi mdi-map-marker"></i> <a href="asset/{{$data->proofimage_one}}" style="color: #b51818;">{{ $data->proofimage_one }}</a></p>
                                                                                </td>
                                                                            </tr>
                                                                            @if ($data->prooftype_two != "")
                                                                            <tr>
                                                                                <td>
                                                                                    <h6 class="font-size-15 mb-1 fw-normal">{{ $data->prooftype_two }}</h6>
                                                                                    <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> <a href="asset/{{$data->proofimage_one}}" style="color: #b51818;">{{ $data->proofimage_two }}</a></p>
                                                                                </td>
                                                                            </tr>
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card" style="background: #dae4ed;">
                                                        <div class="card-body">
                                                            <h4 class="card-title mb-4 text-dark font-size-16">{{$branch->name}} - Rooms</h4>

                                                            <div data-simplebar style="max-height: 500px;">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless table-centered table-nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Room</th>
                                                                                <th>Room Cost</th>
                                                                                <th>Day</th>
                                                                                <th>Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach ($room_list as $index => $room_lists)
                                                                            <tr>
                                                                                <td><h6 class="font-size-15 mb-1 fw-normal"> {{ $room_lists['room'] }}<br /></h6>
                                                                                </td>
                                                                                <td><h6 class="font-size-15 mb-1 fw-normal">{{ $room_lists['room_price'] }}</h6></td>
                                                                                <td><h6 class="font-size-15 mb-1 fw-normal" >{{ $room_lists['days'] }} Day</h6></td>
                                                                                <td><h6 class="font-size-15 mb-1 fw-normal">{{ $room_lists['room_cal_price'] }}</h6></td>
                                                                            </tr>
                                                                        @endforeach
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td style="font-weight: 700;">TOTAL</td>
                                                                                <td style="font-weight: 700;">{{$data->total}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td style="font-weight: 700;">GST - {{$data->gst_per}} %</td>
                                                                                <td style="font-weight: 700;">{{$data->gst_amount}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td style="font-weight: 700;">DISCOUNT - {{$data->disc_per}} %</td>
                                                                                <td style="font-weight: 700;">{{$data->disc_amount}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td style="font-weight: 700;">ADDITIONAL CHARGE</td>
                                                                                <td style="font-weight: 700;">{{$data->additional_amount}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td style="color: #e83e8c;font-weight: 700;">GRAND TOTAL</td>
                                                                                <td style="color: #e83e8c;font-weight: 700;">{{$data->grand_total}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td style="color: #e83e8c;font-weight: 700;">PAID</td>
                                                                                <td style="color: #e83e8c;font-weight: 700;">{{$data->total_paid}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td style="color: #e83e8c;font-weight: 700;">BALANCE</td>
                                                                                <td style="color: #e83e8c;font-weight: 700;">{{$data->balance_amount}}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
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


@endsection