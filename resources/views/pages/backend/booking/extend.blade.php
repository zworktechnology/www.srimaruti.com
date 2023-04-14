<div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="font-weight: 600;color: #e83e8c;">Extend</h5>
            <button type="button" class="btn-close extendclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form autocomplete="off" method="POST" action="{{ route('booking.extend', ['id' => $bookingDatas['id']]) }}">
                @method('PUT')
                @csrf
                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Customer Name </label>
                    <div class="col-sm-9">
                        <span class="form-control" disabled>{{ $bookingDatas['customer_name'] }}</span>
                    </div>
                </div>
                
                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check-in Date </label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control checkin_date"  id="checkin_date{{$bookingDatas['id']}}" name="checkin_date" placeholder="Enter here " value="{{ $bookingDatas['chick_in_date'] }}">
                        </div>
                        <div class="col-sm-4">
                            <input type="time" class="form-control" id="checkin_time" name="checkin_time" placeholder="Enter here " value="{{ $bookingDatas['chick_in_time'] }}">
                        </div>
                </div>
                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Check-out Date </label>
                        <div class="col-sm-5">
                            <input type="date"  class="form-control" style="background: #d1d17b;" disabled id="checkout_date" name="checkout_date" placeholder="Enter here " value="{{ $bookingDatas['chick_out_date'] }}">
                        </div>
                        <div class="col-sm-4">
                            <input type="time" class="form-control" style="background: #d1d17b;" disabled id="checkout_time" name="checkout_time" placeholder="Enter here " value="{{ $bookingDatas['chick_out_time'] }}">
                        </div>
                </div>
                


                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Extended Date Upto <span style="color: red;">*</span></label>
                        <div class="col-sm-5">
                            <input type="date"  class="form-control extended_date" id="extended_date{{$bookingDatas['id']}}" name="extended_date" placeholder="Enter here ">
                        </div>
                        <div class="col-sm-4">
                            <input type="time" class="form-control" id="extended_time" name="extended_time" placeholder="Enter here " value="{{ $timenow }}">
                        </div>
                </div>


                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Total Days <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control no_of_days" style="color:green" name="no_of_days" id="no_of_days{{ $bookingDatas['id'] }}" value="{{ $bookingDatas['days'] }}" />
                        </div>
                </div>


                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Room Details </label>
                    <div class="col-sm-9">
                        
                        <table class="table table-bordered dt-responsive nowrap col-12" id="">
                            <thead>
                                <tr>
                                    <th class="col-6">Room</th>
                                    <th class="col-3">Room Cost / Day</th>
                                    <th class="col-3">Room Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <input type="hidden"  class="form-control" name="booking_id" id="booking_id" value="{{ $bookingDatas['id'] }}" />
                                @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                    @if ($room_lists['booking_id'] == $bookingDatas['id'])

<script>

;(function($, window, document, undefined){
    $('#no_of_days' + {{$bookingDatas['id']}}).on("change", function(){
       var date = new Date($('#checkin_date' + {{$bookingDatas['id']}}).val()),
           days = parseInt($('#no_of_days' + {{$bookingDatas['id']}}).val(), 10);

        if(!isNaN(date.getTime())){
            date.setDate(date.getDate() + days + 1);

            $('#extended_date' + {{$bookingDatas['id']}}).val(date.toInputFormat());
        } else {
            alert("Invalid Date");  
        }
    });


    //From: http://stackoverflow.com/questions/3066586/get-string-in-yyyymmdd-format-from-js-date-object
    Date.prototype.toInputFormat = function() {
       var yyyy = this.getFullYear().toString();
       var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
       var dd  = this.getDate().toString();
       return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
    };
})(jQuery, this, document);





