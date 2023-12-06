@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Bill To Bill Export as PDF</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('booking.billtobill_printexportpdf') }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <div class="row mb-4">


                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                {{ __('messages.branch_title') }} <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <select class="form-control billtobll_branchid"
                                                        name="billtobll_branchid" id="billtobll_branchid" required>
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
                                                {{ __('messages.from_billno') }} <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <select class="form-control from_billno"
                                                        name="from_billno" id="from_billno" required>
                                                        <option value="" selected hiddden>Select One</option>
                                                        
                                                    </select>
                                                </div>
                                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                {{ __('messages.to_billno') }} <span style="color: red;">*</span> </label>
                                                <div class="col-sm-4">
                                                    <select class="form-control to_billno"
                                                        name="to_billno" id="to_billno" required>
                                                        <option value="" selected hiddden>Select One</option>
                                                       
                                                    </select>
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


<script>
    $(document).on('change', '.billtobll_branchid', function() {
        var billtobll_branchid = $(this).val();
                $.ajax({
                       url: '/getbillarrayby_branchid/',
                       type: 'get',
                       data: {
                           _token: "{{ csrf_token() }}",
                           billtobll_branchid: billtobll_branchid,
                       },
                       dataType: 'json',
                       success: function(response) {
                           console.log(response['data']);
                           var len = response['data'].length;
                           $('.from_billno').empty();
                           $('.to_billno').empty();

                           var $select = $(".from_billno").append(
                               $('<option>', {
                                   value: '0',
                                   text: 'Select'
                               }));
                           $(".from_billno").append($select);

                           for (var i = 0; i < len; i++) {
                               $(".from_billno").append($('<option>', {
                                   value: response['data'][i].id,
                                   text: response['data'][i].booking_invoiceno
                               }));
                           }


                           var $select = $(".to_billno").append(
                               $('<option>', {
                                   value: '0',
                                   text: 'Select'
                               }));
                           $(".to_billno").append($select);

                           for (var i = 0; i < len; i++) {
                               $(".to_billno").append($('<option>', {
                                   value: response['data'][i].id,
                                   text: response['data'][i].booking_invoiceno
                               }));
                           }

                       

                       }
                   });
    });
</script>
@endsection
