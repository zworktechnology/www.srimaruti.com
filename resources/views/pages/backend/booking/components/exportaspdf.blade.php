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

                                <hr>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    Manager : <span
                                                        style="color: #acafb7;">XXXYYYZZZ</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    Branch : <span style="color: #acafb7;">AAA</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-4" style="text-align: end;">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    From Date : <span
                                                        style="color: #acafb7;">00-00-0000</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    To Date : <span style="color: #acafb7;">00-00-000</span>
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
                                                    <th>Check In Room Deatails</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td scope="row">Room No - Room Type - Stay Days * Price Per Day - Total Amout </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>

                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Check Out Room Deatails</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td scope="row">Room No - Room Type - Stay Days * Price Per Day - Total Amout </td>
                                                    </tr>
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
