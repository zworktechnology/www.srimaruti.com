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
        
        $income = Income::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('amount');
        $expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('amount');
        

        $branchwise_list = [];
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        foreach ($branch as $key => $branchs) {

            $branchwise_openaccount = OpenAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_income = Income::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_closeaccount = CloseAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('total');

            $branchwise_list[] = array(
                'branch_name' => $branchs->name,
                'branchwise_openaccount' => $branchwise_openaccount,
                'branchwise_income' => $branchwise_income,
                'branchwise_expense' => $branchwise_expense,
                'branchwise_closeaccount' => $branchwise_closeaccount,
            );
        }
        

        return view('home', compact('today', 'branchwise_list', 'income', 'expense'));
    }





    public function getBranchwiseList($date)
    {
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $branchwise_list = [];
        foreach ($branch as $key => $branchs) {

            $branchwise_openaccount = OpenAccount::where('soft_delete', '!=', 1)->where('date', '=', $date)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_income = Income::where('soft_delete', '!=', 1)->where('date', '=', $date)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $date)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_closeaccount = CloseAccount::where('soft_delete', '!=', 1)->where('date', '=', $date)->where('branch_id', '=', $branchs->id)->sum('total');


            $income = Income::where('soft_delete', '!=', 1)->where('date', '=', $date)->sum('amount');
            $expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $date)->sum('amount');

            $branchwise_list[] = array(
                'branch_name' => $branchs->name,
                'branchwise_openaccount' => $branchwise_openaccount,
                'branchwise_income' => $branchwise_income,
                'branchwise_expense' => $branchwise_expense,
                'branchwise_closeaccount' => $branchwise_closeaccount,
                'income' => $income,
                'expense' => $expense,
            );
        }


        
        
        echo json_encode($branchwise_list);
    }
}
