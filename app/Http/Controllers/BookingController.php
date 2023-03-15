<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    public function index()
    {
        $data = Booking::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.index', compact('data'));
    }

    public function create()
    {
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $room = Room::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.create', compact('branch', 'room'));
    }

    public function store(Request $request)
    {

        $data = new Booking();
        $random_no =   rand(100,999);

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
        $booking_date = date('Y-m-d');
        $data->booking_date = $booking_date;

        //$checkindate = date('Y-m-d');
        //$checkintime = date('H:i:s');

        $data->save();
        }

        //return redirect()->route('booking.index')->with('add', 'New booking record detail successfully added !');
    }

    public function edit($id)
    {
        $data = Booking::findOrFail($id);

        return view('pages.backend.booking.edit', compact('data'));
    }

    public function update()
    {
       return redirect()->route('booking.index')->with('update', 'Booking record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Booking::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('booking.index')->with('soft_destroy', 'Successfully deleted the booking record !');
    }

    public function destroy($id)
    {
        $data = Booking::findOrFail($id);

        $data->delete();

        return redirect()->route('booking.index')->with('destroy', 'Successfully erased the booking record !');
    }
}
