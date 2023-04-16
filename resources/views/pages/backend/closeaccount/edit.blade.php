@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Update Open Account</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form autocomplete="off" method="POST" action="{{ route('closeaccount.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
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
                                                Closer Name </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="closer_name" placeholder="Enter closer name *" value="{{ $data->closer_name }}" required>
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
                                                2000 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_2000" placeholder="Enter 2000 " value="{{ $data->count_2000 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                500 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_500" placeholder="Enter 500 " value="{{ $data->count_500 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                200 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_200" placeholder="Enter 200 " value="{{ $data->count_200 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                100 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_100" placeholder="Enter 100 " value="{{ $data->count_100 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                50 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_50" placeholder="Enter 50 " value="{{ $data->count_50 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                20 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_20" placeholder="Enter 20 " value="{{ $data->count_20 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                10 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_10" placeholder="Enter 10 " value="{{ $data->count_10 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                5 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_5" placeholder="Enter 5 " value="{{ $data->count_5 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                2 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_2" placeholder="Enter 2 " value="{{ $data->count_2 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                1 <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="count_1" placeholder="Enter 1 " value="{{ $data->count_1 }}" required>
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
