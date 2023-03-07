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

        return view('pages.backend.room.index', compact('data', 'branch'));
    }

    public function store(Request $request)
    {
        $data = new Room();

        $data->room_number = $request->get('room_number');
        $data->room_type = $request->get('room_type');
        $data->room_floor = $request->get('room_floor');
        $data->branch_id = $request->get('branch_id');

        $data->save();

        return redirect()->route('room.index')->with('add', 'New Room record detail successfully added !');
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
        $data->room_floor = $request->get('room_floor');
        $data->branch_id = $request->get('branch_id');

        $data->update();

        return redirect()->route('room.index')->with('update', 'Room record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Room::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('room.index')->with('soft_destroy', 'Successfully deleted the room record !');
    }

    public function destroy($id)
    {
        $data = Room::findOrFail($id);

        $data->delete();

        return redirect()->route('room.index')->with('destroy', 'Successfully erased the room record !');
    }
}
