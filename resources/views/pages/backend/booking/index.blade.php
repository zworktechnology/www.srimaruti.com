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
                                        <th style="width:5%;">Sl. No</th>
                                        <th style="width:15%;">Customer</th>
                                        <th style="width:10%;">Branch</th>
                                        <th style="width:25%;">Room Details</th>
                                        <th style="width:10%;">Booking Date</th>
                                        <th style="width:10%;">Check-In Date</th>
                                        <th style="width:10%;">Check-Out Date</th>
                                        <th style="width:15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($bookingData as $keydata => $bookingDatas)
                                    <tr>
                                        <td>{{ ++$keydata }}</td>
                                    <td>{{ $bookingDatas['customer_name'] }}</td>
                                    <td style="color:Blue;" class="text-bold">{{ $bookingDatas['branch'] }}</td>
                                    <td>
                                        <table class="table table-bordered dt-responsive nowrap">
                                            <tbody id="bookingroomsrow{{ $bookingDatas['id'] }}">

                                            </tbody>
                                        </table>
                                    
                                    
                                    
                                    </td>
                                    <td><input type="hidden" name="booking_id" id="booking_id" value="{{ $bookingDatas['id'] }}"/>
                                        {{ $bookingDatas['booking_date'] }}</td>

                                    @if ($bookingDatas['chick_in_date'] == NULL)
                                    <td>
                                        <input type="button" class="btn btn-sm btn-success clicktocheckin" name="clicktocheckin" value="ClicktoCheckin" /></td>
                                    @else
                                    <td>{{ $bookingDatas['chick_in_date'] }}</td>
                                    @endif


                                    
                                    <td><input type="button" class="btn btn-sm text-white" style="background-color:#f46a6a" name="" value="Click to Checkout" /></td></td>
                                    
                                    
                                    
                                    <td>
                                        <ul class="list-unstyled hstack gap-1 mb-0">
                                            <li>
                                                <a href="{{ route('room.edit', ['id' => $bookingDatas['id']]) }}" class="btn btn-sm btn-soft-info">Edit</a>
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
                                                    <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the record {{ $bookingDatas['branch'] }}.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form autocomplete="off" method="POST" action="{{ route('room.delete', ['id' => $bookingDatas['id']]) }}">
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
            
$(document).ready(function() {
    $(".clicktocheckin").click(function() {
        //alert('');
        var clicktocheckin = this.value;
        var booking_id = $('#booking_id').val();
        console.log(booking_id);

                $.ajax({
                    url: '/AddCheckin/',
                    type: 'get',
                    data: {
                        _token: "{{ csrf_token() }}",
                        clicktocheckin: clicktocheckin,
                        booking_id: booking_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response);
                        if (response.status == 'success') {
                            
                            alert('Checkin record detail successfully added');
                            location.reload();
                        }
                    
                    }
                });
    });
});
        </script>
@endsection
