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
                                                Branch <span style="color: red;">*</span> </label>
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
                                                Floor <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="room_floor" placeholder="Enter floor " value="{{ $data->room_floor }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Room Number <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="room_number" placeholder="Enter room number " value="{{ $data->room_number }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Type <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="room_type" required>
                                                    <option value="" disabled selected hidden class="text-muted">Select Type</option>
                                                    <option value="A/C" class="text-muted" {{ $data->room_type == "A/C" ? 'selected' : '' }}>A/C</option>
                                                    <option value="Non A/C" class="text-muted" {{ $data->room_type == "Non A/C" ? 'selected' : '' }}>Non A/C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Category <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="room_category" required>
                                                    <option value="" disabled selected hidden class="text-muted">Select Category</option>
                                                    <option value="Single" class="text-muted" {{ $data->room_category == "Single" ? 'selected' : '' }}>Single</option>
                                                    <option value="Double" class="text-muted" {{ $data->room_category == "Double" ? 'selected' : '' }}>Double</option>
                                                    <option value="Triple" class="text-muted" {{ $data->room_category == "Triple" ? 'selected' : '' }}>Triple</option>
                                                    <option value="Quad" class="text-muted" {{ $data->room_category == "Quad" ? 'selected' : '' }}>Quad</option>
                                                    <option value="Service Apartment" class="text-muted" {{ $data->room_category == "Service Apartment" ? 'selected' : '' }}>Service Apartment</option>
                                                    <option value="Suite" class="text-muted" {{ $data->room_category == "Suite" ? 'selected' : '' }}>Suite</option>
                                                    <option value="Family" class="text-muted" {{ $data->room_category == "Family" ? 'selected' : '' }}>Family</option>
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
