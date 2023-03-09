@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Close Account</h4>
                        <div class="text-sm-end mt-2 mt-sm-0" hidden>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Add new
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                @include('pages.backend.closeaccount.create')
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
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl. No</th>
                                        <th>Date</th>
                                        <th>Branch</th>
                                        <th>2000</th>
                                        <th>500</th>
                                        <th>200</th>
                                        <th>100</th>
                                        <th>50</th>
                                        <th>20</th>
                                        <th>10</th>
                                        <th>5</th>
                                        <th>2</th>
                                        <th>1</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $keydata => $datas)
                                    <tr>
                                        <td>{{ ++$keydata }}</td>
                                        <td>{{ date('d M, Y', strtotime($datas->date)) }}</td>
                                        <td>{{ $datas->branch->name }}</td>
                                        <td>{{ $datas->count_2000 }} = {{ 2000 * $datas->count_2000 }}</td>
                                        <td>{{ $datas->count_500 }} = {{ 500 * $datas->count_500 }}</td>
                                        <td>{{ $datas->count_200 }} = {{ 200 * $datas->count_200 }}</td>
                                        <td>{{ $datas->count_100 }} = {{ 100 * $datas->count_100 }}</td>
                                        <td>{{ $datas->count_50 }} = {{ 50 * $datas->count_50 }}</td>
                                        <td>{{ $datas->count_20 }} = {{ 20 * $datas->count_20 }}</td>
                                        <td>{{ $datas->count_10 }} = {{ 10 * $datas->count_10 }}</td>
                                        <td>{{ $datas->count_5 }} = {{ 5 * $datas->count_5 }}</td>
                                        <td>{{ $datas->count_2 }} = {{ 2 * $datas->count_2 }}</td>
                                        <td>{{ $datas->count_1 }} = {{ 1 * $datas->count_1 }}</td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li>
                                                    <a href="{{ route('closeaccount.edit', ['id' => $datas->id]) }}" class="btn btn-sm btn-soft-info">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#jobDelete{{ $datas->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger" data-bs-target="#firstmodal">Delete</a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the record - Amount of ₹ {{ $datas->amount }}.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form autocomplete="off" method="POST" action="{{ route('closeaccount.delete', ['id' => $datas->id]) }}">
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
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            @include('pages.backend.closeaccount.create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
