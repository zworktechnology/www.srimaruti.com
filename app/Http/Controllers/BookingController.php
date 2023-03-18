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

class BookingController extends Controller
{
    public function index()
    {
        $data = Booking::where('soft_delete', '!=', 1)->get();
        $bookingData = [];
        $room_list = [];
        foreach ($data as $key => $datas) {
            $branch = Branch::findOrFail($datas->branch_id);

            $roomsbooked = BookingRoom::where('booking_id', '=', $datas->id)->where('soft_delete', '!=', 1)->get();

            foreach ($roomsbooked as $key => $rooms_booked) {
                $Rooms = Room::findOrFail($rooms_booked->room_id);
                $room_list[] = array(
                    'room' => 'Room No . '. $Rooms->room_number .' - Floor . ' . $Rooms->room_floor . ' - ' . $Rooms->room_type,
                    'booking_id' => $datas->id
                );
            }
            
           $monthOfdate = date("m",strtotime($datas->booking_date));
           if($monthOfdate == 1){
                $Month = 'January';
           }else if($monthOfdate == 2){
                $Month = 'February';
           }else if($monthOfdate == 3){
                $Month = 'March';
           }else if($monthOfdate == 4){
                $Month = 'April';
           }else if($monthOfdate == 5){
                $Month = 'May';
           }else if($monthOfdate == 6){
                $Month = 'June';
           }else if($monthOfdate == 7){
                $Month = 'July';
           }else if($monthOfdate == 8){
                $Month = 'August';
           }else if($monthOfdate == 9){
                $Month = 'September';
           }else if($monthOfdate == 10){
                $Month = 'October';
           }else if($monthOfdate == 11){
                $Month = 'November';
           }else if($monthOfdate == 12){
                $Month = 'December';
           }



           $checkinmonthOfdate = date("m",strtotime($datas->chick_in_date));
           if($checkinmonthOfdate == 1){
                $checkinMonth = 'January';
           }else if($checkinmonthOfdate == 2){
                $checkinMonth = 'February';
           }else if($checkinmonthOfdate == 3){
                $checkinMonth = 'March';
           }else if($checkinmonthOfdate == 4){
                $checkinMonth = 'April';
           }else if($checkinmonthOfdate == 5){
                $checkinMonth = 'May';
           }else if($checkinmonthOfdate == 6){
                $checkinMonth = 'June';
           }else if($checkinmonthOfdate == 7){
                $checkinMonth = 'July';
           }else if($checkinmonthOfdate == 8){
                $checkinMonth = 'August';
           }else if($checkinmonthOfdate == 9){
                $checkinMonth = 'September';
           }else if($checkinmonthOfdate == 10){
                $checkinMonth = 'October';
           }else if($checkinmonthOfdate == 11){
                $checkinMonth = 'November';
           }else if($checkinmonthOfdate == 12){
                $checkinMonth = 'December';
           }


           $checkinDate = $datas->chick_in_date;
           if($checkinDate != NULL){
                $chekin = date("d",strtotime($datas->chick_in_date)). ', ' . $checkinMonth . ' ' . date("Y",strtotime($datas->chick_in_date));
                $chekin_time = $datas->chick_in_time . ' : ' . $datas->chick_in_minute . ' ' . $datas->chick_in_minute_ampm;
           }else{
                $chekin = '';
                $chekin_time = '';
           }



           $checkoutmonthOfdate = date("m",strtotime($datas->chick_out_date));
           if($checkoutmonthOfdate == 1){
                $checkoutMonth = 'January';
           }else if($checkoutmonthOfdate == 2){
                $checkoutMonth = 'February';
           }else if($checkoutmonthOfdate == 3){
                $checkoutMonth = 'March';
           }else if($checkoutmonthOfdate == 4){
                $checkoutMonth = 'April';
           }else if($checkoutmonthOfdate == 5){
                $checkoutMonth = 'May';
           }else if($checkoutmonthOfdate == 6){
                $checkoutMonth = 'June';
           }else if($checkoutmonthOfdate == 7){
                $checkoutMonth = 'July';
           }else if($checkoutmonthOfdate == 8){
                $checkoutMonth = 'August';
           }else if($checkoutmonthOfdate == 9){
                $checkoutMonth = 'September';
           }else if($checkoutmonthOfdate == 10){
                $checkoutMonth = 'October';
           }else if($checkoutmonthOfdate == 11){
                $checkoutMonth = 'November';
           }else if($checkoutmonthOfdate == 12){
                $checkoutMonth = 'December';
           }


           $chick_out_time = $datas->chick_out_time;
           if($chick_out_time != NULL){
                $chekout_date = date("d",strtotime($datas->chick_out_date)). ', ' . $checkoutMonth . ' ' . date("Y",strtotime($datas->chick_out_date));
                $chekout_time = $datas->chick_out_time . ' : ' . $datas->check_out_minute . ' ' . $datas->checkout_minute_ampm;
           }else{
                $chekout_date = '';
                $chekout_time = '';
           }

            $bookingData[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => $branch->name,
                'booking_date' => date("d",strtotime($datas->booking_date)). ', ' . $Month . ' ' . date("Y",strtotime($datas->booking_date)),
                'booking_time' => $datas->booking_time . ' : ' . $datas->booking_minute . ' ' . $datas->booking_minute_ampm,
                'chick_in_date' => $chekin,
                'checkin_time' => $chekin_time,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->chick_out_date,
                'chekout_date' => $chekout_date,
                'chekout_time' => $chekout_time,
            );
        }
        $today = date('Y-m-d');
        $today_time = date('H:i:s');

        return view('pages.backend.booking.index', compact('bookingData', 'today', 'today_time'));
    }

