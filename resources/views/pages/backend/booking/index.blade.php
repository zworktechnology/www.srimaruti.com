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
                            @foreach ($room_details as $room_detail)
                            <div class="col-md-1" style="border: 2px solid; margin: 10px; padding: 10px; border-radius: 10px;">
                                <div>
                                    <h4 class="mb-1 mt-1">{{ $room_detail->room_number }}</h4>
                                    <p class="text-muted mb-0">Floor. {{ $room_detail->room_floor }}</p>
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
