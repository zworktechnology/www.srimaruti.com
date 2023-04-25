@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Dashboard</h4>
                            <div class="page-title-right">
                                <form autocomplete="off" method="POST" action="/dashboard_datefilter" style="display: flex;">
                                @method('PUT')
                                @csrf
                                <ol class="breadcrumb m-0">
                                    <li><input type="date" class="form-control date" name="fromdate"
                                            value="{{ $today }}"></li>
                                    <li><input type="date" class="form-control date" name="todate"
                                            value="{{ $today }}"></li>
                                    <li style="margin-left: 10px;"><button type="submit"
                                            class="btn btn-primary">Search</button></li>
                                </ol>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" hidden>
                    <div class="col-md-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4 class="mb-1 mt-1 income">₹ <span data-plugin="counterup">{{ $income }}</span>
                                    </h4>
                                    <p class="text-muted mb-0">Total Income</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4 class="mb-1 mt-1 expense">₹ <span data-plugin="counterup">{{ $expense }}</span>
                                    </h4>
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
                                                <th>Previous Day Balance</th>
                                                <th>Room Income</th>
                                                <th>Other Income</th>
                                                <th>Online Payment</th>
                                                <th>Expence</th>
                                                <th>Available Amount</th>
                                                <th>Account Closure</th>
                                                <th>Difference</th>
                                            </tr>
                                        </thead>
                                        <tbody id="branchwise_list">

                                            @foreach ($branchwise_list as $branchwise_lists)
                                                <tr>
                                                    <td>{{ $branchwise_lists['branch_name'] }}</td>

                                                    <td>₹ {{ $branchwise_lists['branchwise_openaccount'] }}</td>

                                                    <td href="#roomincome{{ $branchwise_lists['branch_id'] }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#roomincome{{ $branchwise_lists['branch_id'] }}"
                                                        class="pointer">₹ {{ $branchwise_lists['Room_income'] }}</td>

                                                    <td>₹ {{ $branchwise_lists['branchwise_income'] }}</td>

                                                    <td>₹ {{ $branchwise_lists['total_onlinepayment'] }}</td>

                                                    <td>₹ {{ $branchwise_lists['branch_wise_expenses'] }}</td>

                                                    <td>₹ {{ $branchwise_lists['requred_balance'] }}</td>

                                                    <td>₹ {{ $branchwise_lists['branchwise_closeaccount'] }}</td>

                                                    @if ($branchwise_lists['difference'] > 0)
                                                        <td style="color: Green">₹ {{ $branchwise_lists['difference'] }}
                                                        </td>
                                                    @else
                                                        <td style="color: Red">₹ {{ $branchwise_lists['difference'] }}</td>
                                                    @endif

                                                </tr>

                                                <div class="modal fade" id="roomincome{{ $branchwise_lists['branch_id'] }}"
                                                    aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                    @include('pages.components.income')
                                                </div>

                                                <div class="modal fade" id="expence{{ $branchwise_lists['branch_id'] }}"
                                                    aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                    @include('pages.components.expence')
                                                </div>
                                            @endforeach
                                        </tbody>
                                        {{-- <thead class="table-light">
                                            <tr>
                                                <th>Total</th>
                                                <th>₹ {{ $openaccount }}</th>
                                                <th href="#roomincometotal"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#roomincometotal"
                                                    class="pointer">₹ {{ $total_room_icome }}</th>
                                                <th>₹ {{ $income }}</th>
                                                <th href="#expencetotal"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#expencetotal"
                                                    class="pointer">₹ {{ $allbranches_total_expense }}</th>
                                                <th> - </th>
                                                <th>₹ {{ $closeaccount }}</th>
                                                <th> - </th>
                                            </tr>
                                        </thead> --}}
                                    </table>

                                    <div class="modal fade" id="roomincometotal"
                                        aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        @include('pages.components.totalincome')
                                    </div>

                                    <div class="modal fade" id="expencetotal"
                                        aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        @include('pages.components.totalexpance')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript">
        $(document).ready(function() {
            $(".home_search").click(function() {
                var date = $('.date').val();


                $.ajax({
                    url: '/getBranchwiseList/' + date,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('#branchwise_list').html('');
                        $('.income').html('');
                        $('.expense').html('');

                        var len = response.length;
                        console.log(len);

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {




                                var column_0 = $('<td/>', {
                                    html: response[i].branch_name
                                });
                                var column_1 = $('<td/>', {
                                    html: response[i].Room_income
                                });
                                var column_2 = $('<td/>', {
                                    html: response[i].branchwise_income
                                });

                                var column_3 = $('<td/>', {
                                    html: response[i].branchwise_expense
                                });
                                var column_4 = $('<td/>', {
                                    html: response[i].balance
                                });

                                var row = $('<tr id=stages_tr/>', {}).append(column_0,
                                    column_1, column_2, column_3, column_4);

                                $('#branchwise_list').append(row);

                                $('.income').html(response[i].income);
                                $('.expense').html(response[i].expense);

                            }
                        }
                        //        if (response['data'][i].booking_status != 1) {

                        //            var id = response['data'][i].id;
                        //            var name = 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type;
                        //            var option = "<option value='" + id + "'>" + name + "</option>";

                        //            var price = response['data'][i].price_per_day;
                        //            selectedValues.push(option);
                        //        }



                    }
                });
            });
        });
    </script>
@endsection
