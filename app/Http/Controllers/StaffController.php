<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $data = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.staff.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Staff();

        $data->name = $request->get('name');

        $data->save();

        return redirect()->route('staff.index')->with('add', 'New staff information has been added to your list.');
    }

    public function edit($id)
    {
        $data = Staff::findOrFail($id);

        return view('pages.backend.staff.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Staff::findOrFail($id);

        $data->name = $request->get('name');

        $data->update();

        return redirect()->route('staff.index')->with('update', 'Updated staff information has been added to your list.');
    }

    public function delete($id)
    {
        $data = Staff::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('staff.index')->with('soft_destroy', 'Successful removal of the staff record for the list.');
    }

    public function destroy($id)
    {
        $data = Staff::findOrFail($id);

        $data->delete();

        return redirect()->route('staff.index')->with('destroy', 'Successfully erased the staff record !');
    }
}
