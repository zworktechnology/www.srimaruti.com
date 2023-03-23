<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::where('reach_out_status', '!=', 1)->orderBy('id', 'desc')->get();

        return view('pages.backend.contact.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Contact();

        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->phone_number = $request->get('phone_number');
        $data->message = $request->get('message');

        $data->save();

        return redirect()->back();
    }

    public function reachout($id)
    {
        $data = Contact::findOrFail($id);

        $data->reach_out_status = 1;

        $data->update();

        return redirect()->route('contact.index')->with('active', 'Reach out successfully completed !');
    }
}