    public function create()
    {
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $room = Room::where('soft_delete', '!=', 1)->get();
        $today = date('Y-m-d');

        return view('pages.backend.booking.create', compact('branch', 'room', 'today'));
    }

    public function store(Request $request)
    {

        $data = new Booking();
        $random_no =   rand(100,999);


        // Book
        $booknow = $request->get('booknow');
        if($booknow == 'booknow'){

        $data->customer_name = $request->get('booking_customer_name');
        $data->phone_number = $request->get('phone_number');
        $data->whats_app_number = $request->get('whats_app_number');
        $data->email_id = $request->get('email_id');
        $data->address = $request->get('address');
        $data->proof_type = $request->get('proof_type');

        if ($request->proof_image != "") {
            $proof_image = $request->proof_image;
            $filename = $data->customer_name . $random_no . ' Proof ' . $data->proof_type . '.' . $proof_image->getClientOriginalExtension();
            $request->proof_image->move('assets', $filename);
            $data->proof_image = $filename;
        }

        //$customer_photo = $request->customer_photo;
        //$folderPath = "assets/webcam";

        //$image_parts = explode(";base64,", $customer_photo);
        //$image_type_aux = explode("image/", $image_parts[0]);
        //$image_type = $image_type_aux[1];
        //$image_base64 = base64_decode($image_parts[1]);
        //$fileName = $data->customer_name . '.png';
        //$customerimgfile = $folderPath . $random_no . $fileName;
        //file_put_contents($customerimgfile, $image_base64);
        //$data->customer_photo = $fileName;

        $data->branch_id = $request->get('branch_id');
        $data->adult_count = $request->get('adult_count');
        $data->child_count = $request->get('child_count');

        if(function_exists('date_default_timezone_set')) {
            date_default_timezone_set("Asia/Kolkata");
        }
        
        $data->booking_date = $request->get('booking_date');
        $data->booking_time = $request->get('booking_time');
        $data->booking_minute = $request->get('booking_minute');
        $data->booking_minute_ampm = $request->get('booking_minute_ampm');

        $status = 1;
        $data->status = $status;


        $data->save();
        //dd($data);

        $insertedId = $data->id;
            foreach ($request->get('room_id') as $key => $room_id) {

                $BookingRoom = new BookingRoom;
                $BookingRoom->booking_id = $insertedId;
                $BookingRoom->room_id = $room_id;
                $BookingRoom->save();


                DB::table('rooms')->where('id', $room_id)
                        ->update(['booking_status' => 1]);
            }
        }


        // Book & Checkin
        $bookandcheckin = $request->get('bookandcheckin');
        if($bookandcheckin == 'bookandcheckin'){

        $data->customer_name = $request->get('booking_customer_name');
        $data->phone_number = $request->get('phone_number');
        $data->whats_app_number = $request->get('whats_app_number');
        $data->email_id = $request->get('email_id');
        $data->address = $request->get('address');
        $data->proof_type = $request->get('proof_type');

        if ($request->proof_image != "") {
            $proof_image = $request->proof_image;
            $filename = $data->customer_name . $random_no . ' Proof ' . $data->proof_type . '.' . $proof_image->getClientOriginalExtension();
            $request->proof_image->move('assets', $filename);
            $data->proof_image = $filename;
        }

        //$customer_photo = $request->customer_photo;
        //$folderPath = "assets/webcam";

        //$image_parts = explode(";base64,", $customer_photo);
        //$image_type_aux = explode("image/", $image_parts[0]);
        //$image_type = $image_type_aux[1];
        //$image_base64 = base64_decode($image_parts[1]);
        //$fileName = $data->customer_name . '.png';
        //$customerimgfile = $folderPath . $random_no . $fileName;
        //file_put_contents($customerimgfile, $image_base64);
        //$data->customer_photo = $fileName;

        $data->branch_id = $request->get('branch_id');
        $data->adult_count = $request->get('adult_count');
        $data->child_count = $request->get('child_count');

        $data->booking_date = $request->get('booking_date');
        $data->booking_time = $request->get('booking_time');
        $data->booking_minute = $request->get('booking_minute');
        $data->booking_minute_ampm = $request->get('booking_minute_ampm');

        $data->chick_in_date = $request->get('booking_date');
        $data->chick_in_time = $request->get('booking_time');
        $data->chick_in_minute = $request->get('booking_minute');
        $data->chick_in_minute_ampm = $request->get('booking_minute_ampm');

        $status = 1;
        $data->status = $status;
        $data->save();
        //dd($data);

        $insertedId = $data->id;
            foreach ($request->get('room_id') as $key => $room_id) {

                $BookingRoom = new BookingRoom;
                $BookingRoom->booking_id = $insertedId;
                $BookingRoom->room_id = $room_id;
                $BookingRoom->save();


                DB::table('rooms')->where('id', $room_id)
                        ->update(['booking_status' => 1]);
            }
        }

        return redirect()->route('booking.index')->with('add', 'New booking record detail successfully added !');
    }

