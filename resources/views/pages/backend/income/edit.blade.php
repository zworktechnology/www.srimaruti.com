@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Update income</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form autocomplete="off" method="POST" action="{{ route('income.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Date <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date" placeholder="Enter floor " value="{{ $data->date }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Branch <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="branch_id" required>
                                                    <option value="" disabled selected hidden class="text-muted">
                                                        Select branch</option>
                                                    @foreach ($branch as $branchs)
                                                    <option value="{{ $branchs->id }}" @if ($branchs->id === $data->branch_id) selected='selected' @endif>{{ $branchs->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Name <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="namelist_id" required>
                                                    <option value="" disabled selected hidden class="text-muted">
                                                        Select Name</option>
                                                    @foreach ($namelist as $namelists)
                                                    <option value="{{ $namelists->id }}" @if ($namelists->id === $data->namelist_id) selected='selected' @endif>{{ $namelists->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Amount <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="amount" placeholder="Enter amount " value="{{ $data->amount }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Note </label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="note" placeholder="Enter note ">{!! $data->note !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
