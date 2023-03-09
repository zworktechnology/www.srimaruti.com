<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
use Illuminate\Http\Request;

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

        $data->booking_customer_name = $request->get('booking_customer_name');
        $data->proof_type = $request->get('proof_type');
        $data->proof_image = $request->get('proof_image');
        $data->customer_photo = $request->get('customer_photo');
        $data->booking_date = $request->get('booking_date');
        $data->chick_in_date = $request->get('chick_in_date');
        $data->chick_in_time = $request->get('chick_in_time');
        $data->phone_number = $request->get('phone_number');
        $data->whats_app_number = $request->get('whats_app_number');
        $data->email_id = $request->get('email_id');
        $data->status = $request->get('status');

        $data->save();

        return redirect()->route('booking.index')->with('add', 'New booking record detail successfully added !');
    }

    public function edit($id)
    {
        $data = Booking::findOrFail($id);

        return view('pages.backend.booking.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Booking::findOrFail($id);

        $data->booking_customer_name = $request->get('booking_customer_name');
        $data->proof_type = $request->get('proof_type');
        $data->proof_image = $request->get('proof_image');
        $data->customer_photo = $request->get('customer_photo');
        $data->booking_date = $request->get('booking_date');
        $data->chick_in_date = $request->get('chick_in_date');
        $data->chick_in_time = $request->get('chick_in_time');
        $data->chick_out_date = $request->get('chick_out_date');
        $data->chick_out_time = $request->get('chick_out_time');
        $data->phone_number = $request->get('phone_number');
        $data->whats_app_number = $request->get('whats_app_number');
        $data->email_id = $request->get('email_id');
        $data->status = $request->get('status');

        $data->update();

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
