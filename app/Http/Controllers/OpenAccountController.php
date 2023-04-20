<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\OpenAccount;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OpenAccountController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = OpenAccount::where('soft_delete', '!=', 1)->orderBy('created_at', 'desc')->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.openaccount.index', compact('today', 'data', 'branch'));
    }

    public function store(Request $request)
    {
        $data = new OpenAccount();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->branch_id = $request->get('branch_id');

        $data->save();

        return redirect()->route('openaccount.index')->with('add', 'New opening account information has been added to your list.');
    }

    public function edit($id)
    {
        $data = OpenAccount::findOrFail($id);
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.openaccount.edit', compact('data', 'branch'));
    }

    public function update(Request $request, $id)
    {
        $data = OpenAccount::findOrFail($id);

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->branch_id = $request->get('branch_id');

        $data->update();

        return redirect()->route('openaccount.index')->with('update', 'Updated opening account information has been added to your list.');
    }

    public function delete($id)
    {
        $data = OpenAccount::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('openaccount.index')->with('soft_destroy', 'Successful removal of the opening account record for the list.');
    }

    public function destroy($id)
    {
        $data = OpenAccount::findOrFail($id);

        $data->delete();

        return redirect()->route('openaccount.index')->with('destroy', 'Successfully erased the open account record !');
    }
}

