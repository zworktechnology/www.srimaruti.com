@extends('layouts.auth')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Update Profile</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('change.profile') }}" autocomplete="off">
                                @csrf

                                <div class="col-sm-9">
                                    @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                </div>

                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                        Name </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}" name="name" placeholder="Enter Your ">
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Update</button>
                                        </div>
                                    </div>
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
