<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CloseAccount;
use App\Models\OpenAccount;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CloseAccountController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = CloseAccount::where('soft_delete', '!=', 1)->orderBy('created_at', 'desc')->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.closeaccount.index', compact('staff', 'today', 'data', 'branch'));
    }

    public function store(Request $request)
    {
        // $total_amount = ($request->get('count_2000') * 2000) + ($request->get('count_500') * 500) + ($request->get('count_200') * 200) + ($request->get('count_100') * 100) + ($request->get('count_50') * 50) + ($request->get('count_20') * 20) + ($request->get('count_10') * 10) + ($request->get('count_5') * 5) + ($request->get('count_2') * 2) + ($request->get('count_1') * 1);

        $data = new CloseAccount();

        $data->date = $request->get('date');
        $data->closer_name = $request->get('closer_name');
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
        $data->total = $request->get('total');

        $data->save();

        $newdate = date("Y-m-d",strtotime ( '+1 day' , strtotime ( $request->get('date') ) )) ;

        $openaccount_data = new OpenAccount();
        $openaccount_data->date = $newdate;
        $openaccount_data->branch_id = $request->get('branch_id');
        $openaccount_data->amount = $request->get('total');
        $openaccount_data->save();

        return redirect()->route('closeaccount.index')->with('add', 'New close account information has been added to your list.');
    }

    public function edit($id)
    {
        $data = CloseAccount::findOrFail($id);
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.closeaccount.edit', compact('staff', 'data', 'branch'));
    }

    public function update(Request $request, $id)
    {
        $data = CloseAccount::findOrFail($id);

        $data->date = $request->get('date');
        $data->closer_name = $request->get('closer_name');
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
        $data->total = $request->get('total');

        $data->update();

        return redirect()->route('closeaccount.index')->with('update', 'Updated close account information has been added to your list.');
    }

    public function delete($id)
    {
        $data = CloseAccount::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('closeaccount.index')->with('soft_destroy', 'Successful removal of the close account record for the list.');
    }

    public function destroy($id)
    {
        $data = CloseAccount::findOrFail($id);

        $data->delete();

        return redirect()->route('closeaccount.index')->with('destroy', 'Successfully erased the close account record !');
    }
}
