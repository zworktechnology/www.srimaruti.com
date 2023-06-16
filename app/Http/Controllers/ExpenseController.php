<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Expense;
use App\Models\Namelist;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function index($user_branch_id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Expense::where('date', '=', $today)->where('branch_id', '=', $user_branch_id)->where('soft_delete', '!=', 1)->get();
        $namelist = Namelist::where('soft_delete', '!=', 1)->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.expense.index', compact('staff', 'data', 'namelist', 'branch', 'today', 'user_branch_id'));
    }

    public function store(Request $request)
    {
        $data = new Expense();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->note = $request->get('note');
        $data->namelist_id = $request->get('namelist_id');
        $data->branch_id = $request->get('branch_id');
        $data->staff_id = $request->get('staff_id');

        $data->save();

        return redirect()->route('expense.index', ['user_branch_id' => $data->branch_id])->with('add', 'New expence information has been added to your list.');
    }

    public function edit($id)
    {
        $data = Expense::findOrFail($id);
        $namelist = Namelist::where('soft_delete', '!=', 1)->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.expense.edit', compact('staff', 'data', 'namelist', 'branch'));
    }

    public function update(Request $request, $id)
    {
        $data = Expense::findOrFail($id);

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->note = $request->get('note');
        $data->namelist_id = $request->get('namelist_id');
        $data->branch_id = $request->get('branch_id');
        $data->staff_id = $request->get('staff_id');

        $data->update();

        return redirect()->route('expense.index', ['user_branch_id' => $data->branch_id])->with('update', 'Updated expence information has been added to your list.');
    }

    public function delete($id)
    {
        $data = Expense::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('expense.index', ['user_branch_id' => $data->branch_id])->with('soft_destroy', 'Successful removal of the expence record for the list.');
    }

    public function destroy($id)
    {
        $data = Expense::findOrFail($id);

        $data->delete();

        return redirect()->route('expense.index', ['user_branch_id' => $data->branch_id])->with('destroy', 'Successfully erased the expense record !');
    }


    public function datefilter(Request $request, $user_branch_id)
    {
        $date = $request->get('date');

        $expense_data = Expense::where('soft_delete', '!=', 1)->where('date', '=', $date)->get();

        $expense_arr = [];
        foreach ($expense_data as $key => $expense_datas) {

            $branch = Branch::findOrFail($expense_datas->branch_id);
            $namelist = Namelist::findOrFail($expense_datas->namelist_id);
            $staff = Staff::findOrFail($expense_datas->staff_id);

            $expense_arr[] = array(
                'date' => date('d M, Y', strtotime($expense_datas->date)),
                'branch' => $branch->name,
                'namelist' => $namelist->name,
                'staff' => $staff->name,
                'amount' => $expense_datas->amount,
                'note' => $expense_datas->note,
                'id' => $expense_datas->id,
            );
        }
        $today = Carbon::now()->format('Y-m-d');

        return view('pages.backend.expense.datefilter', compact('expense_arr', 'date', 'user_branch_id'));
    }



}
