@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Booking</h4>
                        <div class="text-sm-end mt-2 mt-sm-0">
                            <a href="{{ route('booking.create') }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                    New Booking
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if (\Session::has('add'))
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <i class="uil uil-pen me-2"></i>
                {!! \Session::get('add') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
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
                            <table id="booking_datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width:5%;">Sl. No</th>
                                        <th style="width:15%;">Customer</th>
                                        <th style="width:10%;">Branch</th>
                                        <th style="width:25%;">Room Details</th>
                                        <th style="width:10%;">Booking Date</th>
                                        <th style="width:10%;">Check-In Date</th>
                                        <th style="width:10%;">Check-Out Date</th>
                                        <th style="width:15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($bookingData as $keydata => $bookingDatas)
                                    <tr>
                                        <td>{{ ++$keydata }}</td>
                                    <td>{{ $bookingDatas['customer_name'] }}</td>
                                    <td style="color:Blue;" class="text-bold">{{ $bookingDatas['branch'] }}</td>
                                    <td>
                                        
                                            @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                                @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                                    {{ $room_lists['room'] }}<br/>
                                                   
                                                @endif
                                            @endforeach
                                            
                                    
                                    
                                    </td>
                                    <td><input type="hidden" name="booking_id" id="booking_id" value="{{ $bookingDatas['id'] }}"/>
                                        {{ $bookingDatas['booking_date'] }}
                                    <br/>{{ $bookingDatas['booking_time'] }}</td>

                                    @if ($bookingDatas['chick_in_date'] != '')
                                    <td>{{ $bookingDatas['chick_in_date'] }}
                                    <br/>{{ $bookingDatas['checkin_time'] }}
                                    </td>
                                    @else
                                    <td><a href="#jobcheckin{{ $bookingDatas['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-success" data-bs-target="#checkinmodal{{ $bookingDatas['id'] }}">Click to Checkin</a></td>
                                    @endif
                                    
                                        
                                    
                                    


                                    
                                    <td><input type="button" class="btn btn-sm text-white" style="background-color:#f46a6a" name="" value="Click to Checkout" /></td>
                                    
                                    
                                    
                                    <td>
                                        <ul class="list-unstyled hstack gap-1 mb-0">
                                            <li>
                                                <a href="{{ route('booking.edit', ['id' => $bookingDatas['id']]) }}" class="btn btn-sm btn-soft-info">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#jobDelete{{ $bookingDatas['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger" data-bs-target="#firstmodal{{ $bookingDatas['id'] }}">Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                    </tr>

                                    <div class="modal fade" id="checkinmodal{{ $bookingDatas['id'] }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Checkin</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form autocomplete="off" method="POST" action="{{ route('booking.checkin', ['id' => $bookingDatas['id']]) }}">
                                                        @method('PUT')
                                                        @csrf
                                                    <div class="row  col-12  py-2">
                                                        <label for="date" class="col-md-4 col-form-label">
                                                            Customer Name</label>
                                                        <div class=" col-md-6">
                                                            <input class="form-control" name="" disabled required value="{{ $bookingDatas['customer_name'] }}">
                                                        </div>
                                                    </div> 
                                                    <div class="row  col-12  py-2">
                                                        <label for="date" class="col-md-4 col-form-label">
                                                            Branch</label>
                                                        <div class=" col-md-6">
                                                            <input class="form-control" name="" disabled required value="{{ $bookingDatas['branch'] }}">
                                                        </div>
                                                    </div>  
                                                     
                                                    <div class="row  col-12  py-2">
                                                        <label for="date" class="col-md-4 col-form-label">
                                                            Date</label>
                                                        <div class=" col-md-6">
                                                            <input type="date" class="form-control" name="checkindate"  required value="{{ $today }}">
                                                        </div>
                                                    </div>
                                                    <div class="row col-12 py-2">
                                                        <label for="date" class="col-md-4 col-form-label">
                                                            Time</label>
                                                        <div class=" col-md-2">
                                                            <select class="form-control" name="checkin_time" required>
                                                                <option value="" disabled selected hidden class="text-muted">Time</option>
                                                                <option value="1" class="text-muted">1</option>
                                                                <option value="2" class="text-muted">2</option>
                                                                <option value="3" class="text-muted">3</option>
                                                                <option value="4" class="text-muted">4</option>
                                                                <option value="5" class="text-muted">5</option>
                                                                <option value="6" class="text-muted">6</option>
                                                                <option value="7" class="text-muted">7</option>
                                                                <option value="8" class="text-muted">8</option>
                                                                <option value="9" class="text-muted">9</option>
                                                                <option value="10" class="text-muted">10</option>
                                                                <option value="11" class="text-muted">11</option>
                                                                <option value="12" class="text-muted">12</option>
                                                            </select>
                                                        </div>
                                                        <div class=" col-md-2">
                                                            <select class="form-control" name="checkin_minute" required>
                                                                <option value="" disabled selected hidden class="text-muted">Minute</option>
                                                                <option value="00" class="text-muted">00</option>
                                                                <option value="01" class="text-muted">01</option>
                                                                <option value="02" class="text-muted">02</option>
                                                                <option value="03" class="text-muted">03</option>
                                                                <option value="04" class="text-muted">04</option>
                                                                <option value="05" class="text-muted">05</option>
                                                                <option value="06" class="text-muted">06</option>
                                                                <option value="07" class="text-muted">07</option>
                                                                <option value="08" class="text-muted">08</option>
                                                                <option value="09" class="text-muted">09</option>
                                                                <option value="10" class="text-muted">10</option>
                                                                <option value="11" class="text-muted">11</option>
                                                                <option value="12" class="text-muted">12</option>
                                                                <option value="13" class="text-muted">13</option>
                                                                <option value="14" class="text-muted">14</option>
                                                                <option value="15" class="text-muted">15</option>
                                                                <option value="16" class="text-muted">16</option>
                                                                <option value="17" class="text-muted">17</option>
                                                                <option value="18" class="text-muted">18</option>
                                                                <option value="19" class="text-muted">19</option>
                                                                <option value="20" class="text-muted">20</option>
                                                                <option value="21" class="text-muted">21</option>
                                                                <option value="22" class="text-muted">22</option>
                                                                <option value="23" class="text-muted">23</option>
                                                                <option value="24" class="text-muted">24</option>
                                                                <option value="25" class="text-muted">25</option>
                                                                <option value="26" class="text-muted">26</option>
                                                                <option value="27" class="text-muted">27</option>
                                                                <option value="28" class="text-muted">28</option>
                                                                <option value="29" class="text-muted">29</option>
                                                                <option value="30" class="text-muted">30</option>
                                                                <option value="31" class="text-muted">31</option>
                                                                <option value="32" class="text-muted">32</option>
                                                                <option value="33" class="text-muted">33</option>
                                                                <option value="34" class="text-muted">34</option>
                                                                <option value="35" class="text-muted">35</option>
                                                                <option value="36" class="text-muted">36</option>
                                                                <option value="37" class="text-muted">37</option>
                                                                <option value="38" class="text-muted">38</option>
                                                                <option value="39" class="text-muted">39</option>
                                                                <option value="40" class="text-muted">40</option>
                                                                <option value="41" class="text-muted">41</option>
                                                                <option value="42" class="text-muted">42</option>
                                                                <option value="43" class="text-muted">43</option>
                                                                <option value="44" class="text-muted">44</option>
                                                                <option value="45" class="text-muted">45</option>
                                                                <option value="46" class="text-muted">46</option>
                                                                <option value="47" class="text-muted">47</option>
                                                                <option value="48" class="text-muted">48</option>
                                                                <option value="49" class="text-muted">49</option>
                                                                <option value="50" class="text-muted">50</option>
                                                                <option value="51" class="text-muted">51</option>
                                                                <option value="52" class="text-muted">52</option>
                                                                <option value="53" class="text-muted">53</option>
                                                                <option value="54" class="text-muted">54</option>
                                                                <option value="55" class="text-muted">55</option>
                                                                <option value="56" class="text-muted">56</option>
                                                                <option value="57" class="text-muted">57</option>
                                                                <option value="58" class="text-muted">58</option>
                                                                <option value="59" class="text-muted">59</option>
                                                            </select>
                                                        </div>
                                                        <div class=" col-md-2">
                                                            <select class="form-control" name="checkin_minute_ampm" required>
                                                                <option value="" disabled selected hidden class="text-muted">AM/PM</option>
                                                                <option value="AM" class="text-muted">AM</option>
                                                                <option value="PM" class="text-muted">PM</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    
                                                    
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="modal fade" id="firstmodal{{ $bookingDatas['id'] }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the record {{ $bookingDatas['branch'] }}.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form autocomplete="off" method="POST" action="{{ route('booking.delete', ['id' => $bookingDatas['id']]) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Get Back</button>
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
                $('#booking_datatable').DataTable();
            });
            
//$(document).ready(function() {
  //  $(".clicktocheckin").click(function() {
        //alert('');
   //     var clicktocheckin = this.value;
   //     var booking_id = $('#booking_id').val();
   //     console.log(booking_id);

   //             $.ajax({
    //                url: '/AddCheckin/',
   //                 type: 'get',
  //                  data: {
   //                     _token: "{{ csrf_token() }}",
   //                     clicktocheckin: clicktocheckin,
   //                     booking_id: booking_id
   //                 },
    //                dataType: 'json',
   //                 success: function(response) {
   //                     //console.log(response);
   //                     if (response.status == 'success') {
    //                        
   //                         alert('Checkin record detail successfully added');
   //                         location.reload();
  //                      }
   //                 
   //                 }
   //             });
  //  });
//});
        </script>
@endsection
