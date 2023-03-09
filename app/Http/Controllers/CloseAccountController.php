<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CloseAccount;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CloseAccountController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = CloseAccount::where('soft_delete', '!=', 1)->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.closeaccount.index', compact('today', 'data', 'branch'));
    }

    public function store(Request $request)
    {
        $data = new CloseAccount();

        $data->date = $request->get('date');
        $data->branch_id = $request->get('branch_id');
        $data->count_2000 = $request->get('count_2000');
        $data->count_500 = $request->get('count_500');
        $data->count_200 = $request->get('count_200');
        $data->count_100 = $request->get('count_100');
        $data->count_50 = $request->get('count_50');
        $data->count_20 = $request->get('count_20');
        $data->count_10 = $request->get('count_10');
        $data->count_5 = $request->get('count_5');
        $data->count_2 = $request->get('count_2');
        $data->count_1 = $request->get('count_1');

        $data->save();

        return redirect()->route('closeaccount.index')->with('add', 'New close account record detail successfully added !');
    }

    public function edit($id)
    {
        $data = CloseAccount::findOrFail($id);
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.closeaccount.edit', compact('data', 'branch'));
    }

    public function update(Request $request, $id)
    {
        $data = CloseAccount::findOrFail($id);

        $data->date = $request->get('date');
        $data->branch_id = $request->get('branch_id');
        $data->count_2000 = $request->get('count_2000');
        $data->count_500 = $request->get('count_500');
        $data->count_200 = $request->get('count_200');
        $data->count_100 = $request->get('count_100');
        $data->count_50 = $request->get('count_50');
        $data->count_20 = $request->get('count_20');
        $data->count_10 = $request->get('count_10');
        $data->count_5 = $request->get('count_5');
        $data->count_2 = $request->get('count_2');
        $data->count_1 = $request->get('count_1');

        $data->update();

        return redirect()->route('closeaccount.index')->with('update', 'Close account record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = CloseAccount::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('closeaccount.index')->with('soft_destroy', 'Successfully deleted the close account record !');
    }

    public function destroy($id)
    {
        $data = CloseAccount::findOrFail($id);

        $data->delete();

        return redirect()->route('closeaccount.index')->with('destroy', 'Successfully erased the close account record !');
    }
}
