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
use App;

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
        $closeaccount = CloseAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('total');
        $openaccount = OpenAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('amount');
        $total_room_icome = BookingPayment::where('soft_delete', '!=', 1)->where('paid_date', '=', $today)->sum('payable_amount');

        $branchwise_list = [];
        $tot_gstamount = 0;
        $balanceamount_from_tot_roomincome = 0;
        $allbranches_total_expense = 0;
        $total_online_payment = 0;
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        foreach ($branch as $key => $branchs) {

            $Room_income = 0;
            $gstamount = 0;
            $total_onlinepayment = 0;
            $balanceamount_from_roomincome = 0;
            $tot_gstamount = 0;

            $booking_id = Booking::where('soft_delete', '!=', 1)->where('branch_id', '=', $branchs->id)->get();
            foreach ($booking_id as $key => $booking_ids) {

                $BookingPayment = BookingPayment::where('booking_id', '=', $booking_ids->id)->where('paid_date', '=', $today)->get();

                foreach ($BookingPayment as $key => $BookingPayments) {
                    $Room_income += $BookingPayments->payable_amount;
                    $booking_gst = Booking::findOrFail($BookingPayments->booking_id);
                    $gstamount += $booking_gst->gst_amount;
                }
                $balanceamount_from_roomincome = $Room_income - $gstamount;

                $BookingPayment_byonline = BookingPayment::where('booking_id', '=', $booking_ids->id)
                                                ->where('paid_date', '=', $today)
                                                ->where('payment_method', '=', 'Online Payment')
                                                ->get();

                foreach ($BookingPayment_byonline as $key => $BookingPayment_by_online) {
                    $total_onlinepayment += $BookingPayment_by_online->payable_amount;
                }
            }

            $tot_gstamount = 0;
            $total_online_payment = 0;
            $bookingData = Booking::where('soft_delete', '!=', 1)->get();
            foreach ($bookingData as $key => $bookingDatas) {

                $BookingPaymentarr = BookingPayment::where('booking_id', '=', $bookingDatas->id)->where('paid_date', '=', $today)->get();
                foreach ($BookingPaymentarr as $key => $BookingPayment_array) {

                    $total_booking_gst = Booking::findOrFail($BookingPayment_array->booking_id);
                    $tot_gstamount += $total_booking_gst->gst_amount;
                }

                $Booking_Payment_byonline = BookingPayment::where('booking_id', '=', $bookingDatas->id)
                                                ->where('paid_date', '=', $today)
                                                ->where('payment_method', '=', 'Online Payment')
                                                ->get();

                foreach ($Booking_Payment_byonline as $key => $Booking_Payments_by_online) {
                    $total_online_payment += $Booking_Payments_by_online->payable_amount;
                }
            }

            $balanceamount_from_tot_roomincome = $total_room_icome - $tot_gstamount;
            $total_branches_expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('amount');
            $allbranches_total_expense = $total_branches_expense + $total_online_payment;

            $branchwise_openaccount = OpenAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_income = Income::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_expense = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('amount');
            $branchwise_closeaccount = CloseAccount::where('soft_delete', '!=', 1)->where('date', '=', $today)->where('branch_id', '=', $branchs->id)->sum('total');

            $total_expense = $branchwise_expense + $total_onlinepayment;
            $balance = $Room_income + $branchwise_income - $total_expense;
            $requred_balance = ($branchwise_income + $Room_income + $branchwise_openaccount) - $total_expense;
            $difference = $branchwise_closeaccount - $requred_balance;

            $branchwise_list[] = array(
                'branch_id' => $branchs->id,
                'branch_name' => $branchs->name,
                'branchwise_openaccount' => $branchwise_openaccount,
                'branchwise_income' => $branchwise_income,
                'branchwise_expense' => $total_expense,
                'branch_wise_expenses' => $branchwise_expense,
                'total_onlinepayment' => $total_onlinepayment,
                'branchwise_closeaccount' => $branchwise_closeaccount,
                'Room_income' => $Room_income,
                'gstamount' => $gstamount,
                'balanceamount_from_roomincome' => $balanceamount_from_roomincome,
                'requred_balance' => $requred_balance,
                'difference' => $difference,
                'balance' => $balance,
            );
        }


        return view('home', compact('today', 'branchwise_list', 'income', 'expense', 'closeaccount', 'total_room_icome', 'tot_gstamount', 'balanceamount_from_tot_roomincome', 'allbranches_total_expense', 'total_online_payment', 'openaccount'));
    }

    public function dashboard_datefilter(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $from_date = $request->get('fromdate');
        $to_date = $request->get('todate');

        $income = Income::whereBetween('date', [$from_date, $to_date])
            ->where('soft_delete', '!=', 1)->sum('amount');

        $expense = Expense::whereBetween('date', [$from_date, $to_date])
            ->where('soft_delete', '!=', 1)->sum('amount');

        $openaccount = openaccount::whereBetween('date', [$from_date, $to_date])
            ->where('soft_delete', '!=', 1)->sum('amount');

        $closeaccount = CloseAccount::whereBetween('date', [$from_date, $to_date])
            ->where('soft_delete', '!=', 1)->sum('total');

        $total_room_icome = BookingPayment::whereBetween('paid_date', [$from_date, $to_date])
            ->where('soft_delete', '!=', 1)->sum('payable_amount');

        $branchwise_list = [];
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        foreach ($branch as $key => $branchs) {

            $Room_income = 0;
            $gstamount = 0;
            $total_onlinepayment = 0;
            $balanceamount_from_roomincome = 0;

            $booking_id = Booking::where('soft_delete', '!=', 1)->where('branch_id', '=', $branchs->id)->get();
            foreach ($booking_id as $key => $booking_ids) {

                $BookingPayment = BookingPayment::whereBetween('paid_date', [$from_date, $to_date])
                    ->where('booking_id', '=', $booking_ids->id)->get();

                    foreach ($BookingPayment as $key => $BookingPayments) {
                        $Room_income += $BookingPayments->payable_amount;
                        $booking_gst = Booking::findOrFail($BookingPayments->booking_id);
                        $gstamount += $booking_gst->gst_amount;
                    }
                    $balanceamount_from_roomincome = $Room_income - $gstamount;

                    $BookingPayment_byonline = BookingPayment::whereBetween('paid_date', [$from_date, $to_date])
                                                    ->where('booking_id', '=', $booking_ids->id)
                                                    ->where('payment_method', '=', 'Online Payment')
                                                    ->get();
                    foreach ($BookingPayment_byonline as $key => $BookingPayment_by_online) {
                        $total_onlinepayment += $BookingPayment_by_online->payable_amount;
                    }
            }


            $tot_gstamount = 0;
            $total_online_payment = 0;
            $bookingData = Booking::where('soft_delete', '!=', 1)->get();
            foreach ($bookingData as $key => $bookingDatas) {

                $BookingPaymentarr = BookingPayment::whereBetween('paid_date', [$from_date, $to_date])
                    ->where('booking_id', '=', $bookingDatas->id)->get();
                foreach ($BookingPaymentarr as $key => $BookingPayment_array) {

                    $total_booking_gst = Booking::findOrFail($BookingPayment_array->booking_id);
                    $tot_gstamount += $total_booking_gst->gst_amount;
                }

                $Booking_Payment_byonline = BookingPayment::whereBetween('paid_date', [$from_date, $to_date])
                                                ->where('booking_id', '=', $bookingDatas->id)
                                                ->where('payment_method', '=', 'Online Payment')
                                                ->get();

                foreach ($Booking_Payment_byonline as $key => $Booking_Payments_by_online) {
                    $total_online_payment += $Booking_Payments_by_online->payable_amount;
                }
            }



            $balanceamount_from_tot_roomincome = $total_room_icome - $tot_gstamount;
            $total_branches_expense = Expense::whereBetween('date', [$from_date, $to_date])
                                ->where('soft_delete', '!=', 1)->sum('amount');
            $allbranches_total_expense = $total_branches_expense + $total_online_payment;


            $branchwise_openaccount = OpenAccount::whereBetween('date', [$from_date, $to_date])
                    ->where('soft_delete', '!=', 1)
                    ->where('branch_id', '=', $branchs->id)
                    ->sum('amount');
            $branchwise_income = Income::whereBetween('date', [$from_date, $to_date])
                    ->where('soft_delete', '!=', 1)
                    ->where('branch_id', '=', $branchs->id)
                    ->sum('amount');
            $branchwise_expense = Expense::whereBetween('date', [$from_date, $to_date])
                    ->where('soft_delete', '!=', 1)
                    ->where('branch_id', '=', $branchs->id)
                    ->sum('amount');
            $branchwise_closeaccount = CloseAccount::whereBetween('date', [$from_date, $to_date])
                    ->where('soft_delete', '!=', 1)
                    ->where('branch_id', '=', $branchs->id)
                    ->sum('total');

            $total_expense = $branchwise_expense + $total_onlinepayment;
            $balance = $Room_income + $branchwise_income - $total_expense;
            $requred_balance = ($branchwise_income + $Room_income) - $total_expense;
            $difference = $branchwise_closeaccount - $requred_balance;



            $branchwise_list[] = array(
                'branch_id' => $branchs->id,
                'branch_name' => $branchs->name,
                'branchwise_openaccount' => $branchwise_openaccount,
                'branchwise_income' => $branchwise_income,
                'branchwise_expense' => $total_expense,
                'branch_wise_expenses' => $branchwise_expense,
                'total_onlinepayment' => $total_onlinepayment,
                'branchwise_closeaccount' => $branchwise_closeaccount,
                'Room_income' => $Room_income,
                'gstamount' => $gstamount,
                'balanceamount_from_roomincome' => $balanceamount_from_roomincome,
                'requred_balance' => $requred_balance,
                'difference' => $difference,
                'balance' => $balance,
            );


        }


        return view('dashboard_datefilter', compact('today', 'branchwise_list', 'income', 'expense', 'closeaccount', 'total_room_icome', 'tot_gstamount', 'balanceamount_from_tot_roomincome', 'allbranches_total_expense', 'total_online_payment', 'openaccount', 'from_date', 'to_date'));
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


    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('lang_code', $request->lang); 
  
        return redirect()->back();
    }
}
