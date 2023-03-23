@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Dashboard - {{ date('d M Y', strtotime($today)) }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li><input type="date" class="form-control" name="date" value="{{ $today }}"></li>
                                <li style="margin-left: 10px;"><button type="submit" class="btn btn-primary">Search</button></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4 class="mb-1 mt-1">₹ <span data-plugin="counterup">{{ $income }}</span></h4>
                                <p class="text-muted mb-0">Total Income</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4 class="mb-1 mt-1">₹ <span data-plugin="counterup">{{ $expense }}</span></h4>
                                <p class="text-muted mb-0">Total Expense</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Accounts Summary</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Branch</th>
                                            <th>Open Account</th>
                                            <th>Income</th>
                                            <th>Expence</th>
                                            <th>Calculation</th>
                                            <th>Close Account</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($branch as $branchs)
                                        <tr>
                                            <td>{{ $branchs->name }}</td>
                                        </tr>
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
</div>
@endsection
