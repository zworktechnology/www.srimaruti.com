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
                                                    class="form-control from_date" value="{{ $today }}"></li>
                                            <li style="margin-left: 10px;"><button type="submit"
                                                    class="btn btn-primary home_search">Search</button></li>
                                        </form>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            
                <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4"  style="color:green;font-weight:800"> CHECK - IN</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0" id="booking_datatable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Bill.No</th>
                                                    <th>Room Deatails</th>
                                                    <th>Total</th>
                                                    <th>Paid</th>
                                                    <th>Customer</th>
                                                    <th>Staff</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dailyentryData as $keydata => $dailyentryDatas)
                                                    <tr>
                                                        <td>{{ ++$keydata }}</td>
                                                        <td>{{ $dailyentryDatas['booking_invoiceno'] }}</td>
                                                        <td>
                                                            @foreach ($dailyentryDatas['room_lists'] as $index => $room_lists_arr)
                                                                @if ($room_lists_arr['booking_id'] == $dailyentryDatas['id'])

                                                                    @if ($room_lists_arr['roomcolor_status'] == 'Couple Orange')
                                                                        <span style="color: orange;">{{ $room_lists_arr['room'] }}<br /></span>

                                                                    @elseif($room_lists_arr['roomcolor_status'] == 'Couple Pink')
                                                                        <span style="color: #e560c1;">{{ $room_lists_arr['room'] }}<br /></span>

                                                                    @elseif($room_lists_arr['roomcolor_status'] == 'Booked Red')
                                                                        <span style="color: red;">{{ $room_lists_arr['room'] }}<br /></span>

                                                                    @elseif($room_lists_arr['roomcolor_status'] == 'Booked Green')
                                                                        <span style="color: green;">{{ $room_lists_arr['room'] }}<br /></span>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{ $dailyentryDatas['grand_total'] }}
                                                        </td>
                                                        <td>
                                                            {{ $dailyentryDatas['total_paid'] }}
                                                        </td>
                                                        <td>
                                                            {{ $dailyentryDatas['customer_name'] }}
                                                        </td>
                                                        <td>
                                                            {{ $dailyentryDatas['checkinstaff'] }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4"  style="color:green;font-weight:800"> CHECK - OUT</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0" id="bookingout_datatable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Bill.No</th>
                                                    <th>Room Deatails</th>
                                                    <th>Customer</th>
                                                    <th>Staff</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($checkoutData as $keydata => $checkoutDatas)
                                                    <tr>
                                                        <td>{{ ++$keydata }}</td>
                                                        <td>{{ $checkoutDatas['booking_invoiceno'] }}</td>
                                                        <td>
                                                            @foreach ($checkoutDatas['room_lists'] as $index => $room_lists_arr)
                                                                @if ($room_lists_arr['booking_id'] == $checkoutDatas['id'])

                                                                    @if ($room_lists_arr['roomcolor_status'] == 'Couple Orange')
                                                                        <span style="color: orange;">{{ $room_lists_arr['room'] }}<br /></span>

                                                                    @elseif($room_lists_arr['roomcolor_status'] == 'Couple Pink')
                                                                        <span style="color: #e560c1;">{{ $room_lists_arr['room'] }}<br /></span>

                                                                    @elseif($room_lists_arr['roomcolor_status'] == 'Booked Red')
                                                                        <span style="color: red;">{{ $room_lists_arr['room'] }}<br /></span>

                                                                    @elseif($room_lists_arr['roomcolor_status'] == 'Booked Green')
                                                                        <span style="color: green;">{{ $room_lists_arr['room'] }}<br /></span>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{ $checkoutDatas['customer_name'] }}
                                                        </td>
                                                        <td>
                                                            {{ $checkoutDatas['checkoutstaff'] }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>



                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                    <h4 class="card-title mb-4"  style="color:green;font-weight:800">TODAY PAYMENT HISTORY</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0" id="bookingpayment_datatable">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>BillNo</th>
                                                <th>Customer</th>
                                                <th>Staff</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($todayPaymentData as $keydata => $todayPaymentDatas)
                                                <tr>
                                                    <td>{{ ++$keydata }}</td>
                                                    <td>{{ $todayPaymentDatas['booking_invoiceno'] }}</td>
                                                    <td>{{ $todayPaymentDatas['customer_name'] }}</td>
                                                    <td>{{ $todayPaymentDatas['staffname'] }}</td>
                                                    <td>{{ $todayPaymentDatas['payable_amount'] }}</td>
                                                    <td>{{ $todayPaymentDatas['payment_method'] }}</td>
                                                </tr>
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
    </div>

    <script>
        $(document).ready(function() {
            $('#bookingout_datatable').DataTable();
        });
        $(document).ready(function() {
            $('#booking_datatable').DataTable();
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
