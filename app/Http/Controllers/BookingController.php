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

    public function store()
    {
        return redirect()->route('booking.index')->with('add', 'New booking record detail successfully added !');
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
