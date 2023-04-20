<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $data = Room::where('soft_delete', '!=', 1)->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $totalrooms = Room::where('soft_delete', '!=', 1)->count();
        $bookedrooms = Room::where('soft_delete', '!=', 1)->where('booking_status', '=', 1)->count();
        $openingrooms = Room::where('soft_delete', '!=', 1)->where('booking_status', '=', 0)->count();

        return view('pages.backend.room.index', compact('data', 'branch', 'totalrooms', 'bookedrooms', 'openingrooms'));
    }

    public function store(Request $request)
    {
        $data = new Room();

        $data->room_number = $request->get('room_number');
        $data->room_type = $request->get('room_type');
        $data->room_category = $request->get('room_category');
        $data->room_floor = $request->get('room_floor');
        $data->branch_id = $request->get('branch_id');

        $data->save();

        return redirect()->route('room.index')->with('add', 'New room information has been added to your list.');
    }

    public function edit($id)
    {
        $data = Room::findOrFail($id);
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.room.edit', compact('data', 'branch'));
    }

    public function update(Request $request, $id)
    {
        $data = Room::findOrFail($id);

        $data->room_number = $request->get('room_number');
        $data->room_type = $request->get('room_type');
        $data->room_category = $request->get('room_category');
        $data->room_floor = $request->get('room_floor');
        $data->branch_id = $request->get('branch_id');

        $data->update();

        return redirect()->route('room.index')->with('update', 'Updated room information has been added to your list.');
    }

    public function delete($id)
    {
        $data = Room::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('room.index')->with('soft_destroy', 'Successful removal of the room record for the list.');
    }

    public function destroy($id)
    {
        $data = Room::findOrFail($id);

        $data->delete();

        return redirect()->route('room.index')->with('destroy', 'Successfully erased the room record !');
    }



    public function getBranchwiseRoom($branch_id)
    {
        $GetBranch = Room::where('branch_id', '=', $branch_id)->get();
        $userData['data'] = $GetBranch;
        echo json_encode($userData);
    }

    public function getPriceforRooms($room_id)
    {
        //$GetRoom = Room::where('id', '=', $room_id)->first();
        $GetRoom = Room::findOrFail($room_id);
        $userData['data'] = $GetRoom->price_per_day;
        echo json_encode($userData);
    }
}