$(document).ready(function() {
    $('.extend' + {{$bookingDatas['id']}}).each(function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            var $this = $(this),
           booking_id = $this.attr('data-id');
            

            

            $(document).on("keyup", '#no_of_days' + {{$bookingDatas['id']}}, function() {
                var no_of_days = $(this).val();
                //console.log(no_of_days);
    
                var booking_room_price = $('.booking_room_price' + {{ $bookingDatas['id'] }}{{ $room_lists['id'] }}).val();
                
                var CalAmount = no_of_days * booking_room_price;
                $('#booking_room_cal_price' + {{$bookingDatas['id']}}{{ $room_lists['id'] }}).val(CalAmount);

                var totalAmount = 0;
                $('.booking_room_cal_price' + {{$bookingDatas['id']}}).each(function() {
                    
                    totalAmount = Number(totalAmount) + Number($(this).val());
                    console.log(totalAmount);
                    $('#total_calc_price' + {{ $bookingDatas['id'] }}).val(totalAmount);
                });

                var additional_charge = $('#additional_charge' + {{ $bookingDatas['id'] }}).val();
                var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();

                var discount_percentage = $('#discount_percentage' + {{ $bookingDatas['id'] }}).val();
                var discount_in_amount = (discount_percentage / 100) * total_calc_price;
                $('#discount_amount' + {{ $bookingDatas['id'] }}).val(discount_in_amount.toFixed(2));


                var gst_percentage = $('#gst_percentage' + {{ $bookingDatas['id'] }}).val();
                var gst_in_amount = (gst_percentage / 100) * total_calc_price;
                $('#gst_amount' + {{ $bookingDatas['id'] }}).val(gst_in_amount.toFixed(2));


                var grand_total = (Number(total_calc_price) + Number(gst_in_amount) + Number(additional_charge)) - Number(discount_in_amount);
                $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total.toFixed(2));
                var payable_amount = $('#payable_amount' + {{ $bookingDatas['id'] }}).val();
                var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
                $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance.toFixed(2)); 


                $('.dayextra' + {{ $bookingDatas['id'] }}).show();
                

            });


            $(document).on("keyup", '#gst_amount' + {{ $bookingDatas['id'] }}, function() {
                var gstamount = $(this).val();
                var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                var gst_in_percentage = (gstamount * 100) / total_calc_price;
                $('#gst_percentage' + {{ $bookingDatas['id'] }}).val(gst_in_percentage.toFixed(2));

                            var additional_charge = $('#additional_charge' + {{ $bookingDatas['id'] }}).val();
                            var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                            var discount_amount = $('#discount_amount' + {{ $bookingDatas['id'] }}).val();
                            var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }}).val();
                            
                            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(discount_amount);
                            $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total.toFixed(2));
                            var payable_amount = $('#payable_amount' + {{ $bookingDatas['id'] }}).val();
                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
                            $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance.toFixed(2));
                            
            });


            $(document).on("keyup", '#gst_percentage' + {{ $bookingDatas['id'] }}, function() {
                var gst_percentage = $(this).val();
                var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                var gst_in_amount = (gst_percentage / 100) * total_calc_price;
                $('#gst_amount' + {{ $bookingDatas['id'] }}).val(gst_in_amount.toFixed(2));

                            var additional_charge = $('#additional_charge' + {{ $bookingDatas['id'] }}).val();
                            var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                            var discount_amount = $('#discount_amount' + {{ $bookingDatas['id'] }}).val();
                            var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }}).val();
                            
                            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(discount_amount);
                            $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total.toFixed(2));
                            var payable_amount = $('#payable_amount' + {{ $bookingDatas['id'] }}).val();
                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
                            $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance.toFixed(2));
                            
            });



            $(document).on("keyup", '#discount_amount' + {{ $bookingDatas['id'] }}, function() {
                var discount_amount = $(this).val();
                var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                var discount_in_percentage = (discount_amount * 100) / total_calc_price;
                $('#discount_percentage' + {{ $bookingDatas['id'] }}).val(discount_in_percentage.toFixed(2));

                            var additional_charge = $('#additional_charge' + {{ $bookingDatas['id'] }}).val();
                            var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                            var discount_amount = $('#discount_amount' + {{ $bookingDatas['id'] }}).val();
                            var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }}).val();
                            
                            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(discount_amount);
                            $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total.toFixed(2));
                            var payable_amount = $('#payable_amount' + {{ $bookingDatas['id'] }}).val();
                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
                            $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance.toFixed(2));
                    
            });




            $(document).on("keyup", '#discount_percentage' + {{ $bookingDatas['id'] }}, function() {
                var discount_percentage = $(this).val();
                var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                var discount_in_amount = (discount_percentage / 100) * total_calc_price;
                $('#discount_amount' + {{ $bookingDatas['id'] }}).val(discount_in_amount.toFixed(2));

                            var additional_charge = $('#additional_charge' + {{ $bookingDatas['id'] }}).val();
                            var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                            var discount_amount = $('#discount_amount' + {{ $bookingDatas['id'] }}).val();
                            var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }}).val();
                            
                            var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(discount_amount);
                            $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total.toFixed(2));
                            var payable_amount = $('#payable_amount' + {{ $bookingDatas['id'] }}).val();
                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
                            $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance.toFixed(2));
                            
            });




            $(document).on("keyup", '#additional_charge' + {{ $bookingDatas['id'] }}, function() {
                var additional_charge = $(this).val();
                var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                var discount_amount = $('#discount_amount' + {{ $bookingDatas['id'] }}).val();
                var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }}).val();

                var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(discount_amount);
                $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total.toFixed(2));
                
                var payable_amount = $('#payable_amount' + {{ $bookingDatas['id'] }}).val();
                var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
                $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance.toFixed(2));
                

            });


            $(document).on("keyup", '#payable_amount' + {{ $bookingDatas['id'] }}, function() {
                var payable_amount = $(this).val();

                    var additional_charge = $('#additional_charge' + {{ $bookingDatas['id'] }}).val();
                    var total_calc_price = $('#total_calc_price' + {{ $bookingDatas['id'] }}).val();
                    var discount_amount = $('#discount_amount' + {{ $bookingDatas['id'] }}).val();
                    var gst_amount = $('#gst_amount' + {{ $bookingDatas['id'] }}).val();

                var grand_total = (Number(total_calc_price) + Number(gst_amount) + Number(additional_charge)) - Number(discount_amount);
                $('#grand_total' + {{ $bookingDatas['id'] }}).val(grand_total.toFixed(2));
                var balance = Number(grand_total.toFixed(2)) - Number(payable_amount);
                $('#balance_amount' + {{ $bookingDatas['id'] }}).val(balance.toFixed(2));
            });



        });
    });
});
</script>
<style>

        .not-allowed {
            cursor: not-allowed;
        }

