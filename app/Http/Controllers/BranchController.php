<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Room;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $data = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.branch.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Branch();

        $data->name = $request->get('name');
        $data->address = $request->get('address');

        $data->save();

        return redirect()->route('branch.index')->with('add', 'New Branch record detail successfully added !');
    }

    public function edit($id)
    {
        $data = Branch::findOrFail($id);

        return view('pages.backend.branch.edit', compact('data'));
    }

    public function view($id)
    {
        $branch = Branch::findOrFail($id);
        $data = Room::where('branch_id', '=', $branch->id)->where('soft_delete', '!=', 1)->get();
        $totalrooms = Room::where('branch_id', '=', $branch->id)->where('soft_delete', '!=', 1)->count();
        $bookedrooms = Room::where('branch_id', '=', $branch->id)->where('soft_delete', '!=', 1)->where('booking_status', '=', 1)->count();
        $openingrooms = Room::where('branch_id', '=', $branch->id)->where('soft_delete', '!=', 1)->where('booking_status', '=', 0)->count();

        return view('pages.backend.branch.view', compact('data', 'branch', 'totalrooms', 'bookedrooms', 'openingrooms'));
    }

    public function update(Request $request, $id)
    {
        $data = Branch::findOrFail($id);

        $data->name = $request->get('name');
        $data->address = $request->get('address');

        $data->update();

        return redirect()->route('branch.index')->with('update', 'Branch record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Branch::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('branch.index')->with('soft_destroy', 'Successfully deleted the branch record !');
    }

    public function destroy($id)
    {
        $data = Branch::findOrFail($id);

        $data->delete();

        return redirect()->route('branch.index')->with('destroy', 'Successfully erased the branch record !');
    }
}
