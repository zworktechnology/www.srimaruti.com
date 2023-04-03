@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Branch</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4 class="mb-1 mt-1">{{ $totalrooms }}</h4>
                                    <p class="text-muted mb-0">Total Rooms</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4 class="mb-1 mt-1">{{ $bookedrooms }}</h4>
                                    <p class="text-muted mb-0">Currently Booked</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4 class="mb-1 mt-1">{{ $openingrooms }}</h4>
                                    <p class="text-muted mb-0">Currently Open</p>
                                </div>
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
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Branch</th>
                                            <th>Floor</th>
                                            <th>Room Details</th>
                                            <th>Price</th>
                                            <th>Booking Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $keydata => $datas)
                                            <tr>
                                                <td>{{ $datas->branch->name }}</td>
                                                <td>{{ $datas->room_floor }}</td>
                                                <td>No. {{ $datas->room_number }} - {{ $datas->room_type }} -
                                                    {{ $datas->room_category }}</td>
                                                <td>₹ {{ $datas->price_per_day }}</td>
                                                @if ($datas->booking_status == 0)
                                                    <td style="color:red">Open</td>
                                                @else
                                                    <td style="color:green">Booked</td>
                                                @endif
                                            </tr>
                                            <div class="modal fade" id="firstmodal{{ $datas->id }}" aria-hidden="true"
                                                aria-labelledby="..." tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-muted font-size-16 mb-4">Please confirm that you
                                                                wish to remove the record - Room No.
                                                                {{ $datas->room_number }} at {{ $datas->branch->name }}.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form autocomplete="off" method="POST"
                                                                action="{{ route('room.delete', ['id' => $datas->id]) }}">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Yes,
                                                                    Delete</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No, Get Back</button>
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
@endsection