    public function edit($id)
    {
        $data = Booking::findOrFail($id);
        $branch = Branch::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $room = Room::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $BookingRooms = BookingRoom::where('booking_id', '=', $id)->where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.edit', compact('data', 'branch', 'BookingRooms', 'room'));
    }

    public function update(Request $request, $id)
    {

        $random_no =   rand(100,999);
        $BookingData = Booking::findOrFail($id);

        $BookingData->customer_name = $request->get('booking_customer_name');
        $BookingData->phone_number = $request->get('phone_number');
        $BookingData->whats_app_number = $request->get('whats_app_number');
        $BookingData->email_id = $request->get('email_id');
        $BookingData->address = $request->get('address');
        $BookingData->proof_type = $request->get('proof_type');

        if ($request->proof_image != "") {
            $proof_image = $request->proof_image;
            $filename = $BookingData->customer_name . $random_no . ' Proof ' . $BookingData->proof_type . '.' . $proof_image->getClientOriginalExtension();
            $request->proof_image->move('assets', $filename);
            $BookingData->proof_image = $filename;
        } else {
            
            $Insertedproof_image = $BookingData->proof_image;
            $BookingData->proof_image = $Insertedproof_image;
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
        //    $Insertedcustomer_photo = $BookingData->customer_photo;
        //    $BookingData->customer_photo = $Insertedcustomer_photo;
        //}


        $BookingData->branch_id = $request->get('branch_id');
        $BookingData->adult_count = $request->get('adult_count');
        $BookingData->child_count = $request->get('child_count');

        $BookingData->booking_date = $request->get('booking_date');
        $BookingData->booking_time = $request->get('booking_time');
        $BookingData->booking_minute = $request->get('booking_minute');
        $BookingData->booking_minute_ampm = $request->get('booking_minute_ampm');

        if($BookingData->chick_in_date != NULL){
            $BookingData->chick_in_date = $request->get('checkindate');
            $BookingData->chick_in_time = $request->get('checkin_time');
            $BookingData->chick_in_minute = $request->get('checkin_minute');
            $BookingData->chick_in_minute_ampm = $request->get('checkin_minute_ampm');
        }
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
        //dd($different_ids);




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

                    $new_room_id =  $request->room_id[$key];
                    $BookingRoom = new BookingRoom;
                    $BookingRoom->booking_id = $booking_id;
                    $BookingRoom->room_id = $new_room_id;
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


    public function checkin(Request $request, $id)
    {
        $data = Booking::findOrFail($id);
        $data->chick_in_date = $request->get('checkindate');
        $data->chick_in_time = $request->get('checkin_time');
        $data->chick_in_minute = $request->get('checkin_minute');
        $data->chick_in_minute_ampm = $request->get('checkin_minute_ampm');

        $data->update();

        return redirect()->route('booking.index')->with('checkin', 'Checkin record detail successfully added');
    }


    public function checkout(Request $request, $id)
    {
        $data = Booking::findOrFail($id);
        $data->chick_out_date = $request->get('checkout_date');
        $data->chick_out_time = $request->get('checkout_time');
        $data->check_out_minute = $request->get('checkout_minute');
        $data->checkout_minute_ampm = $request->get('checkout_minute_ampm');

        $data->update();

        return view('pages.backend.booking.pricing', compact('data'));
    }

    public function pricing($id){

        $data = Booking::findOrFail($id);

        return view('pages.backend.booking.pricing', compact('data'));
    }



    //public function AddCheckin()
  //  {
   //     $clicktocheckin = request()->get('clicktocheckin');
    //    $booking_id = request()->get('booking_id');
    //    $GetTodayCheckinDate = date('Y-m-d');
    //    $GetTodayCheckinTime = date('H:i:s');


   //     DB::table('bookings')->where('id', $booking_id)
    //                    ->update(['chick_in_date' => $GetTodayCheckinDate,  'chick_in_time' => $GetTodayCheckinTime]);
        
    //                    echo json_encode(
    //                            array('status' => 'success')
    //                        );
                        
                        //echo json_encode($output); 
   // }


}
