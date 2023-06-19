@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <a href="{{ route('booking.create', ['user_branch_id' => $user_branch_id]) }}"><button
                                    type="button" class="btn btn-primary waves-effect waves-light mb-3"><i
                                        class="mdi mdi-plus me-1"></i> {{ __('messages.newbooking_title') }}</button></a>

                            <div class="page-title-right" style="display:flex">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <ol class="breadcrumb m-0">
                                        <form autocomplete="off" method="POST"
                                            action="{{ route('booking.datefilter', ['user_branch_id' => $user_branch_id]) }}"
                                            style="display: flex;">
                                            @method('PUT')
                                            @csrf
                                            <li style="margin-left: 10px;"><input type="date" name="from_date" required
                                                    class="form-control from_date" value="{{ $today }}"></li>
                                            <li style="margin-left: 10px;"><button type="submit"
                                                    class="btn btn-primary home_search">Search</button></li>
                                        </form>
                                    </ol>
                                </div>
                                <div class="page-title-box d-flex align-items-center justify-content-between"
                                    style="margin-left: 10px;">
                                    <div class="page-title-right">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">
                                                Filter by Status <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -41.3167px);"
                                                data-popper-placement="top-start">
                                                <a class="dropdown-item {{ Route::is('booking.index') ? 'mm-active' : '' }}"
                                                    href="{{ route('booking.index', ['user_branch_id' => $user_branch_id]) }}">{{ __('messages.openedbooking_title') }}</a>
                                                <a class="dropdown-item {{ Route::is('booking.today') ? 'mm-active' : '' }}"
                                                    href="{{ route('booking.today', ['user_branch_id' => $user_branch_id]) }}">{{ __('messages.closedbooking_title') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="card">
                        <div class="card-body" style="display: flex">
                            @foreach ($rooms_arr as $bookingDatas)




                            






                            @if ($bookingDatas['status'] == 'Booked')
                                
                                    <div class="col-md-1" style="border: 2px solid; margin: 10px; padding: 10px; border-radius: 10px;background: #d12424;">

                                        <a href="#room_view{{ $bookingDatas['latest_booking_id'] }}" data-bs-toggle="modal" data-id="{{ $bookingDatas['latest_booking_id'] }}" 
                                            class="room_view{{ $bookingDatas['latest_booking_id'] }}" data-bs-target="#room_view{{ $bookingDatas['latest_booking_id'] }}">

                                        <div>
                                            <h4 class="mb-1 mt-1" style="color:white;">{{ $bookingDatas['room_no'] }}</h4>
                                            <p class=" mb-0" style="color:white;">Floor. {{ $bookingDatas['room_floor'] }}</p>
                                        </div>

                                        </a>

                                    </div>
                                

                            @elseif($bookingDatas['status'] == 'Couple')
                            <div class="col-md-1" style="border: 2px solid; margin: 10px; padding: 10px; border-radius: 10px;background: #e560c1;">

                                <a href="#room_view{{ $bookingDatas['latest_booking_id'] }}" data-bs-toggle="modal" data-id="{{ $bookingDatas['latest_booking_id'] }}" 
                                            class="room_view{{ $bookingDatas['latest_booking_id'] }}" data-bs-target="#room_view{{ $bookingDatas['latest_booking_id'] }}">
                                <div>
                                    <h4 class="mb-1 mt-1" style="color:white;">{{ $bookingDatas['room_no'] }}</h4>
                                    <p class=" mb-0" style="color:white;">Floor. {{ $bookingDatas['room_floor'] }}</p>
                                </div>
                                </a>
                            </div>

                            @elseif($bookingDatas['status'] == 'Open')
                            <div class="col-md-1" style="border: 2px solid; margin: 10px; padding: 10px; border-radius: 10px;">
                                <div>
                                    <h4 class="mb-1 mt-1">{{ $bookingDatas['room_no'] }}</h4>
                                    <p class="text-muted mb-0">Floor. {{ $bookingDatas['room_floor'] }}</p>
                                </div>
                            </div>
                            @endif


                                
                            <div class="modal fade" id="room_view{{ $bookingDatas['latest_booking_id'] }}" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="..."
                                class="room_view{{ $bookingDatas['latest_booking_id'] }}" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Room View</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Customer Name </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['customer_name'] }}">
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Contact Number </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['whats_app_number'] }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check-In Date</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['checkindate'] }}">
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Check-Out Date</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['chick_out_date'] }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Of Days</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['days'] }}">
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Count Head</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['count_head'] }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Total Prize</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['total'] }}">
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">GST</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['gst_amount'] }}">
                                                </div>
                                            </div>


                                            <br/>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Grand Total</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['grand_total'] }}">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Payment Paid</label>
                                                <div class="col-sm-9 row">
                                                @foreach ($bookingDatas['terms'] as $index => $term_arr)
                                                @if ($term_arr['booking_id'] == $bookingDatas['latest_booking_id'])
                                                
                                                    <span class="col-sm-4">
                                                        <input type="text" style="background: #e0ddeb;" readonly="" class="form-control"id="" value="{{ $term_arr['term'] }}">
                                                    </span>
                                                    <span class="col-sm-4">
                                                        <input type="text" style="background: #e0ddeb;" readonly="" class="form-control"id="" value="{{ $term_arr['payable_amount'] }}">
                                                    </span>
                                                    <span class="col-sm-4">
                                                        <input type="text" style="background: #e0ddeb;" readonly="" class="form-control"id="" value="{{ $term_arr['payment_method'] }}">
                                                    </span>
                                                
                                                @endif
                                                @endforeach
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Balance Amount</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['balance_amount'] }}">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check In Staff</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bookingDatas['checkin_staff'] }}">
                                                </div>
                                            </div>

                                            <br/>


                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Proof Image View</label>
                                                <div class="col-sm-9 row">
                                                    <span class="col-sm-4">
                                                        <img src="{{ asset($bookingDatas['proofimage_one']) }}" alt="image description" style="width:70px; height:50px;">
                                                    </span>
                                                    <span class="col-sm-4">
                                                        <img src="{{ asset($bookingDatas['proofimage_two']) }}" alt="image description" style="width:70px; height:50px;">
                                                    </span>
                                                    <span class="col-sm-4">
                                                        <img src="{{ asset($bookingDatas['customer_photo']) }}" alt="image description" style="width:70px; height:50px;">
                                                    </span>
                                                </div>
                                            </div>

                                            <br/><br/>

                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Action</label>
                                                <div class="col-sm-9 row">
                                                    <span class="col-sm-1">
                                                    @if ($bookingDatas['booking_status'] != 2)
                                                        <a href="{{ route('booking.edit', ['id' => $bookingDatas['id']]) }}"
                                                                        class="btn btn-sm btn-soft-info">Edit</a>
                                                    @endif
                                                    </span>
                                                    <span class="col-sm-1">
                                                         <a href="{{ route('booking.view', ['id' => $bookingDatas['id']]) }}"
                                                                    class="btn btn-sm btn-soft-secondary">View</a>
                                                    </span>
                                                    <span class="col-sm-1">
                                                    @if ($bookingDatas['balance_amount'] != 0)
                                                    <a href="#paybalance{{ $bookingDatas['id'] }}"
                                                                        data-bs-toggle="modal"
                                                                        data-id="{{ $bookingDatas['id'] }}"
                                                                        class="btn btn-sm btn-soft-warning paybalance{{ $bookingDatas['id'] }}"
                                                                        data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Pay
                                                                        Balance</a>
                                                    @endif
                                                    </span>
                                                    <span class="col-sm-1">
                                                    @if ($bookingDatas['balance_amount'] == 0)
                                                                @if ($bookingDatas['booking_status'] != 2)
                                                                    @if ($bookingDatas['chick_out_date'] >= $today)
                                                                    <a href="#checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-toggle="modal"
                                                                                data-id="{{ $bookingDatas['id'] }}"
                                                                                class="btn btn-sm btn-soft-success checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-target="#checkout{{ $bookingDatas['id'] }}">Checkout</a>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="paybalance{{ $bookingDatas['id'] }}"
                                                    data-bs-backdrop="static" aria-hidden="true" aria-labelledby="..."
                                                    class="paybalance{{ $bookingDatas['id'] }}" tabindex="-1">
                                                    @include('pages.backend.booking.components.paybalance')
                                                </div>

                                                <div class="modal fade" id="checkout{{ $bookingDatas['id'] }}"
                                                        data-bs-backdrop="static" aria-hidden="true"
                                                        aria-labelledby="..." tabindex="-1">
                                                        @include('pages.backend.booking.components.checkout')
                                                    </div>

                                            

                                        </div>
                                    </div>
                                </div>
                            </div>





                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="display: flex;">
                        <div class="col-md-4" style="margin-right: 15px;">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Room Details</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>
                                                        {{ $totalrooms }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Avaiable</td>
                                                    <td>
                                                        {{ $availablerooms }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Booked</td>
                                                    <td>
                                                        {{ $totalrooms - $availablerooms }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Room Deatails</th>
                                                    <th>Customer</th>
                                                    <th>Staff</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>No. 01</td>
                                                    <td>
                                                        Customer 1
                                                    </td>
                                                    <td>
                                                        Staff 1
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                            View Details
                                                        </button>
                                                    </td>
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

    <script>
        $(document).ready(function() {
            $('#booking_datatable').DataTable();
        });





        // Calculate Days



        //$(document).ready(function() {
        //  $(".clicktocheckin").click(function() {
        //alert('');
        //     var clicktocheckin = this.value;
        //     var booking_id = $('#booking_id').val();
        //     console.log(booking_id);

        //             $.ajax({
        //                url: '/AddCheckin/',
        //                 type: 'get',
        //                  data: {
        //                     _token: "{{ csrf_token() }}",
        //                     clicktocheckin: clicktocheckin,
        //                     booking_id: booking_id
        //                 },
        //                dataType: 'json',
        //                 success: function(response) {
        //                     //console.log(response);
        //                     if (response.status == 'success') {
        //
        //                         alert('Checkin record detail successfully added');
        //                         location.reload();
        //                      }
        //
        //                 }
        //             });
        //  });
        //});
    </script>
@endsection
