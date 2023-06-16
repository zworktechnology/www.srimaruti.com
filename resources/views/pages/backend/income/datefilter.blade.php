@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Income</h4>
                            <div class="page-title-right">

                                <ol class="breadcrumb m-0">
                                    <form autocomplete="off" method="POST"
                                        action="{{ route('income.datefilter', ['user_branch_id' => $user_branch_id]) }}"
                                        style="display: flex;">
                                        @method('PUT')
                                        @csrf

                                        <li style="margin-left: 10px;"><input type="date" name="date" required
                                                class="form-control date" value="{{ $date }}"></li>
                                        <li style="margin-left: 10px;"><button type="submit"
                                                class="btn btn-primary home_search">Search</button></li>
                                        <li style="margin-left: 10px;">
                                            <a href="{{ route('income.index', ['user_branch_id' => $user_branch_id]) }}">
                                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                                    Back
                                                </button>
                                            </a>
                                        </li>
                                    </form>
                                </ol>

                            </div>

                        </div>
                    </div>
                </div>




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
                                <table id="incomedatatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl. No</th>
                                            <th>Date</th>
                                            <th>Branch</th>
                                            <th>Expence to</th>
                                            <th>Manager</th>
                                            <th>Amount</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($income_arr as $keydata => $income_array)
                                            <tr>
                                                <td>{{ ++$keydata }}</td>
                                                <td>{{ $income_array['date'] }}</td>
                                                <td>{{ $income_array['branch'] }}</td>
                                                <td>{{ $income_array['namelist'] }}</td>
                                                <td>{{ $income_array['staff'] }}</td>
                                                <td>₹ {{ $income_array['amount'] }}</td>
                                                <td>{{ $income_array['note'] }}</td>
                                                <td>
                                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                                        <li>
                                                            <a href="{{ route('income.edit', ['id' => $income_array['id']]) }}"
                                                                class="btn btn-sm btn-soft-info">Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="#jobDelete{{ $income_array['id'] }}"
                                                                data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"
                                                                data-bs-target="#firstmodal{{ $income_array['id'] }}">Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="firstmodal{{ $income_array['id'] }}"
                                                aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-muted font-size-16 mb-4">Please confirm that you
                                                                wish to remove the record - Amount of ₹
                                                                {{ $income_array['id'] }}.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form autocomplete="off" method="POST"
                                                                action="{{ route('income.delete', ['id' => $income_array['id']]) }}">
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
    <script>
        $(document).ready(function() {
            $('#incomedatatable').DataTable();
        });
    </script>
@endsection
