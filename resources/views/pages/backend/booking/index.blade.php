@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Booking</h4>
                        <div class="text-sm-end mt-2 mt-sm-0">
                            <a href="{{ route('booking.create') }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                    New Booking
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

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

            <div class="row" style="display: flex">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="booking_datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width:10%;">Sl. No</th>
                                        <th style="width:20%;">Customer</th>
                                        
                                        <th style="width:25%;">Room Details</th>
                                        <th style="width:10%;">Check In/Out Date</th>
                                        
                                        <th style="width:20%;">Checkout</th>
                                        <th style="width:15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookingData as $keydata => $bookingDatas)
                                    <tr>
                                        <td>{{ ++$keydata }}</td>
                                        <td>{{ $bookingDatas['customer_name'] }} - {{ $bookingDatas['phone_number'] }}</td>
                                        
                                        <td>
                                            @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                            @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                           {{ $bookingDatas['branch'] }} - {{ $room_lists['room'] }}<br />
                                            @endif
                                            @endforeach
                                        </td>
                                        
                                        
                                        <td>CheckIn - {{ date('d M Y', strtotime($bookingDatas['chick_in_date'])) }} - ( {{ date('h:i A', strtotime($bookingDatas['chick_in_time'])) }} )
                                            <br/>
                                            CheckOut - 
                                            @if ($bookingDatas['chick_out_date'] != "")
                                            {{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }} - ( {{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }} )
                                            @endif
                                        </td>
                                        

                                        
                                 
                                       
                                        
                                        
                                        <td>
                                        <a href="#jobpaybalance{{ $bookingDatas['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-success" data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Checkout</a>
                                            </td>
                                       
                                       
                                   

                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li>
                                                    <a href="{{ route('booking.edit', ['id' => $bookingDatas['id']]) }}" class="btn btn-sm btn-soft-info">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#jobDelete{{ $bookingDatas['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger" data-bs-target="#firstmodal{{ $bookingDatas['id'] }}">Delete</a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="paybalance{{ $bookingDatas['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        <div class="modal-dialog  relative w-full h-full max-w-2xl md:h-auto">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Check Out</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form autocomplete="off" method="POST" action="{{ route('booking.pay_balance', ['id' => $bookingDatas['id']]) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Customer Name </label>
                                                            <div class="col-sm-8">
                                                                <span class="form-control">{{ $bookingDatas['customer_name'] }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Room Details </label>
                                                            <div class="col-sm-8">
                                                                <span class="form-control">
                                                                @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                                                {{ $bookingDatas['branch'] }} - {{ $room_lists['room'] }} <br/>
                                                                <input type="hidden" name="booking_room_price[]" id="booking_room_price" value="{{ $room_lists['booking_room_price'] }}" />
                                                                @endif
                                                                @endforeach</span>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Days </label>
                                                            <div class="col-sm-8">
                                                                <span class="form-control" style="color:green">
                                                                @if ($bookingDatas['days'] == 1)
                                                                {{ $bookingDatas['days'] }} Day
                                                                @elseif ($bookingDatas['days'] > 1)
                                                                {{ $bookingDatas['days'] }} Days
                                                                @endif
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Check-in Date </label>
                                                            <div class="col-sm-4">
                                                                <input type="date" class="form-control" disabled id="checkin_date" name="checkin_date" placeholder="Enter here " value="{{ $bookingDatas['chick_in_date'] }}">
                                                                <input type="hidden" class="form-control" id="check_in_date" name="check_in_date" value="{{ date('d M Y', strtotime($bookingDatas['chick_in_date'])) }},{{ date('h:i A', strtotime($bookingDatas['chick_in_time'])) }}">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="time" class="form-control" disabled id="checkin_time" name="checkin_time" placeholder="Enter here " value="{{ $bookingDatas['chick_in_time'] }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Check-out Date <span style="color: red;">*</span></label>

                                                            <div class="col-sm-4">

                                                                @if ($bookingDatas['chick_out_date'] != "")
                                                                    <input type="date"  class="form-control" id="checkout_date" name="checkout_date" placeholder="Enter here " value="{{ $bookingDatas['chick_out_date'] }}">
                                                                @else
                                                                    <input type="date" class="form-control" id="checkout_date" name="checkout_date" placeholder="Enter here " value="{{ $today }}">
                                                                @endif

                                                            </div>

                                                            <div class="col-sm-4">

                                                                @if ($bookingDatas['chick_out_time'] != "")
                                                                    <input type="time" class="form-control" id="checkout_time" name="checkout_time" placeholder="Enter here " value="{{ $bookingDatas['chick_out_time'] }}">
                                                                @else
                                                                    <input type="time" class="form-control" id="checkout_time" name="checkout_time" placeholder="Enter here " value="{{ $timenow }}">
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                No of Days</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" disabled class="form-control no_of_days" name="no_of_days" id="no_of_days" />
                                                            </div>
                                                        </div>


                                                        <input type="hidden" class="booking_room_totprice" name="booking_room_totprice" id="booking_room_totprice" value="" />
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Total Room Cost</label>
                                                            <div class="col-sm-8">
                                                            <input type="number" class="form-control total_room_cost" name="total_room_cost" id="total_room_cost" value="" />
                                                            </div>
                                                        </div>


                                                        
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Total </label>
                                                            <div class="col-sm-8">
                                                                <span class="form-control">₹{{ $bookingDatas['grand_total'] }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Paid Amount </label>
                                                            <div class="col-sm-8">
                                                                <span class="form-control">₹{{ $bookingDatas['payable_amount'] }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                                Balance Amount </label>
                                                            <div class="col-sm-8">
                                                                
                                                                <input type="number" class="form-control balance_amount" style="background-color:#991212;color: white;" id="balance_amount" name="balance_amount" placeholder="Enter here " value="{{ $bookingDatas['balance_amount'] }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Pay</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Get Back</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="checkoutmodal{{ $bookingDatas['id'] }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Check Out</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form autocomplete="off" method="POST" action="{{ route('booking.checkout', ['id' => $bookingDatas['id']]) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="row mb-4" hidden>
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                                Date </label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" name="chick_out_date" required value="{{ $today }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" hidden>
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                                Time </label>
                                                            <div class="col-sm-9">
                                                                <input type="time" class="form-control" name="chick_out_time" required value="{{ $timenow }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-muted font-size-16 mb-4">Please confirm that you wish to check out the customer {{ $bookingDatas['customer_name'] }} - on Room No @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                                                {{ $room_lists['room'] }} on branch {{ $bookingDatas['branch'] }}
                                                                @endif
                                                                @endforeach.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Yes, Check Out</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Get Back</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="firstmodal{{ $bookingDatas['id'] }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the record {{ $bookingDatas['customer_name'] }} - on Room No @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                                        @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                                        {{ $room_lists['room'] }} on branch {{ $bookingDatas['branch'] }}
                                                        @endif
                                                        @endforeach.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form autocomplete="off" method="POST" action="{{ route('booking.delete', ['id' => $bookingDatas['id']]) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Get Back</button>
                                                </div>
                                            </div>
                                        </div>
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



    // Calculate Days
    
    var check_in_date = $("#check_in_date").val();
    
    var current_date = new Date();
    console.log(current_date);
    var checkin_date = new Date (check_in_date);
    console.log(checkin_date);

    //calculate total number of seconds between two dates
    var total_seconds = Math.abs(checkin_date - current_date) / 1000;


    //calculate days difference by dividing total seconds in a day
    var days_difference = Math.floor (total_seconds / (60 * 60 * 24));
    console.log(days_difference); 
    $('.no_of_days').val(days_difference);   


// Get Room Price
    var totalAmount = 0;
    $("input[name='booking_room_price[]']").each(function() {
                        //alert($(this).val());
                        totalAmount = Number(totalAmount) + Number($(this).val());
                        console.log(totalAmount);
                        $('.booking_room_totprice').val(totalAmount);
                    });

    var booking_room_totprice = $(".booking_room_totprice").val();

    var total_room_cost = booking_room_totprice * days_difference;
    $('.total_room_cost').val(total_room_cost);
         

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
