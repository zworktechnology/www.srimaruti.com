@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Update room</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form autocomplete="off" method="POST" action="{{ route('room.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Branch </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="branch_id" required>
                                                    <option value="" disabled selected hidden class="text-muted">
                                                        Select Branch</option>
                                                    @foreach ($branch as $branchs)
                                                    <option value="{{ $branchs->id }}" @if ($branchs->id === $data->branch_id) selected='selected' @endif>{{ $branchs->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Floor </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="room_floor" placeholder="Enter floor " value="{{ $data->room_floor }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Number </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="room_number" placeholder="Enter room number " value="{{ $data->room_number }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Type </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="room_type" required>
                                                    <option value="" disabled selected hidden class="text-muted">Select Type</option>
                                                    <option value="A/C" class="text-muted" {{ $data->room_type == "A/C" ? 'selected' : '' }}>A/C</option>
                                                    <option value="Non A/C" class="text-muted" {{ $data->room_type == "Non A/C" ? 'selected' : '' }}>Non A/C</option>
                                                </select>
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
