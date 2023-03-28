<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $data = Feedback::orderBy('id', 'desc')->get();

        return view('pages.backend.feedback.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Feedback();

        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->message = $request->get('message');

        $data->save();

        return redirect()->back();
    }
}
