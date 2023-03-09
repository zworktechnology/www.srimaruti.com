<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\OpenAccount;
use Illuminate\Http\Request;

class OpenAccountController extends Controller
{
    public function index()
    {
        $data = OpenAccount::where('soft_delete', '!=', 1)->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.openaccount.index', compact('data', 'branch'));
    }

    public function store(Request $request)
    {
        $data = new OpenAccount();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->branch_id = $request->get('branch_id');

        $data->save();

        return redirect()->route('openaccount.index')->with('add', 'New open account record detail successfully added !');
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

        return redirect()->route('openaccount.index')->with('update', 'Open account record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = OpenAccount::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('openaccount.index')->with('soft_destroy', 'Successfully deleted the open account record !');
    }

    public function destroy($id)
    {
        $data = OpenAccount::findOrFail($id);

        $data->delete();

        return redirect()->route('openaccount.index')->with('destroy', 'Successfully erased the open account record !');
    }
}

