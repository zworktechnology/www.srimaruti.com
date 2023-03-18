@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">New Booking</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form autocomplete="off" method="POST" action="{{ route('booking.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Customer Name </label>
                                            <div class="col-sm-9">
                                                <input type="name" class="form-control" name="booking_customer_name" placeholder="Enter here " value="{{ $data->customer_name }}">
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Booking Date </label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="booking_date" placeholder="Enter here " value="{{ $data->booking_date }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Booking Time </label>
                                                <div class="col-sm-1">
                                                    <select class="form-control" name="booking_time" required>
                                                        <option value="" disabled selected hidden class="text-muted">Time</option>
                                                        <option value="1"{{ $data->booking_time == '1' ? 'selected' : '' }} class="text-muted">1</option>
                                                        <option value="2"{{ $data->booking_time == '2' ? 'selected' : '' }} class="text-muted">2</option>
                                                        <option value="3"{{ $data->booking_time == '3' ? 'selected' : '' }} class="text-muted">3</option>
                                                        <option value="4"{{ $data->booking_time == '4' ? 'selected' : '' }} class="text-muted">4</option>
                                                        <option value="5"{{ $data->booking_time == '5' ? 'selected' : '' }} class="text-muted">5</option>
                                                        <option value="6"{{ $data->booking_time == '6' ? 'selected' : '' }} class="text-muted">6</option>
                                                        <option value="7"{{ $data->booking_time == '7' ? 'selected' : '' }} class="text-muted">7</option>
                                                        <option value="8"{{ $data->booking_time == '8' ? 'selected' : '' }} class="text-muted">8</option>
                                                        <option value="9"{{ $data->booking_time == '9' ? 'selected' : '' }} class="text-muted">9</option>
                                                        <option value="10"{{ $data->booking_time == '10' ? 'selected' : '' }} class="text-muted">10</option>
                                                        <option value="11"{{ $data->booking_time == '11' ? 'selected' : '' }} class="text-muted">11</option>
                                                        <option value="12"{{ $data->booking_time == '12' ? 'selected' : '' }} class="text-muted">12</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <select class="form-control" name="booking_minute" required>
                                                        <option value="" disabled selected hidden class="text-muted">Minute</option>
                                                        <option value="00"{{ $data->booking_minute == '00' ? 'selected' : '' }} class="text-muted">00</option>
                                                        <option value="01"{{ $data->booking_minute == '01' ? 'selected' : '' }} class="text-muted">01</option>
                                                        <option value="02"{{ $data->booking_minute == '02' ? 'selected' : '' }} class="text-muted">02</option>
                                                        <option value="03"{{ $data->booking_minute == '03' ? 'selected' : '' }} class="text-muted">03</option>
                                                        <option value="04"{{ $data->booking_minute == '04' ? 'selected' : '' }} class="text-muted">04</option>
                                                        <option value="05"{{ $data->booking_minute == '05' ? 'selected' : '' }} class="text-muted">05</option>
                                                        <option value="06"{{ $data->booking_minute == '06' ? 'selected' : '' }} class="text-muted">06</option>
                                                        <option value="07"{{ $data->booking_minute == '07' ? 'selected' : '' }} class="text-muted">07</option>
                                                        <option value="08"{{ $data->booking_minute == '08' ? 'selected' : '' }} class="text-muted">08</option>
                                                        <option value="09"{{ $data->booking_minute == '09' ? 'selected' : '' }} class="text-muted">09</option>
                                                        <option value="10"{{ $data->booking_minute == '10' ? 'selected' : '' }} class="text-muted">10</option>
                                                        <option value="11"{{ $data->booking_minute == '11' ? 'selected' : '' }} class="text-muted">11</option>
                                                        <option value="12"{{ $data->booking_minute == '12' ? 'selected' : '' }} class="text-muted">12</option>
                                                        <option value="13"{{ $data->booking_minute == '13' ? 'selected' : '' }} class="text-muted">13</option>
                                                        <option value="14"{{ $data->booking_minute == '14' ? 'selected' : '' }} class="text-muted">14</option>
                                                        <option value="15"{{ $data->booking_minute == '15' ? 'selected' : '' }} class="text-muted">15</option>
                                                        <option value="16"{{ $data->booking_minute == '16' ? 'selected' : '' }} class="text-muted">16</option>
                                                        <option value="17"{{ $data->booking_minute == '17' ? 'selected' : '' }} class="text-muted">17</option>
                                                        <option value="18"{{ $data->booking_minute == '18' ? 'selected' : '' }} class="text-muted">18</option>
                                                        <option value="19"{{ $data->booking_minute == '19' ? 'selected' : '' }} class="text-muted">19</option>
                                                        <option value="20"{{ $data->booking_minute == '20' ? 'selected' : '' }} class="text-muted">20</option>
                                                        <option value="21"{{ $data->booking_minute == '21' ? 'selected' : '' }} class="text-muted">21</option>
                                                        <option value="22"{{ $data->booking_minute == '22' ? 'selected' : '' }} class="text-muted">22</option>
                                                        <option value="23"{{ $data->booking_minute == '23' ? 'selected' : '' }} class="text-muted">23</option>
                                                        <option value="24"{{ $data->booking_minute == '24' ? 'selected' : '' }} class="text-muted">24</option>
                                                        <option value="25"{{ $data->booking_minute == '25' ? 'selected' : '' }} class="text-muted">25</option>
                                                        <option value="26"{{ $data->booking_minute == '26' ? 'selected' : '' }} class="text-muted">26</option>
                                                        <option value="27"{{ $data->booking_minute == '27' ? 'selected' : '' }} class="text-muted">27</option>
                                                        <option value="28"{{ $data->booking_minute == '28' ? 'selected' : '' }} class="text-muted">28</option>
                                                        <option value="29"{{ $data->booking_minute == '29' ? 'selected' : '' }} class="text-muted">29</option>
                                                        <option value="30"{{ $data->booking_minute == '30' ? 'selected' : '' }} class="text-muted">30</option>
                                                        <option value="31"{{ $data->booking_minute == '31' ? 'selected' : '' }} class="text-muted">31</option>
                                                        <option value="32"{{ $data->booking_minute == '32' ? 'selected' : '' }} class="text-muted">32</option>
                                                        <option value="33"{{ $data->booking_minute == '33' ? 'selected' : '' }} class="text-muted">33</option>
                                                        <option value="34"{{ $data->booking_minute == '34' ? 'selected' : '' }} class="text-muted">34</option>
                                                        <option value="35"{{ $data->booking_minute == '35' ? 'selected' : '' }} class="text-muted">35</option>
                                                        <option value="36"{{ $data->booking_minute == '36' ? 'selected' : '' }} class="text-muted">36</option>
                                                        <option value="37"{{ $data->booking_minute == '37' ? 'selected' : '' }} class="text-muted">37</option>
                                                        <option value="38"{{ $data->booking_minute == '38' ? 'selected' : '' }} class="text-muted">38</option>
                                                        <option value="39"{{ $data->booking_minute == '39' ? 'selected' : '' }} class="text-muted">39</option>
                                                        <option value="40"{{ $data->booking_minute == '40' ? 'selected' : '' }} class="text-muted">40</option>
                                                        <option value="41"{{ $data->booking_minute == '41' ? 'selected' : '' }} class="text-muted">41</option>
                                                        <option value="42"{{ $data->booking_minute == '42' ? 'selected' : '' }} class="text-muted">42</option>
                                                        <option value="43"{{ $data->booking_minute == '43' ? 'selected' : '' }} class="text-muted">43</option>
                                                        <option value="44"{{ $data->booking_minute == '44' ? 'selected' : '' }} class="text-muted">44</option>
                                                        <option value="45"{{ $data->booking_minute == '45' ? 'selected' : '' }} class="text-muted">45</option>
                                                        <option value="46"{{ $data->booking_minute == '46' ? 'selected' : '' }} class="text-muted">46</option>
                                                        <option value="47"{{ $data->booking_minute == '47' ? 'selected' : '' }} class="text-muted">47</option>
                                                        <option value="48"{{ $data->booking_minute == '48' ? 'selected' : '' }} class="text-muted">48</option>
                                                        <option value="49"{{ $data->booking_minute == '49' ? 'selected' : '' }} class="text-muted">49</option>
                                                        <option value="50"{{ $data->booking_minute == '50' ? 'selected' : '' }} class="text-muted">50</option>
                                                        <option value="51"{{ $data->booking_minute == '51' ? 'selected' : '' }} class="text-muted">51</option>
                                                        <option value="52"{{ $data->booking_minute == '52' ? 'selected' : '' }} class="text-muted">52</option>
                                                        <option value="53"{{ $data->booking_minute == '53' ? 'selected' : '' }} class="text-muted">53</option>
                                                        <option value="54"{{ $data->booking_minute == '54' ? 'selected' : '' }} class="text-muted">54</option>
                                                        <option value="55"{{ $data->booking_minute == '55' ? 'selected' : '' }} class="text-muted">55</option>
                                                        <option value="56"{{ $data->booking_minute == '56' ? 'selected' : '' }} class="text-muted">56</option>
                                                        <option value="57"{{ $data->booking_minute == '57' ? 'selected' : '' }} class="text-muted">57</option>
                                                        <option value="58"{{ $data->booking_minute == '58' ? 'selected' : '' }} class="text-muted">58</option>
                                                        <option value="59"{{ $data->booking_minute == '59' ? 'selected' : '' }} class="text-muted">59</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <select class="form-control" name="booking_minute_ampm" required>
                                                        <option value="" disabled selected hidden class="text-muted">AM/PM</option>
                                                        <option value="AM"{{ $data->booking_minute_ampm == 'AM' ? 'selected' : '' }} class="text-muted">AM</option>
                                                        <option value="PM"{{ $data->booking_minute_ampm == 'PM' ? 'selected' : '' }} class="text-muted">PM</option>
                                                    </select>
                                                </div>
                                        </div>


                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Contact Number </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{ $data->phone_number }}" placeholder="Enter here ">
                                                <div class="form-check mt-2">
                                                    <input type="checkbox" class="form-check-input whatsapp_check" id="formrow-customCheck">
                                                    <label class="form-check-label" for="formrow-customCheck">Same number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Whatsapp Number </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control whats_app_number" value="{{ $data->whats_app_number }}" name="whats_app_number" placeholder="Enter here ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Email ID </label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email_id" placeholder="Enter here " value="{{ $data->email_id }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Address </label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="address" placeholder="Enter here ">{{ $data->address }}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Proof</h4>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Proof Type </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single" name="proof_type" required>
                                                    <option value="" disabled selected hidden class="text-muted">Select Type</option>
                                                    <option value="Aadhaar Card"{{ $data->proof_type == 'Aadhaar Card' ? 'selected' : '' }} class="text-muted">Aadhaar Card</option>
                                                    <option value="Pan Card"{{ $data->proof_type == 'Pan Card' ? 'selected' : '' }} class="text-muted">Pan Card</option>
                                                    <option value="Voter ID"{{ $data->proof_type == 'Voter ID' ? 'selected' : '' }} class="text-muted">Voter ID</option>
                                                    <option value="Driving Licence"{{ $data->proof_type == 'Driving Licence' ? 'selected' : '' }} class="text-muted">Driving Licence</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Proof Document </label>
                                            <div class="col-sm-9">
                                            <a href="asset/{{$data->proof_image}}">{{ $data->proof_image }}</a>
                                                <input type="file" class="form-control" name="proof_image" >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Photo </label>
                                            <div class="col-sm-9">
                                                <div style="display: flex;">
                                                    <div id="my_camera"></div>
                                                    <div id="captured_image" style="border:1px #584f72; background:#f6f6f6;">Your captured image will appear here...</div>
                                                </div>
                                                <input style="margin-top: 10px; margin-left: 40px;" type=button value="Take Snapshot" class="btn btn-success" onClick="take_snapshot()">
                                                <input type="hidden" name="customer_photo" class="image-tag">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title mb-4" style="color: #5b73e8">Rooms</h4>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Branch </label>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single branch_id" name="branch_id" id="branch_id" required>
                                                    <option value="" disabled selected hidden class="text-muted">
                                                        Select Branch</option>
                                                    @foreach ($branch as $branchs)
                                                    <option value="{{ $branchs->id }}"
                                                    @if ($branchs->id === $data->branch_id) selected='selected' @endif>{{ $branchs->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                People </label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="adult_count" placeholder="Adult - Enter here " value="{{ $data->adult_count }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="child_count" placeholder="Child - Enter here " value="{{ $data->child_count }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item class="row">
                                        <div class="inner-repeater mb-4">
                                            <div data-repeater-list="inner-group" class="inner form-group">
                                                <div data-repeater-item class="inner mb-3 row">
                                                    <div class="col-sm-3">
                                                        <label for="horizontal-firstname-input" class="col-form-label">
                                                            Room Number</label>
                                                    </div>
                                                    <div class="dynamic_field col-sm-9">
                                                        <table class="table-fixed col-12 " id="">
                                                            <tbody>
                                                            @foreach ($BookingRooms as $index => $BookingRoomss)
                                                                <tr>
                                                                    <td class="col-9 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider">
                                                                        <input type="hidden" id="room_auto_id" name="room_auto_id[]" value="{{ $BookingRoomss->id }}"/>
                                                                        
                                                                        
                                                                                @foreach ($room as $rooms)
                                                                                @if ($rooms['id'] == $BookingRoomss['room_id'])
                                                                                <input type="text" class="form-control customer_booked_room" disabled name="customer_booked_room[]" placeholder="" value="Room No{{ $rooms->room_number }} - Floor {{ $rooms->room_floor }} - {{ $rooms->room_type }}">
                                                                                <input type="hidden" id="room_id" name="room_id[]" value="{{ $rooms->id }}"/>
                                                                                @endif 
                                                                                @endforeach
                                                                        </select></td>
                                                                    <td class="col-2"><button class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button">Remove</button>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tbody id="roomfields">
                                                                <tr>
                                                                    <td class="col-9 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider">
                                                                        <input type="hidden" id="room_auto_id" name="room_auto_id[]" />
                                                                        <select class="form-control room_id" name="room_id[]" id="" required>
                                                                            <option value="" selected hidden class="text-muted">
                                                                                Select Room</option>
                                                                        </select></td>
                                                                    <td class="col-2"><button class="text-white font-medium rounded-lg text-sm  text-center btn btn-success" type="button" id="addroomfields" value="Add">Add</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($data['chick_in_date'] != NULL)

                                    <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Check In Date </label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="checkindate" placeholder="Enter here " value="{{ $data->chick_in_date }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Check In Time </label>
                                                <div class="col-sm-1">
                                                    <select class="form-control" name="checkin_time" required>
                                                        <option value="" disabled selected hidden class="text-muted">Time</option>
                                                        <option value="1"{{ $data->chick_in_time == '1' ? 'selected' : '' }} class="text-muted">1</option>
                                                        <option value="2"{{ $data->chick_in_time == '2' ? 'selected' : '' }} class="text-muted">2</option>
                                                        <option value="3"{{ $data->chick_in_time == '3' ? 'selected' : '' }} class="text-muted">3</option>
                                                        <option value="4"{{ $data->chick_in_time == '4' ? 'selected' : '' }} class="text-muted">4</option>
                                                        <option value="5"{{ $data->chick_in_time == '5' ? 'selected' : '' }} class="text-muted">5</option>
                                                        <option value="6"{{ $data->chick_in_time == '6' ? 'selected' : '' }} class="text-muted">6</option>
                                                        <option value="7"{{ $data->chick_in_time == '7' ? 'selected' : '' }} class="text-muted">7</option>
                                                        <option value="8"{{ $data->chick_in_time == '8' ? 'selected' : '' }} class="text-muted">8</option>
                                                        <option value="9"{{ $data->chick_in_time == '9' ? 'selected' : '' }} class="text-muted">9</option>
                                                        <option value="10"{{ $data->chick_in_time == '10' ? 'selected' : '' }} class="text-muted">10</option>
                                                        <option value="11"{{ $data->chick_in_time == '11' ? 'selected' : '' }} class="text-muted">11</option>
                                                        <option value="12"{{ $data->chick_in_time == '12' ? 'selected' : '' }} class="text-muted">12</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <select class="form-control" name="checkin_minute" required>
                                                        <option value="" disabled selected hidden class="text-muted">Minute</option>
                                                        <option value="00"{{ $data->chick_in_minute == '00' ? 'selected' : '' }} class="text-muted">00</option>
                                                        <option value="01"{{ $data->chick_in_minute == '01' ? 'selected' : '' }} class="text-muted">01</option>
                                                        <option value="02"{{ $data->chick_in_minute == '02' ? 'selected' : '' }} class="text-muted">02</option>
                                                        <option value="03"{{ $data->chick_in_minute == '03' ? 'selected' : '' }} class="text-muted">03</option>
                                                        <option value="04"{{ $data->chick_in_minute == '04' ? 'selected' : '' }} class="text-muted">04</option>
                                                        <option value="05"{{ $data->chick_in_minute == '05' ? 'selected' : '' }} class="text-muted">05</option>
                                                        <option value="06"{{ $data->chick_in_minute == '06' ? 'selected' : '' }} class="text-muted">06</option>
                                                        <option value="07"{{ $data->chick_in_minute == '07' ? 'selected' : '' }} class="text-muted">07</option>
                                                        <option value="08"{{ $data->chick_in_minute == '08' ? 'selected' : '' }} class="text-muted">08</option>
                                                        <option value="09"{{ $data->chick_in_minute == '09' ? 'selected' : '' }} class="text-muted">09</option>
                                                        <option value="10"{{ $data->chick_in_minute == '10' ? 'selected' : '' }} class="text-muted">10</option>
                                                        <option value="11"{{ $data->chick_in_minute == '11' ? 'selected' : '' }} class="text-muted">11</option>
                                                        <option value="12"{{ $data->chick_in_minute == '12' ? 'selected' : '' }} class="text-muted">12</option>
                                                        <option value="13"{{ $data->chick_in_minute == '13' ? 'selected' : '' }} class="text-muted">13</option>
                                                        <option value="14"{{ $data->chick_in_minute == '14' ? 'selected' : '' }} class="text-muted">14</option>
                                                        <option value="15"{{ $data->chick_in_minute == '15' ? 'selected' : '' }} class="text-muted">15</option>
                                                        <option value="16"{{ $data->chick_in_minute == '16' ? 'selected' : '' }} class="text-muted">16</option>
                                                        <option value="17"{{ $data->chick_in_minute == '17' ? 'selected' : '' }} class="text-muted">17</option>
                                                        <option value="18"{{ $data->chick_in_minute == '18' ? 'selected' : '' }} class="text-muted">18</option>
                                                        <option value="19"{{ $data->chick_in_minute == '19' ? 'selected' : '' }} class="text-muted">19</option>
                                                        <option value="20"{{ $data->chick_in_minute == '20' ? 'selected' : '' }} class="text-muted">20</option>
                                                        <option value="21"{{ $data->chick_in_minute == '21' ? 'selected' : '' }} class="text-muted">21</option>
                                                        <option value="22"{{ $data->chick_in_minute == '22' ? 'selected' : '' }} class="text-muted">22</option>
                                                        <option value="23"{{ $data->chick_in_minute == '23' ? 'selected' : '' }} class="text-muted">23</option>
                                                        <option value="24"{{ $data->chick_in_minute == '24' ? 'selected' : '' }} class="text-muted">24</option>
                                                        <option value="25"{{ $data->chick_in_minute == '25' ? 'selected' : '' }} class="text-muted">25</option>
                                                        <option value="26"{{ $data->chick_in_minute == '26' ? 'selected' : '' }} class="text-muted">26</option>
                                                        <option value="27"{{ $data->chick_in_minute == '27' ? 'selected' : '' }} class="text-muted">27</option>
                                                        <option value="28"{{ $data->chick_in_minute == '28' ? 'selected' : '' }} class="text-muted">28</option>
                                                        <option value="29"{{ $data->chick_in_minute == '29' ? 'selected' : '' }} class="text-muted">29</option>
                                                        <option value="30"{{ $data->chick_in_minute == '30' ? 'selected' : '' }} class="text-muted">30</option>
                                                        <option value="31"{{ $data->chick_in_minute == '31' ? 'selected' : '' }} class="text-muted">31</option>
                                                        <option value="32"{{ $data->chick_in_minute == '32' ? 'selected' : '' }} class="text-muted">32</option>
                                                        <option value="33"{{ $data->chick_in_minute == '33' ? 'selected' : '' }} class="text-muted">33</option>
                                                        <option value="34"{{ $data->chick_in_minute == '34' ? 'selected' : '' }} class="text-muted">34</option>
                                                        <option value="35"{{ $data->chick_in_minute == '35' ? 'selected' : '' }} class="text-muted">35</option>
                                                        <option value="36"{{ $data->chick_in_minute == '36' ? 'selected' : '' }} class="text-muted">36</option>
                                                        <option value="37"{{ $data->chick_in_minute == '37' ? 'selected' : '' }} class="text-muted">37</option>
                                                        <option value="38"{{ $data->chick_in_minute == '38' ? 'selected' : '' }} class="text-muted">38</option>
                                                        <option value="39"{{ $data->chick_in_minute == '39' ? 'selected' : '' }} class="text-muted">39</option>
                                                        <option value="40"{{ $data->chick_in_minute == '40' ? 'selected' : '' }} class="text-muted">40</option>
                                                        <option value="41"{{ $data->chick_in_minute == '41' ? 'selected' : '' }} class="text-muted">41</option>
                                                        <option value="42"{{ $data->chick_in_minute == '42' ? 'selected' : '' }} class="text-muted">42</option>
                                                        <option value="43"{{ $data->chick_in_minute == '43' ? 'selected' : '' }} class="text-muted">43</option>
                                                        <option value="44"{{ $data->chick_in_minute == '44' ? 'selected' : '' }} class="text-muted">44</option>
                                                        <option value="45"{{ $data->chick_in_minute == '45' ? 'selected' : '' }} class="text-muted">45</option>
                                                        <option value="46"{{ $data->chick_in_minute == '46' ? 'selected' : '' }} class="text-muted">46</option>
                                                        <option value="47"{{ $data->chick_in_minute == '47' ? 'selected' : '' }} class="text-muted">47</option>
                                                        <option value="48"{{ $data->chick_in_minute == '48' ? 'selected' : '' }} class="text-muted">48</option>
                                                        <option value="49"{{ $data->chick_in_minute == '49' ? 'selected' : '' }} class="text-muted">49</option>
                                                        <option value="50"{{ $data->chick_in_minute == '50' ? 'selected' : '' }} class="text-muted">50</option>
                                                        <option value="51"{{ $data->chick_in_minute == '51' ? 'selected' : '' }} class="text-muted">51</option>
                                                        <option value="52"{{ $data->chick_in_minute == '52' ? 'selected' : '' }} class="text-muted">52</option>
                                                        <option value="53"{{ $data->chick_in_minute == '53' ? 'selected' : '' }} class="text-muted">53</option>
                                                        <option value="54"{{ $data->chick_in_minute == '54' ? 'selected' : '' }} class="text-muted">54</option>
                                                        <option value="55"{{ $data->chick_in_minute == '55' ? 'selected' : '' }} class="text-muted">55</option>
                                                        <option value="56"{{ $data->chick_in_minute == '56' ? 'selected' : '' }} class="text-muted">56</option>
                                                        <option value="57"{{ $data->chick_in_minute == '57' ? 'selected' : '' }} class="text-muted">57</option>
                                                        <option value="58"{{ $data->chick_in_minute == '58' ? 'selected' : '' }} class="text-muted">58</option>
                                                        <option value="59"{{ $data->chick_in_minute == '59' ? 'selected' : '' }} class="text-muted">59</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <select class="form-control" name="checkin_minute_ampm" required>
                                                        <option value="" disabled selected hidden class="text-muted">AM/PM</option>
                                                        <option value="AM"{{ $data->chick_in_minute_ampm == 'AM' ? 'selected' : '' }} class="text-muted">AM</option>
                                                        <option value="PM"{{ $data->chick_in_minute_ampm == 'PM' ? 'selected' : '' }} class="text-muted">PM</option>
                                                    </select>
                                                </div>
                                        </div>
                                        @endif 
                                <div class="modal-footer">
                                    
                                    <button type="submit" class="btn btn-primary" name="bookandcheckin" style="margin-right: 10%;" >Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">
    $(document).ready(function() {

        $('.whatsapp_check').click(function() {
            if ($(this).is(':checked')) {
                var phone_number = $('#phone_number').val();
                $('.whats_app_number').val(phone_number);
            } else {
                $('.whats_app_number').val('');
            }
        });


        var phone_number = $('#phone_number').val();
        var whats_app_number = $('.whats_app_number').val();
        if(phone_number == whats_app_number){
            $('.whatsapp_check').prop('checked', true);
        }else {
            $('.whatsapp_check').prop('checked', false);
        }



        var branch_id = $('#branch_id').val();
        $.ajax({
                url: '/getBranchwiseRoom/' + branch_id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    console.log(response['data']);
                    var len = response['data'].length;
                    $('.room_id').html('');

                    var $select = $(".room_id").append(
                        $('<option>', {
                            value: '0'
                            , text: 'Select'
                        }));
                    $(".room_id").append($select);

                    for (var i = 0; i < len; i++) {

                        if(response['data'][i].booking_status != 1){

                            $(".room_id").append($('<option>', {
                            value: response['data'][i].id
                            , text: 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type
                        , }));

                        }
                        


                    }
                }
            });




        $('#branch_id').on('change', function() {
            var branch_id = this.value;

            $.ajax({
                url: '/getBranchwiseRoom/' + branch_id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    console.log(response['data']);
                    var len = response['data'].length;
                    $('.room_id').html('');

                    var $select = $(".room_id").append(
                        $('<option>', {
                            value: '0'
                            , text: 'Select'
                        }));
                    $(".room_id").append($select);

                    for (var i = 0; i < len; i++) {

                        if(response['data'][i].booking_status != 1){

                            $(".room_id").append($('<option>', {
                            value: response['data'][i].id
                            , text: 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type
                        , }));

                        }
                        


                    }
                }
            });
        });


    });

    var i = 0;
    var j = 0;
    $(document).ready(function() {
        $("#addroomfields").click(function() {
            ++i;
            $("#roomfields").append(
                '<tr><td class="col-sm-3 px-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider"><input type="hidden" id="room_auto_id"name="room_auto_id[]" /><select class="form-control js-example-basic-single room_id" name="room_id[]" id="room_id'+ i +'" required><option value="" selected hidden class="text-muted">Select Room</option></select></td><td class="col-sm-2"><button class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >Remove</button></td></tr>'
            );

            var branch_id = $('.branch_id').val();
            //alert('branch_id');
            $.ajax({
                url: '/getBranchwiseRoom/' + branch_id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    console.log(response['data']);
                    var len = response['data'].length;

                    //$('.room_id').html('');

                    
                    var selectedValues = new Array();
                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            if(response['data'][i].booking_status != 1){

                                var id = response['data'][i].id;
                                var name = 'Room No ' + response['data'][i].room_number + ' - ' + response['data'][i].room_floor + ' Floor - ' + response['data'][i].room_type;
                                var option = "<option value='" + id + "'>" + name + "</option>";
                                selectedValues.push(option);

                            }
                            
                            
                        }
                    }
                        
                        ++j;
                        $('#room_id'+j ).append(selectedValues);

                    
                }
            });
        });
    });
    
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

    Webcam.set({
        width: 350
        , height: 200
        , image_format: 'jpeg'
        , jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('captured_image').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }

</script>
@endsection
