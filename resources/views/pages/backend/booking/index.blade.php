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
                                        class="mdi mdi-plus me-1"></i> New Booking</button></a>

                            <div class="page-title-right">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <div class="page-title-right">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">
                                                Filter by <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -41.3167px);"
                                                data-popper-placement="top-start">
                                                <a class="dropdown-item {{ Route::is('booking.index') ? 'mm-active' : '' }}"
                                                    href="{{ route('booking.index', ['user_branch_id' => $user_branch_id]) }}">View
                                                    All</a>
                                                <a class="dropdown-item {{ Route::is('booking.today') ? 'mm-active' : '' }}"
                                                    href="{{ route('booking.today', ['user_branch_id' => $user_branch_id]) }}">Today's</a>
                                                <a class="dropdown-item {{ Route::is('booking.upcoming') ? 'mm-active' : '' }}"
                                                    href="{{ route('booking.upcoming', ['user_branch_id' => $user_branch_id]) }}">Upcoming</a>
                                                <a class="dropdown-item {{ Route::is('booking.missingout') ? 'mm-active' : '' }}"
                                                    href="{{ route('booking.missingout', ['user_branch_id' => $user_branch_id]) }}">Missing</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @if (\Session::has('add'))
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <i class="uil uil-pen me-2"></i>
                        {!! \Session::get('add') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (\Session::has('update'))
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <i class="uil uil-pen me-2"></i>
                        {!! \Session::get('update') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (\Session::has('soft_destroy'))
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <i class="uil uil-pen me-2"></i>
                        {!! \Session::get('soft_destroy') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (\Session::has('destroy'))
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <i class="uil uil-pen me-2"></i>
                        {!! \Session::get('destroy') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (\Session::has('paybalance'))
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <i class="uil uil-pen me-2"></i>
                        {!! \Session::get('paybalance') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (\Session::has('extend'))
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <i class="uil uil-pen me-2"></i>
                        {!! \Session::get('extend') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row" style="display: flex">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="booking_datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Customer</th>
                                            <th>Check Out Date & Time</th>
                                            <th>Room Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookingData as $keydata => $bookingDatas)
                                            <tr>

                                                <td>{{ $bookingDatas['booking_invoiceno'] }}</td>

                                                <td href="#basic{{ $bookingDatas['id'] }}" data-bs-toggle="modal"
                                                    data-bs-target="#basic{{ $bookingDatas['id'] }}" class="pointer">
                                                    {{ $bookingDatas['customer_name'] }}</td>

                                                <td>
                                                    @if ($bookingDatas['status'] == 2)
                                                        <span
                                                            style="color:red">{{ date('d M Y', strtotime($bookingDatas['out_date'])) }}
                                                            -
                                                            ({{ date('h:i A', strtotime($bookingDatas['out_time'])) }})
                                                        </span>
                                                    @elseif (($bookingDatas['chick_out_date'] < $today) & ($bookingDatas['status'] == 2))
                                                        <span>{{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }}
                                                            -
                                                            ({{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }})</span>
                                                    @else
                                                        <span>{{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }}
                                                            -
                                                            ({{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }})</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                                        @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                                            {{ $bookingDatas['branch'] }} -
                                                            {{ $room_lists['room'] }}<br />
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                                        @if ($bookingDatas['balance_amount'] != 0)
                                                            <li>
                                                                <a href="#paybalance{{ $bookingDatas['id'] }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-sm btn-soft-warning"
                                                                    data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Pay
                                                                    Balance</a>
                                                            </li>
                                                        @endif


                                                        @if ($bookingDatas['balance_amount'] == 0)
                                                            @if ($bookingDatas['status'] != 2)
                                                                <li>
                                                                    <a href="#checkout{{ $bookingDatas['id'] }}"
                                                                        data-bs-toggle="modal"
                                                                        data-id="{{ $bookingDatas['id'] }}"
                                                                        class="btn btn-sm btn-soft-success checkout{{ $bookingDatas['id'] }}"
                                                                        data-bs-target="#checkout{{ $bookingDatas['id'] }}">Checkout</a>
                                                                </li>
                                                            @endif
                                                        @endif

                                                        {{-- @if ($bookingDatas['chick_out_date'] >= $today)
                                                            @if ($bookingDatas['status'] != 2)
                                                                <li>
                                                                    <a href="#extend{{ $bookingDatas['id'] }}"
                                                                        data-bs-toggle="modal"
                                                                        data-id="{{ $bookingDatas['id'] }}"
                                                                        class="btn btn-sm btn-soft-primary extend{{ $bookingDatas['id'] }}"
                                                                        data-bs-target="#extend{{ $bookingDatas['id'] }}">Extend</a>
                                                                </li>
                                                            @endif
                                                        @endif --}}

                                                        <li>
                                                            <a href="{{ route('booking.view', ['id' => $bookingDatas['id']]) }}"
                                                                class="btn btn-sm btn-soft-secondary">View</a>
                                                        </li>

                                                        @if ($bookingDatas['status'] != 2)
                                                        <li>
                                                            <a href="{{ route('booking.edit', ['id' => $bookingDatas['id']]) }}"
                                                                class="btn btn-sm btn-soft-info">Edit</a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>

                                            @if ($bookingDatas['balance_amount'] != 0)
                                                <div class="modal fade" id="paybalance{{ $bookingDatas['id'] }}"
                                                    data-bs-backdrop="static" aria-hidden="true" aria-labelledby="..."
                                                    tabindex="-1">
                                                    @include('pages.backend.booking.components.paybalance')
                                                </div>
                                            @endif

                                            @if ($bookingDatas['balance_amount'] == 0)
                                                @if ($bookingDatas['status'] != 2)
                                                    <div class="modal fade" id="checkout{{ $bookingDatas['id'] }}"
                                                        data-bs-backdrop="static" aria-hidden="true"
                                                        aria-labelledby="..." tabindex="-1">
                                                        @include('pages.backend.booking.components.checkout')
                                                    </div>
                                                @endif
                                            @endif

                                            {{-- @if ($bookingDatas['chick_out_date'] >= $today)
                                                @if ($bookingDatas['status'] != 2)
                                                    <div class="modal fade" id="extend{{ $bookingDatas['id'] }}"
                                                        data-bs-backdrop="static" aria-hidden="true"
                                                        aria-labelledby="..." tabindex="-1">
                                                        @include('pages.backend.booking.components.extend')
                                                    </div>
                                                @endif
                                            @endif --}}

                                            <div class="modal fade" id="basic{{ $bookingDatas['id'] }}"
                                                aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                @include('pages.backend.booking.components.basic')
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
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


        $(document).on("keyup", 'input.payable_amount', function() {
            var payable_amount = $(this).val();
            var balance_amount = $(".balance_amount").val();

            if (Number(payable_amount) > Number(balance_amount)) {
                alert('You are entering Maximum Amount of Balance');
                $(".payable_amount").val('');
            }
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
