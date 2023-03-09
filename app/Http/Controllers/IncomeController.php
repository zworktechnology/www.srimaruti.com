<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Namelist;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $data = Income::where('soft_delete', '!=', 1)->get();
        $namelist = Namelist::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.income.index', compact('data', 'namelist'));
    }

    public function store(Request $request)
    {
        $data = new Income();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->note = $request->get('note');
        $data->namelist_id = $request->get('namelist_id');

        $data->save();

        return redirect()->route('income.index')->with('add', 'New income record detail successfully added !');
    }

    public function edit($id)
    {
        $data = Income::findOrFail($id);
        $namelist = Namelist::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.income.edit', compact('data', 'namelist'));
    }

    public function update(Request $request, $id)
    {
        $data = Income::findOrFail($id);

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->note = $request->get('note');
        $data->namelist_id = $request->get('namelist_id');

        $data->update();

        return redirect()->route('income.index')->with('update', 'Income record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Income::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('income.index')->with('soft_destroy', 'Successfully deleted the income record !');
    }

    public function destroy($id)
    {
        $data = Income::findOrFail($id);

        $data->delete();

        return redirect()->route('income.index')->with('destroy', 'Successfully erased the income record !');
    }
}

