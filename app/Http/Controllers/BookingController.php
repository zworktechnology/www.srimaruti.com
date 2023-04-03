<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
use App\Models\BookingRoom;
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
                );
            }
            

            $bookingData[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => $branch->name,
                'chick_in_date' => $datas->check_in_date,
                'chick_in_time' => $datas->check_in_time,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->check_out_date,
                'chick_out_time' => $datas->check_out_time,
                'phone_number' => $datas->phone_number,
                'grand_total' => $datas->grand_total,
                'payable_amount' => $datas->payable_amount,
                'balance_amount' => $datas->balance_amount,
                'days' => $datas->days,
                'gst_per' => $datas->gst_per,
                'gst_amount' => $datas->gst_amount,
                'disc_per' => $datas->disc_per,
                'disc_amount' => $datas->disc_amount,
                'additional_amount' => $datas->additional_amount,
                'additional_notes' => $datas->additional_notes,
                'total' => $datas->total,
            );
        }
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('pages.backend.booking.index', compact('bookingData', 'today', 'timenow'));
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

        //$customer_photo = $request->customer_photo;
        //$folderPath = "assets/customer_details/profile";
        //$image_parts = explode(";base64,", $customer_photo);
        //$image_type_aux = explode("image/", $image_parts[0]);
        //$image_type = $image_type_aux[1];
        //$image_base64 = base64_decode($image_parts[1]);
        //$fileName = $data->customer_name . '_' . $random_no . '_' . 'image' . '.png';
        //$customerimgfile = $folderPath . $fileName;
        //file_put_contents($customerimgfile, $image_base64);
        //$data->customer_photo = $fileName;

        $data->total = $request->get('total_calc_price');
        $data->gst_per = $request->get('gst_percentage');
        $data->gst_amount = $request->get('gst_amount');
        $data->disc_per = $request->get('discount_percentage');
        $data->disc_amount = $request->get('discount_amount');
        $data->additional_amount = $request->get('additional_charge');
        $data->additional_notes = $request->get('additional_charge_notes');
        $data->grand_total = $request->get('grand_total');
        $data->grand_total = $request->get('grand_total');
        $data->payable_amount = $request->get('payable_amount');
        $data->balance_amount = $request->get('balance_amount');
        $data->payment_method = $request->get('payment_method');

        $status = 1;
        $data->status = $status;

        $data->save();

        $insertedId = $data->id;
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

        return view('pages.backend.booking.edit', compact('data', 'branch', 'BookingRooms', 'room'));
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

    

        //if ($request->customer_photo != "") {
        //$customer_photo = $request->customer_photo;
        //$folderPath = "assets/webcam";
        //$image_parts = explode(";base64,", $customer_photo);
        //$image_type_aux = explode("image/", $image_parts[0]);
        //$image_type = $image_type_aux[1];
        //$image_base64 = base64_decode($image_parts[1]);
        //$fileName = $BookingData->customer_name . '.png';
        //$customerimgfile = $folderPath . $random_no . $fileName;
        //file_put_contents($customerimgfile, $image_base64);
        //$BookingData->customer_photo = $fileName;
        //}else{
        //   $Insertedcustomer_photo = $BookingData->customer_photo;
        //   $BookingData->customer_photo = $Insertedcustomer_photo;
        //}

        $BookingData->total = $request->get('total_calc_price');
        $BookingData->gst_per = $request->get('gst_percentage');
        $BookingData->gst_amount = $request->get('gst_amount');
        $BookingData->disc_per = $request->get('discount_percentage');
        $BookingData->disc_amount = $request->get('discount_amount');
        $BookingData->additional_amount = $request->get('additional_charge');
        $BookingData->additional_notes = $request->get('additional_charge_notes');
        $BookingData->grand_total = $request->get('grand_total');
        $BookingData->payment_method = $request->get('payment_method');
        $BookingData->payable_amount = $request->get('payable_amount');
        $BookingData->balance_amount = $request->get('balance_amount');
        $BookingData->update();



        $booking_id = $id;
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
                DB::table('booking_rooms')->where('id', $ids)
                        ->update([
                            'booking_id' => $bookingID,  'room_id' => $room_id
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

                    //dd($room_price);
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


        $data->check_in_date = $request->get('checkin_date');
        $data->check_in_time = $request->get('checkin_time');
        $data->check_out_date = $request->get('checkout_date');
        $data->check_out_time = $request->get('checkout_time');
        $data->days = $request->get('no_of_days');
        $data->total = $request->get('total_calc_price');
        $data->gst_amount = $request->get('gst_amount');
        $data->gst_per = $request->get('gst_percentage');
        $data->disc_amount = $request->get('discount_amount');
        $data->disc_per = $request->get('discount_percentage');
        $data->additional_amount = $request->get('additional_charge');
        $data->additional_notes = $request->get('additional_charge_notes');
        $data->grand_total = $request->get('grand_total');
        $data->payable_amount = $request->get('payable_amount');
        $data->balance_amount = $request->get('balance_amount');
        $data->update();



        foreach ($request->get('room_auto_id') as $key => $room_auto_id) {

            
                $ids = $room_auto_id;
                $bookingID = $request->get('booking_id');
                $booking_room_price = $request->booking_room_price[$key];
                $booking_room_cal_price = $request->booking_room_cal_price[$key];
                DB::table('booking_rooms')->where('id', $ids)
                        ->update([
                            'room_price' => $booking_room_price,  'room_cal_price' => $booking_room_cal_price
                        ]);
            
        }
        
        

        return redirect()->route('booking.index')->with('pay_balance', 'Balance Amount successfully added');
    }


    //public function checkout(Request $request, $id)
    //{
     //   $data = Booking::findOrFail($id);
    //    $data->chick_out_date = $request->get('chick_out_date');
     //   $data->chick_out_time = $request->get('chick_out_time');

     //   $status = 3;
    //    $data->status = $status;

    //    $data->update();

    //    $branch = Branch::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
    //    $room = Room::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
     //   $BookingRooms = BookingRoom::where('booking_id', '=', $id)->get();

    //    return view('pages.backend.booking.checkout', compact('data', 'branch', 'BookingRooms', 'room'));
   // }

    public function pricing($id){

        $data = Booking::findOrFail($id);

        return view('pages.backend.booking.checkout', compact('data'));
    }

}
