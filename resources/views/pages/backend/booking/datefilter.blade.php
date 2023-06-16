@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
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
                                                    class="form-control from_date" value="{{ $from_date }}"></li>
                                            <li style="margin-left: 10px;"><button type="submit"
                                                    class="btn btn-primary home_search">Search</button></li>
                                        </form>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">

                    <div class="col-md-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $checkins }}</span></h4>
                                    <p class="text-muted mb-0">Checkins</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $checkouts }}</span></h4>
                                    <p class="text-muted mb-0">Checkouts</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->
                </div> --}}


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

                <div class="row" style="display: flex">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="bookingdatefilter_datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.billno') }}</th>
                                            <th>{{ __('messages.customer') }}</th>
                                            <th>Check In Staff</th>
                                            <th>Check In Date & Time</th>
                                            <th>Check Out Staff</th>
                                            <th>Check Out Date & Time</th>
                                            <th>{{ __('messages.room_title') }} Details</th>
                                            <th>{{ __('messages.action_title') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($checkin_Array as $keydata => $bookingDatas)
                                            @if ($bookingDatas['couple'] == 1)
                                                <tr style="background-color: lightpink">

                                                    <td>{{ $bookingDatas['booking_invoiceno'] }}</td>

                                                    <td href="#basic{{ $bookingDatas['id'] }}" data-bs-toggle="modal"
                                                        data-bs-target="#basic{{ $bookingDatas['id'] }}" class="pointer">
                                                        {{ $bookingDatas['customer_name'] }}</td>

                                                    <td>{{ $bookingDatas['check_in_staff'] }}</td>

                                                    <td><span>{{ date('d M Y', strtotime($bookingDatas['chick_in_date'])) }}-({{ date('h:i A', strtotime($bookingDatas['chick_in_time'])) }})</span>
                                                    </td>

                                                    @if ($bookingDatas['check_out_staff'] == 'Null')
                                                        <td>-</td>
                                                    @else
                                                        <td>{{ $bookingDatas['check_out_staff'] }}</td>
                                                    @endif

                                                    <td>
                                                        @if ($bookingDatas['out_date'] != '')
                                                            <span>{{ date('d M Y', strtotime($bookingDatas['out_date'])) }}-({{ date('h:i A', strtotime($bookingDatas['out_time'])) }})</span>
                                                        @else
                                                            <span></span>
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
                                                                        data-id="{{ $bookingDatas['id'] }}"
                                                                        class="btn btn-sm btn-soft-warning paybalance{{ $bookingDatas['id'] }}"
                                                                        data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Pay
                                                                        Balance</a>
                                                                </li>
                                                            @endif


                                                            @if ($bookingDatas['balance_amount'] == 0)
                                                                @if ($bookingDatas['status'] != 2)
                                                                    @if ($bookingDatas['chick_out_date'] >= $today)
                                                                        <li>
                                                                            <a href="#checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-toggle="modal"
                                                                                data-id="{{ $bookingDatas['id'] }}"
                                                                                class="btn btn-sm btn-soft-success checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-target="#checkout{{ $bookingDatas['id'] }}">Checkout</a>
                                                                        </li>
                                                                    @endif
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
                                            @else
                                                <tr>

                                                    <td>{{ $bookingDatas['booking_invoiceno'] }}</td>

                                                    <td href="#basic{{ $bookingDatas['id'] }}" data-bs-toggle="modal"
                                                        data-bs-target="#basic{{ $bookingDatas['id'] }}" class="pointer">
                                                        {{ $bookingDatas['customer_name'] }}</td>

                                                    <td>{{ $bookingDatas['check_in_staff'] }}</td>

                                                    <td><span>{{ date('d M Y', strtotime($bookingDatas['chick_in_date'])) }}-({{ date('h:i A', strtotime($bookingDatas['chick_in_time'])) }})</span>
                                                    </td>

                                                    @if ($bookingDatas['check_out_staff'] == 'Null')
                                                        <td>-</td>
                                                    @else
                                                        <td>{{ $bookingDatas['check_out_staff'] }}</td>
                                                    @endif

                                                    <td>
                                                        @if ($bookingDatas['out_date'] != '')
                                                            <span>{{ date('d M Y', strtotime($bookingDatas['out_date'])) }}-({{ date('h:i A', strtotime($bookingDatas['out_time'])) }})</span>
                                                        @else
                                                            <span></span>
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
                                                                        data-id="{{ $bookingDatas['id'] }}"
                                                                        class="btn btn-sm btn-soft-warning paybalance{{ $bookingDatas['id'] }}"
                                                                        data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Pay
                                                                        Balance</a>
                                                                </li>
                                                            @endif


                                                            @if ($bookingDatas['balance_amount'] == 0)
                                                                @if ($bookingDatas['status'] != 2)
                                                                    @if ($bookingDatas['chick_out_date'] >= $today)
                                                                        <li>
                                                                            <a href="#checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-toggle="modal"
                                                                                data-id="{{ $bookingDatas['id'] }}"
                                                                                class="btn btn-sm btn-soft-success checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-target="#checkout{{ $bookingDatas['id'] }}">Checkout</a>
                                                                        </li>
                                                                    @endif
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
                                            @endif

                                            @if ($bookingDatas['balance_amount'] != 0)
                                                <div class="modal fade" id="paybalance{{ $bookingDatas['id'] }}"
                                                    data-bs-backdrop="static" aria-hidden="true" aria-labelledby="..."
                                                    class="paybalance{{ $bookingDatas['id'] }}" tabindex="-1">
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
            $('#bookingdatefilter_datatable').DataTable();
        });
        $(".d_paybalanceclose").click(function() {
            window.location.reload();
        });
        $(".d_paybalanceclosebutton").click(function() {
            window.location.reload();
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
