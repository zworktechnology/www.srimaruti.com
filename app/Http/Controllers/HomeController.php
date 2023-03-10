<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CloseAccount;
use App\Models\Expense;
use App\Models\Income;
use App\Models\OpenAccount;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $income = Income::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('amount');
        $expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('amount');
        $openaccount = OpenAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('amount');

        return view('home', compact('today', 'branch', 'income', 'expense', 'openaccount'));
    }
}