</style>  

                                        <tr>
                                            <td><input type="text" disabled class="form-control" name="booking_rooms[]" id="booking_rooms" value="{{ $room_lists['room'] }}" />
                                                <input type="hidden"  class="form-control" name="room_auto_id[]" id="room_auto_id" value="{{ $room_lists['id'] }}" />
                                                <input type="hidden"  class="form-control" name="room_id[]" id="room_id" value="{{ $room_lists['room_id'] }}" />
                                            </td>
                                            <td><input type="text"  class="form-control not-allowed booking_room_price{{ $bookingDatas['id'] }}{{ $room_lists['id'] }}" style="background: #e77e7e;" name="booking_room_price[]" id="booking_room_price{{ $bookingDatas['id'] }}" value="{{ $room_lists['booking_room_price'] }}" /></td>
                                            <td><input type="text"  class="form-control not-allowed booking_room_cal_price{{ $bookingDatas['id'] }}" name="booking_room_cal_price[]" style="background: #e77e7e;" id="booking_room_cal_price{{ $bookingDatas['id'] }}{{ $room_lists['id'] }}" value="{{ $room_lists['room_cal_price'] }}" /></td>
                                      
                                        </tr>
                                     @endif
                                @endforeach
                            </tbody>
                        </table>
                       
                                                               
                    </div>
                </div>
                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Total </label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control not-allowed" style="background: #eee;" name="total_calc_price" id="total_calc_price{{ $bookingDatas['id'] }}" value="{{ $bookingDatas['total'] }}" />
                        </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">GST Amount </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control gst_amount" id="gst_amount{{ $bookingDatas['id'] }}" name="gst_amount" placeholder="GST Amount - Enter here " value="{{ $bookingDatas['gst_amount'] }}">
                        </div>
                    <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">GST % </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control gst_percentage" id="gst_percentage{{ $bookingDatas['id'] }}" name="gst_percentage" placeholder="Gst % - Enter here " value="{{ $bookingDatas['gst_per'] }}">
                        </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Discount Amount </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control discount_amount" id="discount_amount{{ $bookingDatas['id'] }}" name="discount_amount" placeholder="GST Amount - Enter here " value="{{ $bookingDatas['disc_amount'] }}">
                        </div>
                    <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Discount % </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control discount_percentage" id="discount_percentage{{ $bookingDatas['id'] }}" name="discount_percentage" placeholder="Discount % - Enter here " value="{{ $bookingDatas['disc_per'] }}">
                        </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Additional Charge </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control additional_charge" id="additional_charge{{ $bookingDatas['id'] }}" name="additional_charge" placeholder="Additional Amount - Enter here " value="{{ $bookingDatas['additional_amount'] }}">
                        </div>
                    <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Note </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control additional_charge_notes" id="additional_charge_notes{{ $bookingDatas['id'] }}" name="additional_charge_notes" placeholder="Note - Enter here " value="{{ $bookingDatas['additional_notes'] }}">
                        </div>
                </div>
                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Grand Total - To Pay </label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control" name="grand_total" id="grand_total{{ $bookingDatas['id'] }}" value="{{ $bookingDatas['grand_total'] }}" />
                        </div>
                </div>

                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">
                                                            Paid Amounts </label>
                                                        <div class="col-sm-9 row">
                                                           
                                                                
                                                                @foreach ($bookingDatas['terms'] as $index => $term_arr)
                                                                    @if ($term_arr['booking_id'] == $bookingDatas['id'])
                                                                    

                                                                    
                                                                        <span class="col-sm-4">
                                                                            <input type="text" style="background: #c3b6eb;"
                                                                                class="form-control term" disabled
                                                                                id="term"
                                                                                value="{{ $term_arr['term'] }}">
                                                                        </span>
                                                                        <span class="col-sm-4">
                                                                            <input type="text" disabled style="background: #c3b6eb;"
                                                                                class="form-control payable_amount"
                                                                                id="payable_amount"
                                                                                value="{{ $term_arr['payable_amount'] }}">
                                                                        </span>
                                                                        <span class="col-sm-4">
                                                                            <input type="text" disabled style="background: #c3b6eb;"
                                                                                class="form-control paymentmethod"
                                                                                id="paymentmethod"
                                                                                value="{{ $term_arr['payment_method'] }}">
                                                                        </span>
                                                                    
                                                                    @endif
                                                                @endforeach

                                                            
                                                        </div>
                                                    </div>
                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Total Paid </label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control payable_amount" style="background-color:#4ac565;color: black;" id="payable_amount{{ $bookingDatas['id'] }}" value="{{ $bookingDatas['total_paid'] }}"  name="payable_amount"  placeholder="Enter here ">
                        </div>
                </div>
               
                <div class="row mb-4 dayextra{{ $bookingDatas['id'] }}" style="display:none">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Term </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="payment_term">
                            <option value=""  selected  class="text-muted">Select</option>
                            <option value="Term II" class="text-muted">Term II</option>
                            <option value="Term III" class="text-muted">Term III</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4 dayextra{{ $bookingDatas['id'] }}" style="display:none">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Payment Method </label>
                    <div class="col-sm-9">
                    <select class="form-control" name="payment_method">
                        <option value=""  selected  class="text-muted">Select Payment Via</option>
                        <option value="Cash" class="text-muted">Cash</option>
                        <option value="Card" class="text-muted">Card</option>
                        <option value="Online Payment" class="text-muted">Online Payment</option>
                    </select>
                    </div>
                </div>
                
                <div class="row mb-4" >
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Balance Amount </label>
                        <div class="col-sm-9">
                           <input type="number" class="form-control balance_amount" style="background: #f1db3d;"  id="balance_amount{{ $bookingDatas['id'] }}" name="balance_amount" placeholder="Enter here " value="{{ $bookingDatas['balance_amount'] }}"> 
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-secondary extendclosebutton" data-bs-dismiss="modal">No, Get Back</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>


