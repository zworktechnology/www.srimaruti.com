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
                            <table id="booking_datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width:10%;">Sl. No</th>
                                        <th style="width:15%;">Customer</th>
                                        
                                        <th style="width:20%;">Room Details</th>
                                        <th style="width:20%;">Check In/Out Date</th>
                                        <th style="width:10%;">Amount Paid</th>
                                        <th style="width:25%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookingData as $keydata => $bookingDatas)
                                    @if ($bookingDatas['status'] == '1')
                                    <tr>
                                        <td>{{ ++$keydata }}</td>
                                        <td>

                                            <a href="{{ route('booking.view', ['id' => $bookingDatas['id']]) }}" style="color:#bf24c9; font-weight:600"class="btn btn-sm btn-soft-info"><i class="mdi mdi-card-account-details-star-outline"></i> {{ $bookingDatas['customer_name'] }}</a>
                                        </td>
                                        
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
                                            <span style="color:green">Total : {{ $bookingDatas['grand_total'] }}</span><br/>
                                            <span style="color:#cb540f">
                                                
                                                @foreach ($bookingDatas['terms'] as $index => $terms)
                                                @if ($terms['booking_id'] == $bookingDatas['id'])
                                            {{ $terms['term'] }} - {{ $terms['payable_amount'] }}<br />
                                                @endif
                                                @endforeach
                                            </span>
                                        </td>

                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li>
                                                    <a href="{{ route('booking.edit', ['id' => $bookingDatas['id']]) }}" class="btn btn-sm btn-soft-info">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#jobDelete{{ $bookingDatas['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger" data-bs-target="#firstmodal{{ $bookingDatas['id'] }}">Delete</a>
                                                </li>
                                                @if ($bookingDatas['balance_amount'] != 0)
                                                <li>
                                                    <a href="#paybalance{{ $bookingDatas['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-warning" data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Pay Balance</a>
                                                </li>
                                                @endif

                                                @if ($today == $bookingDatas['chick_out_date'])
                                                    @if ($bookingDatas['balance_amount'] == 0)
                                                    <li>
                                                        <a href="#checkout{{ $bookingDatas['id'] }}" data-bs-toggle="modal" data-id="{{ $bookingDatas['id'] }}" class="btn btn-sm btn-soft-success checkout{{ $bookingDatas['id'] }}" data-bs-target="#checkout{{ $bookingDatas['id'] }}">Checkout</a>
                                                        <div class="modal fade" id="checkout{{ $bookingDatas['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                            @include('pages.backend.booking.checkout')
                                                        </div>  
                                                    </li>
                                                    @endif
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                    @endif
                                    @if ($bookingDatas['balance_amount'] != 0)
                                    <div class="modal fade" id="paybalance{{ $bookingDatas['id'] }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pay Balance Amount</h5>
                                                    <button type="button" class="paybalanceclose btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form autocomplete="off" method="POST" action="{{ route('booking.pay_balance', ['id' => $bookingDatas['id']]) }}">
                                                        @method('PUT')
                                                        @csrf

                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Customer Name </label>
                                                            <div class="col-sm-8">
                                                                <span class="form-control">{{ $bookingDatas['customer_name'] }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Days </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control days" disabled style="color:green" name="days" id="days" value="{{ $bookingDatas['days'] }}" />
                                                                </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Grand Total</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"  class="form-control" style="background: #dfdc7d;" disabled name="grand_total" id="grand_total" value="{{ $bookingDatas['grand_total'] }}" />
                                                                </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Paid Amount </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control paid_amount" style="background: #82e182;" disabled id="paid_amount" value="{{ $bookingDatas['total_paid'] }}"  name="paid_amount"  placeholder="Enter here ">
                                                                </div>
                                                        </div>
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Balance</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control balance_amount" style="background: #e99e9e" id="balance_amount" disabled value="{{ $bookingDatas['balance_amount'] }}"  name="balance_amount"  placeholder="Enter here ">
                                                                </div>
                                                        </div>  
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Term <span style="color: red;">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" name="payment_term" required>
                                                                        <option value=""  selected  class="text-muted">Select</option>
                                                                        
                                                                        <option value="Term II" class="text-muted">Term II</option>
                                                                        <option value="Term III" class="text-muted">Term III</option>
                                                                    </select>
                                                                </div>
                                                        </div>  
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Payment Method <span style="color: red;">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" name="payment_method" required>
                                                                        <option value=""  selected  class="text-muted">Select Payment Via</option>
                                                                        <option value="Cash" class="text-muted">Cash</option>
                                                                        <option value="Card" class="text-muted">Card</option>
                                                                        <option value="Online Payment" class="text-muted">Online Payment</option>
                                                                    </select>
                                                                </div>
                                                        </div> 
                                                        <div class="row mb-4" >
                                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Payable Amount <span style="color: red;">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control payable_amount" id="payable_amount" value=""  name="payable_amount"  placeholder="Enter here ">
                                                                </div>
                                                        </div>
                                                          
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Pay</button>
                                                            <button type="button" class="btn btn-secondary paybalanceclosebutton" data-bs-dismiss="modal">No, Get Back</button>
                                                        </div>                                                           
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                   

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
    $(".paybalanceclose").click(function() {
        window.location.reload();
    });
    $(".paybalanceclosebutton").click(function() {
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
