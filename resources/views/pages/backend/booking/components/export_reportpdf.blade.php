@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Report</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('booking.print_reportpdf') }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                    {{ __('messages.branch_title') }} <span style="color: red;">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control branch_id" name="branch_id" id="branch_id"
                                                        required>
                                                        <option value="" selected hiddden>Select One</option>
                                                        @foreach ($branch as $branchs)
                                                            <option value="{{ $branchs->id }}">{{ $branchs->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        From Date <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control" name="from_date"
                                                            placeholder="Enter here " required>
                                                    </div>
                                                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                        To Date <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control" name="to_date"
                                                            placeholder="Enter here " required>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
