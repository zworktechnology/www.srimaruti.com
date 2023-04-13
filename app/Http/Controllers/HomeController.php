<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CloseAccount;
use App\Models\Expense;
use App\Models\Income;
use App\Models\OpenAccount;
use App\Models\Booking;
use App\Models\BookingPayment;
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

            $Room_income = 0;
            $total_onlinepayment = 0;
            $booking_id = Booking::where('soft_delete', '!=', 1)->where('branch_id', '=', $branchs->id)->get();
            foreach ($booking_id as $key => $booking_ids) {
                $BookingPayment = BookingPayment::where('booking_id', '=', $booking_ids->id)->where('paid_date', '=', $today)->get();

                foreach ($BookingPayment as $key => $BookingPayments) {
                    $Room_income += $BookingPayments->payable_amount;
                }

                $BookingPayment_byonline = BookingPayment::where('booking_id', '=', $booking_ids->id)
                                                ->where('paid_date', '=', $today)
                                                ->where('payment_method', '=', 'Online Payment')
                                                ->get();

                foreach ($BookingPayment_byonline as $key => $BookingPayment_by_online) {
                    $total_onlinepayment += $BookingPayment_by_online->payable_amount;
                }


            }

            $branchwise_openaccount = OpenAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_income = Income::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_closeaccount = CloseAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('total');

            $total_expense = $branchwise_expense + $total_onlinepayment;
            $balance = $Room_income + $branchwise_income - $total_expense;
            $requred_balance = ($branchwise_income + $Room_income) - $total_expense;
            $difference = $branchwise_closeaccount - $requred_balance;

            $branchwise_list[] = array(
                'branch_name' => $branchs->name,
                'branchwise_openaccount' => $branchwise_openaccount,
                'branchwise_income' => $branchwise_income,
                'branchwise_expense' => $total_expense,
                'branchwise_closeaccount' => $branchwise_closeaccount,
                'Room_income' => $Room_income,
                'requred_balance' => $requred_balance,
                'difference' => $difference,
                'balance' => $balance,
            );
        }


        return view('home', compact('today', 'branchwise_list', 'income', 'expense'));
    }





    public function getBranchwiseList($date)
    {
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $branchwise_list = [];
        foreach ($branch as $key => $branchs) {


            $Room_income = 0;
            $total_onlinepayment = 0;
            $booking_id = Booking::where('soft_delete', '!=', 1)->where('branch_id', '=', $branchs->id)->get();
            foreach ($booking_id as $key => $booking_ids) {
                $BookingPayment = BookingPayment::where('booking_id', '=', $booking_ids->id)->where('paid_date', '=', $today)->get();

                foreach ($BookingPayment as $key => $BookingPayments) {
                    $Room_income += $BookingPayments->payable_amount;
                }

                $BookingPayment_byonline = BookingPayment::where('booking_id', '=', $booking_ids->id)
                                                ->where('paid_date', '=', $today)
                                                ->where('payment_method', '=', 'Online Payment')
                                                ->get();

                foreach ($BookingPayment_byonline as $key => $BookingPayment_by_online) {
                    $total_onlinepayment += $BookingPayment_by_online->payable_amount;
                }


            }

            $branchwise_openaccount = OpenAccount::where('soft_delete', '!=', 1)->where('date', '=', $date)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_income = Income::where('soft_delete', '!=', 1)->where('date', '=', $date)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $date)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_closeaccount = CloseAccount::where('soft_delete', '!=', 1)->where('date', '=', $date)->where('branch_id', '=', $branchs->id)->sum('total');

            $total_expense = $branchwise_expense + $total_onlinepayment;
            $income = Income::where('soft_delete', '!=', 1)->where('date', '=', $date)->sum('amount');
            $expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $date)->sum('amount');
            $balance = $Room_income + $branchwise_income - $total_expense;

            $branchwise_list[] = array(
                'branch_name' => $branchs->name,
                'branchwise_openaccount' => $branchwise_openaccount,
                'branchwise_income' => $branchwise_income,
                'branchwise_expense' => $total_expense,
                'branchwise_closeaccount' => $branchwise_closeaccount,
                'income' => $income,
                'expense' => $expense,
                'Room_income' => $Room_income,
                'balance' => $balance,
            );
        }




        echo json_encode($branchwise_list);
    }
}
