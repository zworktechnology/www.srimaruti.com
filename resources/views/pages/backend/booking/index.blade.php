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
                                        <a href="#paybalance{{ $bookingDatas['id'] }}" data-bs-toggle="modal" data-id="{{ $bookingDatas['id'] }}" class="btn btn-sm btn-success paybalance{{ $bookingDatas['id'] }}" data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Checkout</a>
                                        <div class="modal fade" id="paybalance{{ $bookingDatas['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                            @include('pages.backend.booking.checkout')
                                        </div>   
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
