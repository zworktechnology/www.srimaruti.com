@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Booking</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Room</a></li>
                                    <li class="breadcrumb-item active">Booking</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-4">
                        <div>
                            <a href="{{ route('booking.create') }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i> New Booking</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8" hidden>
                        <div class="float-end">
                            <div class=" mb-3">
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" class="form-control text-start" placeholder="From" name="From" />
                                    <input type="text" class="form-control text-start" placeholder="To" name="To" />
                                    
                                    <button type="button" class="btn btn-primary"><i class="mdi mdi-filter-variant"></i></button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Booking</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <form autocomplete="off" method="POST" action="{{ route('booking.datefilter') }}"
                                        style="display: flex;">
                                        @method('PUT')
                                        @csrf
                                        <li style="margin-left: 10px;">
                                            <select class="form-control " name="booking_dropdown_list" style="width: 100%;"
                                                required>
                                                <option value="checkout" class="text-muted">Checkout</option>
                                                <option value="view_all" class="text-muted" selected>View All</option>
                                            </select>
                                        </li>
                                        <li style="margin-left: 10px;"><input type="date" name="from_date" required
                                                class="form-control from_date" value="{{ $today }}"></li>
                                        <li style="margin-left: 10px;"><input type="date" name="to_date" required
                                                class="form-control to_date" value="{{ $today }}"></li>
                                        <li style="margin-left: 10px;"><button type="submit"
                                                class="btn btn-primary home_search">Search</button></li>
                                    </form>
                                    <li>
                                        <a href="{{ route('booking.create') }}">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                New Booking
                                            </button>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div> --}}

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
                                            <th>Sl. No</th>
                                            <th>Booking ID</th>
                                            <th>Customer</th>
                                            <th>Room Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookingData as $keydata => $bookingDatas)
                                            @if ($bookingDatas['status'] == '1')
                                                <tr>
                                                    <td>{{ ++$keydata }}</td>
                                                    @if ($bookingDatas['branch_id'] == 1)
                                                    <td>#SMISRI{{ $bookingDatas['id'] }}</td>
                                                    @elseif ($bookingDatas['branch_id'] == 2)
                                                    <td>#SMISAM{{ $bookingDatas['id'] }}</td>
                                                    @else
                                                    <td>#SMIGUN{{ $bookingDatas['id'] }}</td>
                                                    @endif
                                                    <td href="#basic{{ $bookingDatas['id'] }}" data-bs-toggle="modal"
                                                        data-bs-target="#basic{{ $bookingDatas['id'] }}" class="pointer">
                                                        {{ $bookingDatas['customer_name'] }}</td>
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
                                                                        data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Pay Balance</a>
                                                                </li>
                                                            @endif


                                                            @if ($bookingDatas['balance_amount'] == 0)
                                                                @if ($bookingDatas['chick_out_date'] == $today)
                                                                    <li>
                                                                        <a href="#checkout{{ $bookingDatas['id'] }}"
                                                                            data-bs-toggle="modal"
                                                                            data-id="{{ $bookingDatas['id'] }}"
                                                                            class="btn btn-sm btn-soft-success checkout{{ $bookingDatas['id'] }}"
                                                                            data-bs-target="#checkout{{ $bookingDatas['id'] }}">Checkout</a>
                                                                        <div class="modal fade"
                                                                            id="checkout{{ $bookingDatas['id'] }}"
                                                                            data-bs-backdrop="static"
                                                                            data-bs-keyboard="false" aria-hidden="true"
                                                                            aria-labelledby="..." tabindex="-1">
                                                                            @include('pages.backend.booking.components.checkout')
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endif

                                                            @if ($bookingDatas['extended_date'] == '')
                                                                <li>
                                                                    <a href="#extend{{ $bookingDatas['id'] }}"
                                                                        data-bs-toggle="modal"
                                                                        data-id="{{ $bookingDatas['id'] }}"
                                                                        class="btn btn-sm btn-soft-primary extend{{ $bookingDatas['id'] }}"
                                                                        data-bs-target="#extend{{ $bookingDatas['id'] }}">Extend</a>
                                                                    <div class="modal fade"
                                                                        id="extend{{ $bookingDatas['id'] }}"
                                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                                        aria-hidden="true" aria-labelledby="..."
                                                                        tabindex="-1">
                                                                        @include('pages.backend.booking.components.extend')
                                                                    </div>
                                                                </li>
                                                            @endif

                                                            <li>
                                                                <a href="{{ route('booking.view', ['id' => $bookingDatas['id']]) }}"
                                                                    class="btn btn-sm btn-soft-secondary">View</a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ route('booking.edit', ['id' => $bookingDatas['id']]) }}"
                                                                    class="btn btn-sm btn-soft-info">Edit</a>
                                                            </li>

                                                            {{-- <li>
                                                                <a href="#jobDelete{{ $bookingDatas['id'] }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-sm btn-soft-danger"
                                                                    data-bs-target="#firstmodal{{ $bookingDatas['id'] }}">Delete</a>
                                                            </li> --}}
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endif

                                            @if ($bookingDatas['balance_amount'] != 0)
                                                <div class="modal fade" id="paybalance{{ $bookingDatas['id'] }}"
                                                    data-bs-backdrop="static" aria-hidden="true" aria-labelledby="..."
                                                    tabindex="-1">
                                                    @include('pages.backend.booking.components.paybalance')
                                                </div>
                                            @endif

                                            <div class="modal fade" id="firstmodal{{ $bookingDatas['id'] }}"
                                                aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                @include('pages.backend.booking.components.delete')
                                            </div>

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
