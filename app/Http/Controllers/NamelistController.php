<?php

namespace App\Http\Controllers;

use App\Models\Namelist;
use Illuminate\Http\Request;

class NamelistController extends Controller
{
    public function index()
    {
        $data = Namelist::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.namelist.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Namelist();

        $data->name = $request->get('name');

        $data->save();

        return redirect()->route('namelist.index')->with('add', 'New namelist record detail successfully added !');
    }

    public function edit($id)
    {
        $data = Namelist::findOrFail($id);

        return view('pages.backend.namelist.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Namelist::findOrFail($id);

        $data->name = $request->get('name');

        $data->update();

        return redirect()->route('namelist.index')->with('update', 'Namelist record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Namelist::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('namelist.index')->with('soft_destroy', 'Successfully deleted the namelist record !');
    }

    public function destroy($id)
    {
        $data = Namelist::findOrFail($id);

        $data->delete();

        return redirect()->route('namelist.index')->with('destroy', 'Successfully erased the namelist record !');
    }
}