<script>



$(".extendclose").click(function() {
    window.location.reload();
});
$(".extendclosebutton").click(function() {
    window.location.reload();
});
//$(document).ready(function() {
//var check_in_date = $("#checkindate").val();
//var check_out_date = $("#checkoutdate").val();
    
    
  //  var checkin_date = new Date (check_in_date);
  //  console.log(checkin_date);
  //  var checkout_date = new Date (check_out_date);
  //  console.log(checkout_date);


    //calculate total number of seconds between two dates
   // var total_seconds = Math.abs(checkin_date - checkout_date) / 1000;


    //calculate days difference by dividing total seconds in a day
  //  var days_difference = Math.floor (total_seconds / (60 * 60 * 24));
    //console.log(days_difference); 
 //   $('.no_of_days').val(days_difference);   


// Get Room Price
 //   var totalAmount = 0;
 //   $("input[name='booking_room_price[]']").each(function() {
                        //alert($(this).val());
  //                      totalAmount = Number(totalAmount) + Number($(this).val());
  //                      console.log(totalAmount);
   //                     $('.booking_room_totprice').val(totalAmount);
   //                 });

    //var booking_room_totprice = $(".booking_room_totprice").val();

 //   var total_room_cost = booking_room_totprice * days_difference;
  //  $('.total_room_cost').val(total_room_cost);
//});

    





</script>