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
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $Rooms->room_type . ' - ' . $Rooms->room_category,
                    'booking_id' => $datas->id
                );
            }

            $bookingData[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => $branch->name,
                'booking_date' => $datas->booking_date,
                'booking_time' => $datas->booking_time,
                'chick_in_date' => $datas->chick_in_date,
                'chick_in_time' => $datas->chick_in_time,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->chick_out_date,
                'chick_out_time' => $datas->chick_out_time,
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

        // Book
        $booknow = $request->get('booknow');
        if($booknow == 'booknow')
        {
        $data->customer_name = $request->get('booking_customer_name');
        $data->phone_number = $request->get('phone_number');
        $data->whats_app_number = $request->get('whats_app_number');
        $data->email_id = $request->get('email_id');
        $data->address = $request->get('address');
        $data->proof_type = $request->get('proof_type');

        if ($request->proof_image != "") {
            $proof_image = $request->proof_image;
            $filename = $data->customer_name . '_' . $random_no . '_' . 'proof' . '_' . $data->proof_type . '_'  . '.' . $proof_image->getClientOriginalExtension();
            $request->proof_image->move('assets/customer_details/proof', $filename);
            $data->proof_image = $filename;
        }

        $customer_photo = $request->customer_photo;
        $folderPath = "assets/customer_details/profile";
        $image_parts = explode(";base64,", $customer_photo);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $data->customer_name . '_' . $random_no . '_' . 'image' . '.png';
        $customerimgfile = $folderPath . $fileName;
        file_put_contents($customerimgfile, $image_base64);
        $data->customer_photo = $fileName;

        $data->branch_id = $request->get('branch_id');
        $data->adult_count = $request->get('adult_count');
        $data->child_count = $request->get('child_count');

        $data->booking_date = $request->get('booking_date');
        $data->booking_time = $request->get('booking_time');

        $status = 1;
        $data->status = $status;

        $data->save();

        $insertedId = $data->id;
            foreach ($request->get('room_id') as $key => $room_id) {

                $BookingRoom = new BookingRoom;
                $BookingRoom->booking_id = $insertedId;
                $BookingRoom->room_id = $room_id;
                $BookingRoom->save();

                DB::table('rooms')->where('id', $room_id)->update(['booking_status' => 1]);
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

        $customer_photo = $request->customer_photo;
        $folderPath = "assets/webcam";

        $image_parts = explode(";base64,", $customer_photo);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $data->customer_name . '.png';
        $customerimgfile = $folderPath . $random_no . $fileName;
        file_put_contents($customerimgfile, $image_base64);
        $data->customer_photo = $fileName;

        $data->branch_id = $request->get('branch_id');
        $data->adult_count = $request->get('adult_count');
        $data->child_count = $request->get('child_count');

        $data->booking_date = $request->get('booking_date');
        $data->booking_time = $request->get('booking_time');

        $data->chick_in_date = $request->get('booking_date');
        $data->chick_in_time = $request->get('booking_time');

        $status = 2;
        $data->status = $status;

        $data->save();

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

        if ($request->customer_photo != "") {
        $customer_photo = $request->customer_photo;
        $folderPath = "assets/webcam";
        $image_parts = explode(";base64,", $customer_photo);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $BookingData->customer_name . '.png';
        $customerimgfile = $folderPath . $random_no . $fileName;
        file_put_contents($customerimgfile, $image_base64);
        $BookingData->customer_photo = $fileName;
        }else{
           $Insertedcustomer_photo = $BookingData->customer_photo;
           $BookingData->customer_photo = $Insertedcustomer_photo;
        }

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
        $data->chick_in_date = $request->get('chick_in_date');
        $data->chick_in_time = $request->get('chick_in_time');

        $status = 2;
        $data->status = $status;

        $data->update();

        return redirect()->route('booking.index')->with('checkin', 'Checkin record detail successfully added');
    }


    public function checkout(Request $request, $id)
    {
        $data = Booking::findOrFail($id);
        $data->chick_out_date = $request->get('chick_out_date');
        $data->chick_out_time = $request->get('chick_out_time');

        $status = 3;
        $data->status = $status;

        $data->update();

        $branch = Branch::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $room = Room::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $BookingRooms = BookingRoom::where('booking_id', '=', $id)->get();

        return view('pages.backend.booking.checkout', compact('data', 'branch', 'BookingRooms', 'room'));
    }

    public function pricing($id){

        $data = Booking::findOrFail($id);

        return view('pages.backend.booking.checkout', compact('data'));
    }

}
