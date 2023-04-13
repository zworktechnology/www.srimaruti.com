<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
use App\Models\BookingRoom;
use App\Models\BookingPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $data = Booking::where('soft_delete', '!=', 1)->get();

        $bookingData = [];
        $room_list = [];
        $terms = [];
        foreach ($data as $key => $datas) {
            $branch = Branch::findOrFail($datas->branch_id);
            $roomsbooked = BookingRoom::where('booking_id', '=', $datas->id)->get();

            foreach ($roomsbooked as $key => $rooms_booked) {
                $Rooms = Room::findOrFail($rooms_booked->room_id);
                $room_list[] = array(
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                    'booking_id' => $datas->id,
                    'booking_room_price' => $rooms_booked->room_price,
                    'room_cal_price' => $rooms_booked->room_cal_price,
                    'id' => $rooms_booked->id,
                    'room_id' => $rooms_booked->room_id,

                );
            }

            $payment_data = BookingPayment::where('booking_id', '=', $datas->id)->get();
            foreach ($payment_data as $key => $payment_datas) {
                $terms[] = array(
                    'booking_id' => $datas->id,
                    'term' => $payment_datas->term,
                    'payable_amount' => $payment_datas->payable_amount,
                    'id' => $payment_datas->id,
                    'payment_method' => $payment_datas->payment_method,
                );
            }




            $bookingData[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => $branch->name,
                'chick_in_date' => $datas->check_in_date,
                'chick_in_time' => $datas->check_in_time,
                'whats_app_number' => $datas->whats_app_number,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->check_out_date,
                'out_date' => $datas->out_date,
                'chick_out_time' => $datas->check_out_time,
                'phone_number' => $datas->phone_number,
                'grand_total' => $datas->grand_total,
                'total_paid' => $datas->total_paid,
                'balance_amount' => $datas->balance_amount,
                'days' => $datas->days,
                'gst_per' => $datas->gst_per,
                'gst_amount' => $datas->gst_amount,
                'disc_per' => $datas->disc_per,
                'disc_amount' => $datas->disc_amount,
                'additional_amount' => $datas->additional_amount,
                'additional_notes' => $datas->additional_notes,
                'total' => $datas->total,
                'terms' => $terms,
                'status' => $datas->status,
                'extended_date' => $datas->extended_date,
                'extended_time' => $datas->extended_time,
            );
        }

        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('pages.backend.booking.index', compact('bookingData', 'today', 'timenow'));
    }


    public function dailycheckout()
    {

        $data = Booking::where('soft_delete', '!=', 1)->get();

        foreach ($data as $key => $datas) {




            $today = Carbon::now()->format('Y-m-d');




            $Extend_data = [];
            $checkout_data = [];



                $extendcheckout_date = Booking::where('soft_delete', '!=', 1)->where('extended_date', '=', $today)->get();
                foreach ($extendcheckout_date as $key => $extend_checkout_date) {
                    $Extend_data[] = $extend_checkout_date;
                }
                $checkout_date = Booking::where('soft_delete', '!=', 1)->where('check_out_date', '=', $today)->get();
                foreach ($checkout_date as $key => $checkout_date_arr) {
                    $checkout_data[] = $checkout_date_arr;
                }

                $Array = array_merge($Extend_data , $checkout_data);
                $checkout_data_arr = Booking::where('soft_delete', '!=', 1)->where('check_out_date', '=', $today)->get();


                $bookingData = [];
                $room_list = [];
                $terms = [];
                foreach ($checkout_data_arr as $key => $Array_data) {

                    $branch = Branch::findOrFail($Array_data->branch_id);

                    $roomsbooked = BookingRoom::where('booking_id', '=', $Array_data->id)->get();
                    foreach ($roomsbooked as $key => $rooms_booked) {
                        $Rooms = Room::findOrFail($rooms_booked->room_id);
                        $room_list[] = array(
                            'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                            'booking_id' => $Array_data->id,
                            'booking_room_price' => $rooms_booked->room_price,
                            'room_cal_price' => $rooms_booked->room_cal_price,
                            'id' => $rooms_booked->id,
                            'room_id' => $rooms_booked->room_id,

                        );
                    }


                    $payment_data = BookingPayment::where('booking_id', '=', $Array_data->id)->get();
                    foreach ($payment_data as $key => $payment_datas) {
                        $terms[] = array(
                            'booking_id' => $Array_data->id,
                            'term' => $payment_datas->term,
                            'payable_amount' => $payment_datas->payable_amount,
                        );
                    }


                    $bookingData[] = array(
                        'customer_name' => $Array_data->customer_name,
                        'branch' => $branch->name,
                        'chick_in_date' => $Array_data->check_in_date,
                        'chick_in_date' => $Array_data->check_in_date,
                        'whats_app_number' => $Array_data->whats_app_number,
                        'id' => $Array_data->id,
                        'room_list' => $room_list,
                        'phone_number' => $Array_data->phone_number,
                        'grand_total' => $Array_data->grand_total,
                        'total_paid' => $Array_data->total_paid,
                        'balance_amount' => $Array_data->balance_amount,
                        'days' => $Array_data->days,
                        'gst_per' => $Array_data->gst_per,
                        'gst_amount' => $Array_data->gst_amount,
                        'disc_per' => $Array_data->disc_per,
                        'disc_amount' => $Array_data->disc_amount,
                        'additional_amount' => $Array_data->additional_amount,
                        'additional_notes' => $Array_data->additional_notes,
                        'total' => $Array_data->total,
                        'terms' => $terms,
                        'status' => $Array_data->status,
                        'chick_out_date' => $Array_data->check_out_date,
                        'out_date' => $Array_data->out_date,
                        'chick_out_time' => $Array_data->check_out_time,
                        'extended_date' => $Array_data->extended_date,
                        'extended_time' => $Array_data->extended_time,
                    );

                }

                $timenow = Carbon::now()->format('H:i');

                return view('pages.backend.booking.dailycheckout', compact('bookingData', 'today', 'timenow'));










        }

    public function create()
    {
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $room = Room::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('pages.backend.booking.create', compact('branch', 'room', 'today', 'timenow'));
    }


    public function store(Request $request)
    {

        $data = new Booking();
        $random_no =   rand(100,999);

        $checkin = $request->get('checkin');
        if($checkin == 'checkin')
        {

        $data->customer_name = $request->get('booking_customer_name');
        $data->phone_number = $request->get('phone_number');
        $data->whats_app_number = $request->get('whats_app_number');
        $data->email_id = $request->get('email_id');
        $data->address = $request->get('address');


        $data->male_count = $request->get('male_count');
        $data->female_count = $request->get('female_count');
        $data->child_count = $request->get('child_count');
        $data->check_in_date = $request->get('check_in_date');
        $data->check_in_time = $request->get('check_in_time');
        $data->check_out_date = $request->get('check_out_date');
        $data->check_out_time = $request->get('check_out_time');
        $data->days = $request->get('days');
        $data->branch_id = $request->get('branch_id');
        $data->proofs = $request->get('proofs');

        $proof = $request->get('proofs');
        if($proof == 1){

            $data->prooftype_one = $request->get('prooftype_one');
            if ($request->proofimage_one != "") {
                $proofimage_one = $request->proofimage_one;
                $filename_one = $data->customer_name . '_' . $random_no . '_' . 'proof' . '_' . $data->prooftype_one . '_'  . '.' . $proofimage_one->getClientOriginalExtension();
                $request->proofimage_one->move('assets/customer_details/proof', $filename_one);
                $data->proofimage_one = $filename_one;
            }

        }else if($proof == 2){

            $data->prooftype_one = $request->get('prooftype_one');
            if ($request->proofimage_one != "") {
                $proofimage_one = $request->proofimage_one;
                $filename_one = $data->customer_name . '_' . $random_no . '_' . 'proof' . '_' . $data->prooftype_one . '_'  . '.' . $proofimage_one->getClientOriginalExtension();
                $request->proofimage_one->move('assets/customer_details/proof', $filename_one);
                $data->proofimage_one = $filename_one;
            }

            $data->prooftype_two = $request->get('prooftype_two');
            if ($request->proofimage_two != "") {
                $proofimage_two = $request->proofimage_two;
                $filename_two = $data->customer_name . '_' . $random_no . '_' . 'proof' . '_' . $data->prooftype_two . '_'  . '.' . $proofimage_two->getClientOriginalExtension();
                $request->proofimage_two->move('assets/customer_details/proof', $filename_two);
                $data->proofimage_two = $filename_two;
            }

        }

       // $customer_photo = $request->customer_photo;
       // $folderPath = "assets/customer_details/profile";
       // $image_parts = explode(";base64,", $customer_photo);
       // $image_type_aux = explode("image/", $image_parts[0]);
       // $image_type = $image_type_aux[1];
       // $image_base64 = base64_decode($image_parts[1]);
       // $fileName = $data->customer_name . '_' . $random_no . '_' . 'image' . '.png';
       // $customerimgfile = $folderPath . $fileName;
       // file_put_contents($customerimgfile, $image_base64);
       // $data->customer_photo = $customerimgfile;

        $data->total = $request->get('total_calc_price');
        $data->gst_per = $request->get('gst_percentage');
        $data->gst_amount = $request->get('gst_amount');
        $data->disc_per = $request->get('discount_percentage');
        $data->disc_amount = $request->get('discount_amount');
        $data->additional_amount = $request->get('additional_charge');
        $data->additional_notes = $request->get('additional_charge_notes');
        $data->grand_total = $request->get('grand_total');
        $data->grand_total = $request->get('grand_total');
        $data->total_paid = $request->get('payable_amount');
        $data->balance_amount = $request->get('balance_amount');
        $data->out_date = $request->get('check_out_date');
        $data->out_time = $request->get('check_out_time');


        $status = 1;
        $data->status = $status;

        $data->save();

        $insertedId = $data->id;


        // Booking Payments

                $paid_date = Carbon::now()->format('Y-m-d');

                $BookingPayment = new BookingPayment;
                $BookingPayment->booking_id = $insertedId;
                $BookingPayment->term = $request->get('payment_term');
                $BookingPayment->payable_amount = $request->get('payable_amount');
                $BookingPayment->paid_date = $paid_date;
                $BookingPayment->payment_method = $request->get('payment_method');
                $BookingPayment->save();

        // Booking Rooms

            foreach ($request->get('room_id') as $key => $room_id) {

                $GetroomDetails = Room::findOrFail($room_id);

                $BookingRoom = new BookingRoom;
                $BookingRoom->booking_id = $insertedId;
                $BookingRoom->room_id = $room_id;
                $BookingRoom->room_type = $GetroomDetails->room_type;
                $BookingRoom->room_floor = $GetroomDetails->room_floor;
                $BookingRoom->room_price = $request->room_price[$key];
                $BookingRoom->room_cal_price = $request->room_cal_price[$key];
                $BookingRoom->save();

                DB::table('rooms')->where('id', $room_id)->update(['booking_status' => 1]);
            }
        }

        return redirect()->route('booking.index')->with('add', 'New booking record detail successfully added !');
    }

    public function edit($id)
    {
        $data = Booking::findOrFail($id);
        $branch = Branch::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $room = Room::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $BookingRooms = BookingRoom::where('booking_id', '=', $id)->get();
        $paymentdata = BookingPayment::where('booking_id', '=', $id)->get();

        return view('pages.backend.booking.edit', compact('data', 'branch', 'BookingRooms', 'room', 'paymentdata'));
    }

    public function update(Request $request, $id)
    {
        $BookingData = Booking::findOrFail($id);
        $random_no =   rand(100,999);

        $BookingData->customer_name = $request->get('booking_customer_name');
        $BookingData->phone_number = $request->get('phone_number');
        $BookingData->whats_app_number = $request->get('whats_app_number');
        $BookingData->email_id = $request->get('email_id');
        $BookingData->address = $request->get('address');


        $BookingData->male_count = $request->get('male_count');
        $BookingData->female_count = $request->get('female_count');
        $BookingData->child_count = $request->get('child_count');
        $BookingData->check_in_date = $request->get('check_in_date');
        $BookingData->check_in_time = $request->get('check_in_time');
        $BookingData->check_out_date = $request->get('check_out_date');
        $BookingData->check_out_time = $request->get('check_out_time');
        $BookingData->days = $request->get('days');
        $BookingData->branch_id = $request->get('branch_id');
        if($request->get('proofs') == 1){
            if($BookingData->proofs == 2){
                $BookingData->prooftype_two = 'NULL';
                $BookingData->proofimage_two = 'NULL';
            }
        }
        $BookingData->proofs = $request->get('proofs');

        $proof = $request->get('proofs');
        if($proof == 1){

            $BookingData->prooftype_one = $request->get('prooftype_one');
            if ($request->proofimage_one != "") {
                $proofimage_one = $request->proofimage_one;
                $filename_one = $BookingData->customer_name . $random_no . ' Proof ' . $BookingData->prooftype_one . '.' . $proofimage_one->getClientOriginalExtension();
                $request->proofimage_one->move('assets', $filename_one);
                $BookingData->proofimage_one = $filename_one;
            } else {
                $Insertedproof_image_one = $BookingData->proofimage_one;
                $BookingData->proofimage_one = $Insertedproof_image_one;
            }





        }else if($proof == 2){

            $BookingData->prooftype_one = $request->get('prooftype_one');
            if ($request->proofimage_one != "") {
                $proofimage_one = $request->proofimage_one;
                $filename_one = $BookingData->customer_name . $random_no . ' Proof ' . $BookingData->prooftype_one . '.' . $proofimage_one->getClientOriginalExtension();
                $request->proofimage_one->move('assets', $filename_one);
                $BookingData->proofimage_one = $filename_one;
            } else {
                $Insertedproof_image_one = $BookingData->proofimage_one;
                $BookingData->proofimage_one = $Insertedproof_image_one;
            }


            $BookingData->prooftype_two = $request->get('prooftype_two');
            if ($request->proofimage_two != "") {
                $proofimage_two = $request->proofimage_two;
                $filename_two = $BookingData->customer_name . $random_no . ' Proof ' . $BookingData->prooftype_two . '.' . $proofimage_two->getClientOriginalExtension();
                $request->proofimage_two->move('assets', $filename_two);
                $BookingData->proofimage_two = $filename_two;
            } else {
                $Insertedproof_image_two = $BookingData->proofimage_two;
                $BookingData->proofimage_two = $Insertedproof_image_two;
            }

        }

        if ($request->customer_photo != "") {
        $customer_photo = $request->customer_photo;
        $folderPath = "assets/customer_details/profile";
        $image_parts = explode(";base64,", $customer_photo);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $BookingData->customer_name . '_' . $random_no . '_' . 'image' . '.png';
        $customerimgfile = $folderPath . $random_no . $fileName;
        file_put_contents($customerimgfile, $image_base64);
        $BookingData->customer_photo = $customerimgfile;
        }else{
          $Insertedcustomer_photo = $BookingData->customer_photo;
          $BookingData->customer_photo = $Insertedcustomer_photo;
        }

        $BookingData->total = $request->get('total_calc_price');
        $BookingData->gst_per = $request->get('gst_percentage');
        $BookingData->gst_amount = $request->get('gst_amount');
        $BookingData->disc_per = $request->get('discount_percentage');
        $BookingData->disc_amount = $request->get('discount_amount');
        $BookingData->additional_amount = $request->get('additional_charge');
        $BookingData->additional_notes = $request->get('additional_charge_notes');
        $BookingData->grand_total = $request->get('grand_total');

        $BookingData->balance_amount = $request->get('balance_amount');
        $BookingData->out_date = $request->get('check_out_date');
        $BookingData->out_time = $request->get('check_out_time');
        $BookingData->update();

        $booking_id = $id;

        // Booking Payments
        $total_paid = 0;
        foreach ($request->get('booking_payment_id') as $key => $booking_payment_id) {



            $ids = $booking_payment_id;
            $bookingID = $booking_id;
            $payment_term = $request->payment_term[$key];
            $payable_amount = $request->payable_amount[$key];
            $payment_method = $request->payment_method[$key];

            $total_paid += $payable_amount;



            DB::table('booking_payments')->where('id', $ids)
                    ->update([
                        'booking_id' => $bookingID,  'term' => $payment_term,  'payable_amount' => $payable_amount,  'payment_method' => $payment_method
                    ]);
        }
            $Booking_Data = Booking::findOrFail($id);
            $Booking_Data->total_paid = $total_paid;
            $Booking_Data->update();



        // Booking Rooms

        $getinsertedBookingRooms = BookingRoom::where('booking_id', '=', $booking_id)->get();
        $BookingRooms = array();
        foreach ($getinsertedBookingRooms as $key => $getinsertedBookingRoom) {
            $BookingRooms[] = $getinsertedBookingRoom->id;
        }
        $updatedroom_id = $request->room_auto_id;
        $updatedroomIDs = array_filter($updatedroom_id);
        $different_ids = array_merge(array_diff($BookingRooms, $updatedroomIDs), array_diff($updatedroomIDs, $BookingRooms));

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {

                $Rooms_ids = BookingRoom::findOrFail($different_id);
               DB::table('rooms')->where('id', $Rooms_ids->room_id)
                ->update([
                    'booking_status' => 0
                ]);
            }
        }

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                BookingRoom::where('id', $different_id)->delete();
            }
        }

        foreach ($request->get('room_auto_id') as $key => $room_auto_id) {

            if ($room_auto_id > 0) {
                $ids = $room_auto_id;
                $bookingID = $booking_id;
                $room_id = $request->room_id[$key];
                $room_price = $request->room_price[$key];
                $room_cal_price = $request->room_cal_price[$key];
                DB::table('booking_rooms')->where('id', $ids)
                        ->update([
                            'booking_id' => $bookingID,  'room_id' => $room_id,  'room_price' => $room_price,  'room_cal_price' => $room_cal_price
                        ]);
            } else if ($room_auto_id == '') {
                if ($request->room_id[$key] > 0) {

                    $GetroomDetails = Room::findOrFail($room_id);

                    $new_room_id =  $request->room_id[$key];
                    $room_price =  $request->room_price[$key];
                    $room_cal_price =  $request->room_cal_price[$key];

                    $BookingRoom = new BookingRoom;
                    $BookingRoom->booking_id = $booking_id;
                    $BookingRoom->room_id = $new_room_id;
                    $BookingRoom->room_type = $GetroomDetails->room_type;
                    $BookingRoom->room_floor = $GetroomDetails->room_floor;
                    $BookingRoom->room_price = $room_price;
                    $BookingRoom->room_cal_price = $room_cal_price;

                    $BookingRoom->save();

                    DB::table('rooms')->where('id', $new_room_id)
                        ->update(['booking_status' => 1]);
                }
            }
        }

       return redirect()->route('booking.index')->with('update', 'Booking record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Booking::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        $BookingRooms = BookingRoom::where('booking_id', '=', $id)->get();
        foreach ($BookingRooms as $key => $BookingRooms_arr) {

            $bookingroom_data = BookingRoom::findOrFail($BookingRooms_arr->id);
            $bookingroom_data->soft_delete = 1;
            $bookingroom_data->update();

        }

        return redirect()->route('booking.index')->with('soft_destroy', 'Successfully deleted the booking record !');
    }

    public function destroy($id)
    {
        $data = Booking::findOrFail($id);

        $data->delete();

        return redirect()->route('booking.index')->with('destroy', 'Successfully erased the booking record !');
    }

    public function checkout(Request $request, $id)
    {



        $data = Booking::findOrFail($id);



        $data->out_date = $checkout_date;
        $data->out_time = $checkout_time;
        $status = 2;
        $data->status = $status;
        $data->update();


        foreach ($request->get('room_id') as $key => $room_id) {
            DB::table('rooms')->where('id', $room_id)
            ->update(['booking_status' => 0]);
        }



        return redirect()->route('booking.index')->with('checkout', 'Successfully Updated');
    }


    public function pay_balance(Request $request, $id)
    {


        $paid_date = Carbon::now()->format('Y-m-d');


        $BookingPayment = new BookingPayment;
        $BookingPayment->booking_id = $id;
        $BookingPayment->term = $request->get('payment_term');
        $BookingPayment->payable_amount = $request->get('payable_amount');
        $BookingPayment->paid_date = $paid_date;
        $BookingPayment->payment_method = $request->get('payment_method');
        $BookingPayment->save();


        $payableAmount = $request->get('payable_amount');
        $data = Booking::findOrFail($id);
        $total_paid_amount = $data->total_paid + $payableAmount;
            $balance = $data->grand_total - $total_paid_amount;

            $data->total_paid = $total_paid_amount;
            $data->balance_amount = $balance;
            $data->update();





        return redirect()->route('booking.index')->with('paybalance', 'Balance Amount successfully added !');
    }

    public function view($id){
        $data = Booking::findOrFail($id);

            $roomsbooked = BookingRoom::where('booking_id', '=', $id)->get();
            $room_list = [];
            foreach ($roomsbooked as $key => $rooms_booked) {
                $Rooms = Room::findOrFail($rooms_booked->room_id);
                $room_list[] = array(
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                    'room_price' => $rooms_booked->room_price,
                    'days' => $data->days,
                    'room_cal_price' => $rooms_booked->room_cal_price,
                );
            }


        $branch = Branch::findOrFail($data->branch_id);

        return view('pages.backend.booking.view', compact('data', 'branch', 'room_list'));
    }


    public function datefilter(Request $request)
    {
        $booking_dropdown_list = $request->get('booking_dropdown_list');
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');

        if($booking_dropdown_list == 'checkout'){
            $checkin_Array = [];
            $room_list = [];
            $terms = [];

            $checkout_Data = Booking::whereBetween('check_out_date', [$from_date, $to_date])
                                    ->where('soft_delete', '!=', 1)
                                    ->where('status', '=', 2)
                                    ->get();

                foreach ($checkout_Data as $key => $checkout_Datas) {

                    $branch = Branch::findOrFail($checkout_Datas->branch_id);
                    $roomsbooked = BookingRoom::where('booking_id', '=', $checkout_Datas->id)->get();

                    foreach ($roomsbooked as $key => $rooms_booked) {
                        $Rooms = Room::findOrFail($rooms_booked->room_id);
                        $room_list[] = array(
                            'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                            'booking_id' => $checkout_Datas->id,
                            'booking_room_price' => $rooms_booked->room_price,
                            'room_cal_price' => $rooms_booked->room_cal_price,
                            'id' => $rooms_booked->id,
                            'room_id' => $rooms_booked->room_id,

                        );
                    }

                    $payment_data = BookingPayment::where('booking_id', '=', $checkout_Datas->id)->get();
                    foreach ($payment_data as $key => $payment_datas) {
                        $terms[] = array(
                            'booking_id' => $checkout_Datas->id,
                            'term' => $payment_datas->term,
                            'payable_amount' => $payment_datas->payable_amount,
                        );
                    }



                        $checkin_Array[] = array(
                            'customer_name' => $checkout_Datas->customer_name,
                            'room_list' => $room_list,
                            'branch' => $branch->name,
                            'chick_in_date' => $checkout_Datas->check_in_date,
                            'chick_in_time' => $checkout_Datas->check_in_time,
                            'id' => $checkout_Datas->id,
                            'chick_out_date' => $checkout_Datas->check_out_date,
                            'out_date' => $checkout_Datas->out_date,
                            'chick_out_time' => $checkout_Datas->check_out_time,
                            'phone_number' => $checkout_Datas->phone_number,
                            'grand_total' => $checkout_Datas->grand_total,
                            'total_paid' => $checkout_Datas->total_paid,
                            'balance_amount' => $checkout_Datas->balance_amount,
                            'days' => $checkout_Datas->days,
                            'gst_per' => $checkout_Datas->gst_per,
                            'gst_amount' => $checkout_Datas->gst_amount,
                            'disc_per' => $checkout_Datas->disc_per,
                            'disc_amount' => $checkout_Datas->disc_amount,
                            'additional_amount' => $checkout_Datas->additional_amount,
                            'additional_notes' => $checkout_Datas->additional_notes,
                            'total' => $checkout_Datas->total,
                            'terms' => $terms,
                            'status' => $checkout_Datas->status,
                            'extended_date' => $checkout_Datas->extended_date,
                            'extended_time' => $checkout_Datas->extended_time,
                        );
                }
                return view('pages.backend.booking.datefilter', compact('checkin_Array', 'booking_dropdown_list', 'from_date', 'to_date'));
        }else{
            $checkin_Array = [];
            $room_list = [];
            $terms = [];

            $checkin_Data = Booking::whereBetween('check_in_date', [$from_date, $to_date])
                                            ->where('soft_delete', '!=', 1)
                                            ->get();

                foreach ($checkin_Data as $key => $checkin_Datas) {

                    $branch = Branch::findOrFail($checkin_Datas->branch_id);
                    $roomsbooked = BookingRoom::where('booking_id', '=', $checkin_Datas->id)->get();

                    foreach ($roomsbooked as $key => $rooms_booked) {
                        $Rooms = Room::findOrFail($rooms_booked->room_id);
                        $room_list[] = array(
                            'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                            'booking_id' => $checkin_Datas->id,
                            'booking_room_price' => $rooms_booked->room_price,
                            'room_cal_price' => $rooms_booked->room_cal_price,
                            'id' => $rooms_booked->id,
                            'room_id' => $rooms_booked->room_id,

                        );
                    }

                    $payment_data = BookingPayment::where('booking_id', '=', $checkin_Datas->id)->get();
                    foreach ($payment_data as $key => $payment_datas) {
                        $terms[] = array(
                            'booking_id' => $checkin_Datas->id,
                            'term' => $payment_datas->term,
                            'payable_amount' => $payment_datas->payable_amount,
                        );
                    }




                    $checkin_Array[] = array(
                        'customer_name' => $checkin_Datas->customer_name,
                        'room_list' => $room_list,
                        'branch' => $branch->name,
                        'chick_in_date' => $checkin_Datas->check_in_date,
                        'chick_in_time' => $checkin_Datas->check_in_time,
                        'id' => $checkin_Datas->id,
                        'chick_out_date' => $checkin_Datas->check_out_date,
                        'out_date' => $checkin_Datas->out_date,
                        'chick_out_time' => $checkin_Datas->check_out_time,
                        'phone_number' => $checkin_Datas->phone_number,
                        'grand_total' => $checkin_Datas->grand_total,
                        'total_paid' => $checkin_Datas->total_paid,
                        'balance_amount' => $checkin_Datas->balance_amount,
                        'days' => $checkin_Datas->days,
                        'gst_per' => $checkin_Datas->gst_per,
                        'gst_amount' => $checkin_Datas->gst_amount,
                        'disc_per' => $checkin_Datas->disc_per,
                        'disc_amount' => $checkin_Datas->disc_amount,
                        'additional_amount' => $checkin_Datas->additional_amount,
                        'additional_notes' => $checkin_Datas->additional_notes,
                        'total' => $checkin_Datas->total,
                        'terms' => $terms,
                        'status' => $checkin_Datas->status,
                        'extended_date' => $checkin_Datas->extended_date,
                        'extended_time' => $checkin_Datas->extended_time,
                    );
                }


            return view('pages.backend.booking.datefilter', compact('checkin_Array', 'booking_dropdown_list', 'from_date', 'to_date'));
        }



    }



    public function autocomplete(Request $request)
    {

        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Booking::select("phone_number", "customer_name", "whats_app_number", "email_id", "address")
                    ->where('phone_number', 'LIKE', "%{$query}%")
                    ->get();
            $output = '<ul class="dropdown-menu form-control" style="display:block; position:relative; padding: 9px;background: #9ddbdb2e;">';
            foreach($data as $row)
            {
             $output .= '
            <li><a href="#" style="color:black;padding:5px;">'.$row->phone_number.'</a></li>
            ';
            }
            $output .= '</ul>';
            echo $output;

        }
    }


    public function getoldCustomers($phone_no)
    {
        $GetCustomer = Booking::select('*')->where('phone_number', $phone_no)->get();
        $userData['data'] = $GetCustomer;
        echo json_encode($userData);
    }


    public function extend(Request $request, $id)
    {



        $data = Booking::findOrFail($id);



        $data->extended_date = $request->get('extended_date');
        $data->check_out_date = $request->get('extended_date');
        $data->extended_time = $request->get('extended_time');
        $data->check_out_time = $request->get('extended_time');
        $data->days = $request->get('no_of_days');
        $data->total = $request->get('total_calc_price');
        $data->gst_amount = $request->get('gst_amount');
        $data->gst_per = $request->get('gst_percentage');
        $data->disc_amount = $request->get('discount_amount');
        $data->disc_per = $request->get('discount_percentage');
        $data->additional_amount = $request->get('additional_charge');
        $data->additional_notes = $request->get('additional_charge_notes');
        $data->grand_total = $request->get('grand_total');
        $data->total_paid = $request->get('payable_amount');
        $data->balance_amount = $request->get('balance_amount');
        $status = 1;
        $data->status = $status;
        $data->update();





        if($request->get('balance_amount') > 0){

            $BookingPayment = new BookingPayment;
            $BookingPayment->booking_id = $request->get('booking_id');
            $BookingPayment->term = $request->get('payment_term');
            $BookingPayment->payable_amount = $request->get('balance_amount');
            $BookingPayment->paid_date = $paiddate;
            $BookingPayment->payment_method = $request->get('payment_method');
            $BookingPayment->save();


            $payableAmount = $request->get('balance_amount');

            $booking_data = Booking::findOrFail($id);
            $total_paid_amount = $booking_data->total_paid + $payableAmount;
            $balance = $booking_data->grand_total - $total_paid_amount;

            $booking_data->total_paid = $total_paid_amount;
            $booking_data->balance_amount = $balance;
            $booking_data->update();


            foreach ($request->get('room_auto_id') as $key => $room_auto_id) {


                $ids = $room_auto_id;
                $bookingID = $request->get('booking_id');
                $booking_room_price = $request->booking_room_price[$key];
                $booking_room_cal_price = $request->booking_room_cal_price[$key];
                $room_id = $request->room_id[$key];
                DB::table('booking_rooms')->where('id', $ids)
                        ->update([
                            'room_price' => $booking_room_price,  'room_cal_price' => $booking_room_cal_price
                        ]);

            }


        }


        return redirect()->route('booking.index')->with('extend', 'Room Extended successfully');
    }


    public function pricing($id){

        $data = Booking::findOrFail($id);

        return view('pages.backend.booking.checkout', compact('data'));
    }

}
