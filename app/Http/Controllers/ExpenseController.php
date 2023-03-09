<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Expense;
use App\Models\Namelist;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Expense::where('soft_delete', '!=', 1)->get();
        $namelist = Namelist::where('soft_delete', '!=', 1)->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.expense.index', compact('data', 'namelist', 'branch', 'today'));
    }

    public function store(Request $request)
    {
        $data = new Expense();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->note = $request->get('note');
        $data->namelist_id = $request->get('namelist_id');
        $data->branch_id = $request->get('branch_id');

        $data->save();

        return redirect()->route('expense.index')->with('add', 'New expense record detail successfully added !');
    }

    public function edit($id)
    {
        $data = Expense::findOrFail($id);
        $namelist = Namelist::where('soft_delete', '!=', 1)->get();
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.expense.edit', compact('data', 'namelist', 'branch'));
    }

    public function update(Request $request, $id)
    {
        $data = Expense::findOrFail($id);

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->note = $request->get('note');
        $data->namelist_id = $request->get('namelist_id');
        $data->branch_id = $request->get('branch_id');

        $data->update();

        return redirect()->route('expense.index')->with('update', 'Expense record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Expense::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('expense.index')->with('soft_destroy', 'Successfully deleted the expense record !');
    }

    public function destroy($id)
    {
        $data = Expense::findOrFail($id);

        $data->delete();

        return redirect()->route('expense.index')->with('destroy', 'Successfully erased the expense record !');
    }
}
