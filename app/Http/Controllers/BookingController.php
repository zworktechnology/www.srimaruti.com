<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
use App\Models\BookingRoom;
use App\Models\Staff;
use App\Models\Income;
use App\Models\BookingPayment;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    public function index($user_branch_id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $data = Booking::where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->where('status', '=', 1)->orderBy('created_at', 'desc')->get();

        $checkins = Booking::where('check_in_date', '=', $today)->where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->where('status', '=', 1)->count();
        $checkouts = Booking::where('out_date', '=', $today)->where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->where('status', '=', 2)->count();
        $availablerooms = Room::where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->where('booking_status', '!=', 1)->count();
        $totalrooms = Room::where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->count();

        $staff = Staff::where('soft_delete', '!=', 1)->get();

        $bookingData = [];
        $room_list = [];
        $terms = [];

        foreach ($data as $key => $datas) {
            $branch = Branch::findOrFail($datas->branch_id);
            $roomsbooked = BookingRoom::where('booking_id', '=', $datas->id)->get();
            foreach ($roomsbooked as $key => $rooms_booked) {
                $Rooms = Room::findOrFail($rooms_booked->room_id);
                $room_list[] = array(
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor'. ' - ' . $rooms_booked->room_type ,
                    'booking_id' => $datas->id,
                    'booking_room_price' => $rooms_booked->room_price,
                    'room_cal_price' => $rooms_booked->room_cal_price,
                    'id' => $rooms_booked->id,
                    'room_id' => $rooms_booked->room_id,
                );
            }
            $payment_data = BookingPayment::where('booking_id', '=', $datas->id)->get();
            foreach ($payment_data as $key => $payment_datas) {

                $terms[] = array(
                    'booking_id' => $datas->id,
                    'term' => $payment_datas->term,
                    'payable_amount' => $payment_datas->payable_amount,
                    'id' => $payment_datas->id,
                    'payment_method' => $payment_datas->payment_method,
                );
            }
            $bookingData[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => $branch->name,
                'chick_in_date' => $datas->check_in_date,
                'chick_in_time' => $datas->check_in_time,
                'whats_app_number' => $datas->whats_app_number,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->check_out_date,
                'out_date' => $datas->out_date,
                'chick_out_time' => $datas->check_out_time,
                'phone_number' => $datas->phone_number,
                'grand_total' => $datas->grand_total,
                'branch_id' => $datas->branch_id,
                'total_paid' => $datas->total_paid,
                'balance_amount' => $datas->balance_amount,
                'days' => $datas->days,
                'gst_per' => $datas->gst_per,
                'gst_amount' => $datas->gst_amount,
                'disc_per' => $datas->disc_per,
                'disc_amount' => $datas->disc_amount,
                'additional_amount' => $datas->additional_amount,
                'additional_notes' => $datas->additional_notes,
                'total' => $datas->total,
                'terms' => $terms,
                'status' => $datas->status,
                'extended_date' => $datas->extended_date,
                'extended_time' => $datas->extended_time,
                'out_date' => $datas->out_date,
                'out_time' => $datas->out_time,
                'booking_invoiceno' => $datas->booking_invoiceno,
            );
        }

        return view('pages.backend.booking.index', compact('totalrooms', 'checkins', 'checkouts', 'availablerooms', 'staff', 'bookingData', 'today', 'timenow', 'user_branch_id'));
    }

    public function today($user_branch_id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        $data = Booking::where('soft_delete', '!=', 1)->where('out_date', '=', $today)->where('status', '=', 2)->where('branch_id', '=', $user_branch_id)->orderBy('created_at', 'desc')->get();

        $checkins = Booking::where('check_in_date', '=', $today)->where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->where('status', '=', 1)->count();
        $checkouts = Booking::where('out_date', '=', $today)->where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->where('status', '=', 2)->count();
        $availablerooms = Room::where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->where('booking_status', '!=', 1)->count();
        $totalrooms = Room::where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->count();

        $bookingData = [];
        $room_list = [];
        $terms = [];

        foreach ($data as $key => $datas) {
            $branch = Branch::findOrFail($datas->branch_id);
            $roomsbooked = BookingRoom::where('booking_id', '=', $datas->id)->get();
            foreach ($roomsbooked as $key => $rooms_booked) {
                $Rooms = Room::findOrFail($rooms_booked->room_id);
                $room_list[] = array(
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor'. ' - ' . $rooms_booked->room_type ,
                    'booking_id' => $datas->id,
                    'booking_room_price' => $rooms_booked->room_price,
                    'room_cal_price' => $rooms_booked->room_cal_price,
                    'id' => $rooms_booked->id,
                    'room_id' => $rooms_booked->room_id,
                );
            }
            $payment_data = BookingPayment::where('booking_id', '=', $datas->id)->get();
            foreach ($payment_data as $key => $payment_datas) {
                $terms[] = array(
                    'booking_id' => $datas->id,
                    'term' => $payment_datas->term,
                    'payable_amount' => $payment_datas->payable_amount,
                    'id' => $payment_datas->id,
                    'payment_method' => $payment_datas->payment_method,
                );
            }
            $bookingData[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => $branch->name,
                'chick_in_date' => $datas->check_in_date,
                'chick_in_time' => $datas->check_in_time,
                'whats_app_number' => $datas->whats_app_number,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->check_out_date,
                'out_date' => $datas->out_date,
                'chick_out_time' => $datas->check_out_time,
                'phone_number' => $datas->phone_number,
                'grand_total' => $datas->grand_total,
                'branch_id' => $datas->branch_id,
                'total_paid' => $datas->total_paid,
                'balance_amount' => $datas->balance_amount,
                'days' => $datas->days,
                'gst_per' => $datas->gst_per,
                'gst_amount' => $datas->gst_amount,
                'disc_per' => $datas->disc_per,
                'disc_amount' => $datas->disc_amount,
                'additional_amount' => $datas->additional_amount,
                'additional_notes' => $datas->additional_notes,
                'total' => $datas->total,
                'terms' => $terms,
                'status' => $datas->status,
                'out_date' => $datas->out_date,
                'out_time' => $datas->out_time,
                'extended_date' => $datas->extended_date,
                'extended_time' => $datas->extended_time,
                'booking_invoiceno' => $datas->booking_invoiceno,
            );
        }

        return view('pages.backend.booking.index', compact('totalrooms', 'checkins', 'checkouts', 'availablerooms', 'staff', 'bookingData', 'today', 'timenow', 'user_branch_id'));
    }

    public function upcoming($user_branch_id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        $data = Booking::where('soft_delete', '!=', 1)->where('check_out_date', '>', $today)->where('status', '=', 1)->where('branch_id', '=', $user_branch_id)->orderBy('created_at', 'desc')->get();

        $bookingData = [];
        $room_list = [];
        $terms = [];

        foreach ($data as $key => $datas) {
            $branch = Branch::findOrFail($datas->branch_id);
            $roomsbooked = BookingRoom::where('booking_id', '=', $datas->id)->get();
            foreach ($roomsbooked as $key => $rooms_booked) {
                $Rooms = Room::findOrFail($rooms_booked->room_id);
                $room_list[] = array(
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor'. ' - ' . $rooms_booked->room_type ,
                    'booking_id' => $datas->id,
                    'booking_room_price' => $rooms_booked->room_price,
                    'room_cal_price' => $rooms_booked->room_cal_price,
                    'id' => $rooms_booked->id,
                    'room_id' => $rooms_booked->room_id,
                );
            }
            $payment_data = BookingPayment::where('booking_id', '=', $datas->id)->get();
            foreach ($payment_data as $key => $payment_datas) {
                $terms[] = array(
                    'booking_id' => $datas->id,
                    'term' => $payment_datas->term,
                    'payable_amount' => $payment_datas->payable_amount,
                    'id' => $payment_datas->id,
                    'payment_method' => $payment_datas->payment_method,
                );
            }
            $bookingData[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => $branch->name,
                'chick_in_date' => $datas->check_in_date,
                'chick_in_time' => $datas->check_in_time,
                'whats_app_number' => $datas->whats_app_number,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->check_out_date,
                'out_date' => $datas->out_date,
                'chick_out_time' => $datas->check_out_time,
                'phone_number' => $datas->phone_number,
                'grand_total' => $datas->grand_total,
                'branch_id' => $datas->branch_id,
                'total_paid' => $datas->total_paid,
                'balance_amount' => $datas->balance_amount,
                'days' => $datas->days,
                'gst_per' => $datas->gst_per,
                'gst_amount' => $datas->gst_amount,
                'disc_per' => $datas->disc_per,
                'disc_amount' => $datas->disc_amount,
                'additional_amount' => $datas->additional_amount,
                'additional_notes' => $datas->additional_notes,
                'total' => $datas->total,
                'terms' => $terms,
                'status' => $datas->status,
                'out_date' => $datas->out_date,
                'out_time' => $datas->out_time,
                'extended_date' => $datas->extended_date,
                'extended_time' => $datas->extended_time,
                'booking_invoiceno' => $datas->booking_invoiceno,
            );
        }

        return view('pages.backend.booking.index', compact('staff', 'bookingData', 'today', 'timenow', 'user_branch_id'));
    }

    public function missingout($user_branch_id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        $data = Booking::where('soft_delete', '!=', 1)->where('check_out_date', '<', $today)->where('status', '=', 1)->where('branch_id', '=', $user_branch_id)->orderBy('created_at', 'desc')->get();

        $bookingData = [];
        $room_list = [];
        $terms = [];

        foreach ($data as $key => $datas) {
            $branch = Branch::findOrFail($datas->branch_id);
            $roomsbooked = BookingRoom::where('booking_id', '=', $datas->id)->get();
            foreach ($roomsbooked as $key => $rooms_booked) {
                $Rooms = Room::findOrFail($rooms_booked->room_id);
                $room_list[] = array(
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor'. ' - ' . $rooms_booked->room_type ,
                    'booking_id' => $datas->id,
                    'booking_room_price' => $rooms_booked->room_price,
                    'room_cal_price' => $rooms_booked->room_cal_price,
                    'id' => $rooms_booked->id,
                    'room_id' => $rooms_booked->room_id,
                );
            }
            $payment_data = BookingPayment::where('booking_id', '=', $datas->id)->get();
            foreach ($payment_data as $key => $payment_datas) {
                $terms[] = array(
                    'booking_id' => $datas->id,
                    'term' => $payment_datas->term,
                    'payable_amount' => $payment_datas->payable_amount,
                    'id' => $payment_datas->id,
                    'payment_method' => $payment_datas->payment_method,
                );
            }
            $bookingData[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => $branch->name,
                'chick_in_date' => $datas->check_in_date,
                'chick_in_time' => $datas->check_in_time,
                'whats_app_number' => $datas->whats_app_number,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->check_out_date,
                'out_date' => $datas->out_date,
                'chick_out_time' => $datas->check_out_time,
                'phone_number' => $datas->phone_number,
                'grand_total' => $datas->grand_total,
                'branch_id' => $datas->branch_id,
                'total_paid' => $datas->total_paid,
                'balance_amount' => $datas->balance_amount,
                'days' => $datas->days,
                'gst_per' => $datas->gst_per,
                'gst_amount' => $datas->gst_amount,
                'disc_per' => $datas->disc_per,
                'disc_amount' => $datas->disc_amount,
                'additional_amount' => $datas->additional_amount,
                'additional_notes' => $datas->additional_notes,
                'total' => $datas->total,
                'terms' => $terms,
                'status' => $datas->status,
                'out_date' => $datas->out_date,
                'out_time' => $datas->out_time,
                'extended_date' => $datas->extended_date,
                'extended_time' => $datas->extended_time,
                'booking_invoiceno' => $datas->booking_invoiceno,
            );
        }

        return view('pages.backend.booking.index', compact('staff', 'bookingData', 'today', 'timenow', 'user_branch_id'));
    }

    public function dailycheckout()
    {

        $data = Booking::where('soft_delete', '!=', 1)->get();

        foreach ($data as $key => $datas) {
            $today = Carbon::now()->format('Y-m-d');
            $Extend_data = [];
            $checkout_data = [];
            $extendcheckout_date = Booking::where('soft_delete', '!=', 1)->where('extended_date', '=', $today)->get();
            foreach ($extendcheckout_date as $key => $extend_checkout_date) {
                $Extend_data[] = $extend_checkout_date;
            }
            $checkout_date = Booking::where('soft_delete', '!=', 1)->where('check_out_date', '=', $today)->get();
            foreach ($checkout_date as $key => $checkout_date_arr) {
                $checkout_data[] = $checkout_date_arr;
            }
            $Array = array_merge($Extend_data , $checkout_data);
            $checkout_data_arr = Booking::where('soft_delete', '!=', 1)->where('check_out_date', '=', $today)->get();
            $bookingData = [];
            $room_list = [];
            $terms = [];
            foreach ($checkout_data_arr as $key => $Array_data) {
                $branch = Branch::findOrFail($Array_data->branch_id);
                $roomsbooked = BookingRoom::where('booking_id', '=', $Array_data->id)->get();
                    foreach ($roomsbooked as $key => $rooms_booked) {
                        $Rooms = Room::findOrFail($rooms_booked->room_id);
                        $room_list[] = array(
                            'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                            'booking_id' => $Array_data->id,
                            'booking_room_price' => $rooms_booked->room_price,
                            'room_cal_price' => $rooms_booked->room_cal_price,
                            'id' => $rooms_booked->id,
                            'room_id' => $rooms_booked->room_id,
                        );
                    }
                    $payment_data = BookingPayment::where('booking_id', '=', $Array_data->id)->get();
                    foreach ($payment_data as $key => $payment_datas) {
                        $terms[] = array(
                            'booking_id' => $Array_data->id,
                            'term' => $payment_datas->term,
                            'payable_amount' => $payment_datas->payable_amount,
                        );
                    }
                    $bookingData[] = array(
                        'customer_name' => $Array_data->customer_name,
                        'branch' => $branch->name,
                        'chick_in_date' => $Array_data->check_in_date,
                        'whats_app_number' => $Array_data->whats_app_number,
                        'id' => $Array_data->id,
                        'room_list' => $room_list,
                        'phone_number' => $Array_data->phone_number,
                        'grand_total' => $Array_data->grand_total,
                        'total_paid' => $Array_data->total_paid,
                        'balance_amount' => $Array_data->balance_amount,
                        'days' => $Array_data->days,
                        'gst_per' => $Array_data->gst_per,
                        'gst_amount' => $Array_data->gst_amount,
                        'disc_per' => $Array_data->disc_per,
                        'disc_amount' => $Array_data->disc_amount,
                        'additional_amount' => $Array_data->additional_amount,
                        'additional_notes' => $Array_data->additional_notes,
                        'total' => $Array_data->total,
                        'terms' => $terms,
                        'status' => $Array_data->status,
                        'chick_out_date' => $Array_data->check_out_date,
                        'out_date' => $Array_data->out_date,
                        'chick_out_time' => $Array_data->check_out_time,
                        'extended_date' => $Array_data->extended_date,
                        'extended_time' => $Array_data->extended_time,
                    );
                }
                $timenow = Carbon::now()->format('H:i');
            return view('pages.backend.booking.dailycheckout', compact('bookingData', 'today', 'timenow'));
        }
    }

    public function create($user_branch_id)
    {
        $branch = Branch::where('soft_delete', '!=', 1)->where('id', '=', $user_branch_id)->get();
        $roomsarr = Room::where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.create', compact('staff', 'branch', 'roomsarr', 'today', 'timenow', 'user_branch_id'));
    }

    public function store(Request $request)
    {
        $data = new Booking();
        $random_no =  rand(100,999);
        $checkin = $request->get('checkin');
        $billno = 1;

        $whatsapp = $request->get('whats_app_number');
        $customer_name = $request->get('booking_customer_name');

        if($checkin == 'checkin')
        {
            $branchid = $request->get('branch_id');
            if($request->get('branch_id') == 1)
            {
                $branch_ids = 1;
                $last_branchid = Booking::where('branch_id', '=', $branch_ids)->latest('id')->first();

                    if($last_branchid != '')
                    {
                        $added_billno = substr ($last_branchid->booking_invoiceno, -5);
                        //dd($added_billno);
                        $invoiceno = '#SMISRI0000' . ($added_billno) + 1;
                    } else {
                        $invoiceno = '#SMISRI0000'.$billno;
                    }

            } else if($request->get('branch_id') == 2) {

                $branch_ids = 2;
                $last_branchid = Booking::where('branch_id', '=', $branch_ids)->latest('id')->first();

                if($last_branchid != '')
                {
                    $added_billno = substr ($last_branchid->booking_invoiceno, -5);
                    $invoiceno = '#SMISAM0000' . ($added_billno) + 1;
                } else {
                    $invoiceno = '#SMISAM0000'.$billno;
                }
            } else {
                $branch_ids = 3;
                $last_branchid = Booking::where('branch_id', '=', $branch_ids)->latest('id')->first();

                if($last_branchid != '')
                {
                    $added_billno = substr ($last_branchid->booking_invoiceno, -5);
                    $invoiceno = '#SMIGUN0000' . ($added_billno) + 1;
                } else {
                    $invoiceno = '#SMIGUN0000'.$billno;
                }
            }

            $data->booking_invoiceno = $invoiceno;
            $data->customer_name = $request->get('booking_customer_name');
            $data->phone_number = $request->get('phone_number');
            $data->whats_app_number = $request->get('whats_app_number');
            $data->email_id = $request->get('email_id');
            $data->address = $request->get('address');
            $data->gst_number = $request->get('gst_number');
            $data->male_count = $request->get('male_count');
            $data->female_count = $request->get('female_count');
            $data->child_count = $request->get('child_count');
            $data->check_in_date = $request->get('check_in_date');
            $data->check_in_time = $request->get('check_in_time');
            $data->check_out_date = $request->get('check_out_date');
            $data->check_out_time = $request->get('check_out_time');
            $data->extended_date = $request->get('check_out_date');
            $data->extended_time = $request->get('check_out_time');
            $data->days = $request->get('days');
            $data->branch_id = $request->get('branch_id');
            $data->proofs = $request->get('proofs');
            $data->prooftype_one = $request->get('prooftype_one');
            $data->proofimage_two = $request->get('prooftype_one');

            // $proof = $request->get('proofs');
            // if($proof == 1)
            // {
            //     $data->prooftype_one = $request->get('prooftype_one');
            //     if ($request->proofimage_one != "")
            //     {
            //         $proofimage_one = $request->proofimage_one;
            //         $filename_one = $data->customer_name . '_' . $random_no . '_' . 'proof' . '_' . $data->prooftype_one . '_'  . '.' . $proofimage_one->getClientOriginalExtension();
            //         $request->proofimage_one->move('assets/customer_details/proof', $filename_one);
            //         $data->proofimage_one = $filename_one;
            //     }
            // } else if($proof == 2) {
            //     $data->prooftype_one = $request->get('prooftype_one');
            //     if ($request->proofimage_one != "") {
            //         $proofimage_one = $request->proofimage_one;
            //         $filename_one = $data->customer_name . '_' . $random_no . '_' . 'proof' . '_' . $data->prooftype_one . '_'  . '.' . $proofimage_one->getClientOriginalExtension();
            //         $request->proofimage_one->move('assets/customer_details/proof', $filename_one);
            //         $data->proofimage_one = $filename_one;
            //     }
            //     $data->prooftype_two = $request->get('prooftype_two');
            //     if ($request->proofimage_two != "") {
            //         $proofimage_two = $request->proofimage_two;
            //         $filename_two = $data->customer_name . '_' . $random_no . '_' . 'proof' . '_' . $data->prooftype_two . '_'  . '.' . $proofimage_two->getClientOriginalExtension();
            //         $request->proofimage_two->move('assets/customer_details/proof', $filename_two);
            //         $data->proofimage_two = $filename_two;
            //     }

            // }

            // Profile Image
            // $customer_photo = $request->customer_photo;
            // $folderPath = "assets/customer_details/profile";
            // $image_parts = explode(";base64,", $customer_photo);
            // $image_type_aux = explode("image/", $image_parts[0]);
            // $image_type = $image_type_aux[1];
            // $image_base64 = base64_decode($image_parts[1]);
            // $fileName = $data->customer_name . '_' . $random_no . '_' . 'image' . '.png';
            // $customerimgfile = $folderPath . $fileName;
            // file_put_contents($customerimgfile, $image_base64);
            // $data->customer_photo = $customerimgfile;

            $proofimage_one = $request->proofimage_one;
            $filename_one = $data->customer_name . '_' . $random_no . '_' . 'Front Proof' . '_' . $data->prooftype_one . '.' . $proofimage_one->getClientOriginalExtension();
            $request->proofimage_one->move('assets/customer_details/proof/front', $filename_one);
            $data->proofimage_one = $filename_one;

            $proofimage_two = $request->proofimage_two;
            $filename_two = $data->customer_name . '_' . $random_no . '_' . 'Back Proof' . '_' . $data->prooftype_one . '.' . $proofimage_two->getClientOriginalExtension();
            $request->proofimage_two->move('assets/customer_details/proof/back', $filename_two);
            $data->proofimage_two = $filename_two;

            $customer_photo = $request->customer_photo;
            $filename_customer_photo = $data->customer_name . '_' . $random_no . '_' . 'Photo' . '.' . $customer_photo->getClientOriginalExtension();
            $request->customer_photo->move('assets/customer_details/proof/photo', $filename_customer_photo);
            $data->customer_photo = $filename_customer_photo;

            $data->total = $request->get('total_calc_price');
            $data->gst_per = $request->get('gst_percentage');
            $data->gst_amount = $request->get('gst_amount');
            $data->disc_per = $request->get('discount_percentage');
            $data->disc_amount = $request->get('discount_amount');
            $data->additional_amount = $request->get('additional_charge');
            $data->additional_notes = $request->get('additional_charge_notes');
            $data->grand_total = $request->get('grand_total');
            $data->grand_total = $request->get('grand_total');
            $data->total_paid = $request->get('payable_amount');
            $data->balance_amount = $request->get('balance_amount');
            $data->check_in_staff = $request->get('check_in_staff');
            $status = 1;
            $data->status = $status;

            $data->save();

            $insertedId = $data->id;

            // Booking Payments
            $paid_date = Carbon::now()->format('Y-m-d');
            $BookingPayment = new BookingPayment;
            $BookingPayment->booking_id = $insertedId;
            $BookingPayment->term = $request->get('payment_term');
            $BookingPayment->payable_amount = $request->get('payable_amount');
            $BookingPayment->paid_date = $paid_date;
            $BookingPayment->payment_method = $request->get('payment_method');
            $BookingPayment->save();

            // Booking Rooms
            foreach ($request->get('room_id') as $key => $room_id) {
                $GetroomDetails = Room::findOrFail($room_id);

                $BookingRoom = new BookingRoom;
                $BookingRoom->booking_id = $insertedId;
                $BookingRoom->room_id = $room_id;
                $BookingRoom->room_type = $request->room_type[$key];
                $BookingRoom->room_floor = $GetroomDetails->room_floor;
                $BookingRoom->room_price = $request->room_price[$key];
                $BookingRoom->room_cal_price = $request->room_cal_price[$key];
                $BookingRoom->save();

                DB::table('rooms')->where('id', $room_id)->update(['booking_status' => 1]);
            }

            return redirect()->route('booking.index', ['user_branch_id' => $data->branch_id])->with('add', 'New booking information has been added to your list.');

            //$message_key = 'Dear%20'.$customer_name.'%0a%0aWelcome%20to%20Sri%20Maruthi%20Inn!%20We%20are%20thrilled%20to%20have%20you%20stay%20with%20us.%20Our%20team%20is%20dedicated%20to%20ensuring%20you%20have%20a%20comfortable%20and%20memorable%20stay.%20If%20you%20need%20any%20assistance%20during%20your%20stay,%20please%20don%27t%20hesitate%20to%20contact%20our%20front%20desk.%0a%0aWe%20hope%20you%20have%20a%20wonderful%20time%20at%20our%20resort!%20If%20there%27s%20anything%20we%20can%20do%20to%20make%20your%20stay%20even%20more%20enjoyable,%20please%20let%20us%20know.%20We%27re%20here%20to%20help.%0a%0aThank%20you%20for%20choosing%20Sri%20Maruthi%20Inn%20for%20your%20stay%0a%0aFind%20your%20ebill%20here:%20https://srimaruti.com/booking/'.$data->id.'/invoice/detail';
            //$access_token_key = env('WHATSAPP_ACCESS_TOKEN');
            //$instance_id_key = env('WHATSAPP_INSTANCE_ID');

            //$response = Http::post('https://smstool.in/api/send.php?number=91'.$whatsapp.'&type=text&message='.$message_key.'&instance_id='.$instance_id_key.'&access_token='.$access_token_key.'');

            //if($response->successful()){
            //    return redirect()->route('booking.index', ['user_branch_id' => $data->branch_id])->with('add', 'New booking information has been added to your list, and notification send to customer.');
            //} else {
            //    return redirect()->route('booking.index', ['user_branch_id' => $data->branch_id])->with('add', 'New booking information has been added to your list.');
            //}

        }
    }

    public function edit($id)
    {
        $data = Booking::findOrFail($id);
        $branch = Branch::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $room = Room::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $BookingRooms = BookingRoom::where('booking_id', '=', $id)->get();
        $paymentdata = BookingPayment::where('booking_id', '=', $id)->get();
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.edit', compact('staff', 'data', 'branch', 'BookingRooms', 'room', 'paymentdata'));
    }

    public function update(Request $request, $id)
    {
        $BookingData = Booking::findOrFail($id);

        $random_no =   rand(100,999);
        $BookingData->customer_name = $request->get('booking_customer_name');
        $BookingData->phone_number = $request->get('phone_number');
        $BookingData->whats_app_number = $request->get('whats_app_number');
        $BookingData->email_id = $request->get('email_id');
        $BookingData->address = $request->get('address');
        $BookingData->gst_number = $request->get('gst_number');
        $BookingData->male_count = $request->get('male_count');
        $BookingData->female_count = $request->get('female_count');
        $BookingData->child_count = $request->get('child_count');
        $BookingData->check_in_date = $request->get('check_in_date');
        $BookingData->check_in_time = $request->get('check_in_time');
        $BookingData->check_out_date = $request->get('check_out_date');
        $BookingData->check_out_time = $request->get('check_out_time');
        // $BookingData->extended_date = $request->get('check_out_date');
        // $BookingData->extended_time = $request->get('check_out_time');
        $BookingData->days = $request->get('days');
        $BookingData->branch_id = $request->get('branch_id');

        // if($request->get('proofs') == 1){
        //     if($BookingData->proofs == 2){
        //         $BookingData->prooftype_two = 'NULL';
        //         $BookingData->proofimage_two = 'NULL';
        //     }
        // }
        // $BookingData->proofs = $request->get('proofs');
        // $proof = $request->get('proofs');
        // if($proof == 1){
        //     $BookingData->prooftype_one = $request->get('prooftype_one');
        //     if ($request->proofimage_one != "") {
        //         $proofimage_one = $request->proofimage_one;
        //         $filename_one = $BookingData->customer_name . $random_no . ' Proof ' . $BookingData->prooftype_one . '.' . $proofimage_one->getClientOriginalExtension();
        //         $request->proofimage_one->move('assets', $filename_one);
        //         $BookingData->proofimage_one = $filename_one;
        //     } else {
        //         $Insertedproof_image_one = $BookingData->proofimage_one;
        //         $BookingData->proofimage_one = $Insertedproof_image_one;
        //     }
        // }else if($proof == 2){
        //     $BookingData->prooftype_one = $request->get('prooftype_one');
        //     if ($request->proofimage_one != "") {
        //         $proofimage_one = $request->proofimage_one;
        //         $filename_one = $BookingData->customer_name . $random_no . ' Proof ' . $BookingData->prooftype_one . '.' . $proofimage_one->getClientOriginalExtension();
        //         $request->proofimage_one->move('assets', $filename_one);
        //         $BookingData->proofimage_one = $filename_one;
        //     } else {
        //         $Insertedproof_image_one = $BookingData->proofimage_one;
        //         $BookingData->proofimage_one = $Insertedproof_image_one;
        //     }
        //     $BookingData->prooftype_two = $request->get('prooftype_two');
        //     if ($request->proofimage_two != "") {
        //         $proofimage_two = $request->proofimage_two;
        //         $filename_two = $BookingData->customer_name . $random_no . ' Proof ' . $BookingData->prooftype_two . '.' . $proofimage_two->getClientOriginalExtension();
        //         $request->proofimage_two->move('assets', $filename_two);
        //         $BookingData->proofimage_two = $filename_two;
        //     } else {
        //         $Insertedproof_image_two = $BookingData->proofimage_two;
        //         $BookingData->proofimage_two = $Insertedproof_image_two;
        //     }
        // }

        // if ($request->customer_photo != "") {
        // $customer_photo = $request->customer_photo;
        // $folderPath = "assets/customer_details/profile";
        // $image_parts = explode(";base64,", $customer_photo);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        // $image_base64 = base64_decode($image_parts[1]);
        // $fileName = $BookingData->customer_name . '_' . $random_no . '_' . 'image' . '.png';
        // $customerimgfile = $folderPath . $random_no . $fileName;
        // file_put_contents($customerimgfile, $image_base64);
        // $BookingData->customer_photo = $customerimgfile;
        // }else{
        //   $Insertedcustomer_photo = $BookingData->customer_photo;
        //   $BookingData->customer_photo = $Insertedcustomer_photo;
        // }

        if ($request->file('proofimage_one') != "") {
            $proofimage_one = $request->proofimage_one;
            $filename_one = $BookingData->customer_name . '_' . $random_no . '_' . 'Front Proof' . '_' . $BookingData->prooftype_one . '.' . $proofimage_one->getClientOriginalExtension();
            $request->proofimage_one->move('assets/customer_details/proof/front', $filename_one);
            $BookingData->proofimage_one = $filename_one;
        } else {
            $Insertedproof_image_one = $BookingData->proofimage_one;
            $BookingData->proofimage_one = $Insertedproof_image_one;
        }

        if ($request->file('proofimage_two') != "") {
            $proofimage_two = $request->proofimage_two;
            $filename_two = $BookingData->customer_name . '_' . $random_no . '_' . 'Back Proof' . '_' . $BookingData->prooftype_one . '.' . $proofimage_two->getClientOriginalExtension();
            $request->proofimage_two->move('assets/customer_details/proof/back', $filename_two);
            $BookingData->proofimage_two = $filename_two;
        } else {
            $Insertedproof_image_two = $BookingData->proofimage_two;
            $BookingData->proofimage_two = $Insertedproof_image_two;
        }

        if ($request->file('customer_photo') != "") {
            $customer_photo = $request->customer_photo;
            $filename_customer_photo = $BookingData->customer_name . '_' . $random_no . '_' . 'Photo' . '.' . $customer_photo->getClientOriginalExtension();
            $request->customer_photo->move('assets/customer_details/proof/photo', $filename_customer_photo);
            $BookingData->customer_photo = $filename_customer_photo;
        } else {
            $Insertedproof_customer_photo = $BookingData->customer_photo;
            $BookingData->customer_photo = $Insertedproof_customer_photo;
        }

        $BookingData->total = $request->get('total_calc_price');
        $BookingData->gst_per = $request->get('gst_percentage');
        $BookingData->gst_amount = $request->get('gst_amount');
        $BookingData->disc_per = $request->get('discount_percentage');
        $BookingData->disc_amount = $request->get('discount_amount');
        $BookingData->additional_amount = $request->get('additional_charge');
        $BookingData->additional_notes = $request->get('additional_charge_notes');
        $BookingData->grand_total = $request->get('grand_total');
        $BookingData->balance_amount = $request->get('balance_amount');
        $BookingData->check_in_staff = $request->get('check_in_staff');
        $BookingData->update();

        $booking_id = $id;

        // Booking Payments
        $total_paid = 0;
        foreach ($request->get('booking_payment_id') as $key => $booking_payment_id) {

            if ($booking_payment_id > 0) {


                $ids = $booking_payment_id;
                $bookingID = $booking_id;
                $payment_term = $request->payment_term[$key];
                $payable_amount = $request->payable_amount[$key];
                $payment_method = $request->payment_method[$key];
                $total_paid += $payable_amount;

                DB::table('booking_payments')->where('id', $ids)->update([
                    'booking_id' => $bookingID,  'term' => $payment_term,  'payable_amount' => $payable_amount,  'payment_method' => $payment_method
                ]);


                $Booking_Data = Booking::findOrFail($id);
                $Booking_Data->total_paid = $total_paid;
                $Booking_Data->update();

            } else if ($booking_payment_id == '') {
                if ($request->payment_term[$key] != "") {

                    $payment_term = $request->payment_term[$key];
                    $payable_amount = $request->payable_amount[$key];
                    $payment_method = $request->payment_method[$key];
                    $bookingID = $booking_id;

                    $BookingPayment = new BookingPayment;
                    $BookingPayment->booking_id = $bookingID;
                    $BookingPayment->term = $payment_term;
                    $BookingPayment->payable_amount = $payable_amount;
                    $BookingPayment->payment_method = $payment_method;
                    $BookingPayment->save();

                }
            }
        }

        // Booking Rooms
        $getinsertedBookingRooms = BookingRoom::where('booking_id', '=', $booking_id)->get();
        $BookingRooms = array();
        foreach ($getinsertedBookingRooms as $key => $getinsertedBookingRoom) {
            $BookingRooms[] = $getinsertedBookingRoom->id;
        }
        $updatedroom_id = $request->room_auto_id;
        $updatedroomIDs = array_filter($updatedroom_id);
        $different_ids = array_merge(array_diff($BookingRooms, $updatedroomIDs), array_diff($updatedroomIDs, $BookingRooms));
        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                $Rooms_ids = BookingRoom::findOrFail($different_id);
                DB::table('rooms')->where('id', $Rooms_ids->room_id)->update([
                    'booking_status' => 0
                ]);
            }
        }

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                BookingRoom::where('id', $different_id)->delete();
            }
        }

        foreach ($request->get('room_auto_id') as $key => $room_auto_id) {
            if ($room_auto_id > 0) {
                $ids = $room_auto_id;
                $bookingID = $booking_id;
                $room_id = $request->room_id[$key];
                $room_price = $request->room_price[$key];
                $room_cal_price = $request->room_cal_price[$key];
                $room_type = $request->room_type[$key];

                DB::table('booking_rooms')->where('id', $ids)->update([
                    'booking_id' => $bookingID,  'room_id' => $room_id,  'room_price' => $room_price,  'room_cal_price' => $room_cal_price, 'room_type' => $room_type
                ]);
            } else if ($room_auto_id == '') {
                if ($request->room_id[$key] > 0) {

                    $GetroomDetails = Room::findOrFail($room_id);

                    $new_room_id =  $request->room_id[$key];
                    $room_price =  $request->room_price[$key];
                    $room_cal_price =  $request->room_cal_price[$key];
                    $room_type = $request->room_type[$key];

                    $BookingRoom = new BookingRoom;
                    $BookingRoom->booking_id = $booking_id;
                    $BookingRoom->room_id = $new_room_id;
                    $BookingRoom->room_type = $room_type;
                    $BookingRoom->room_floor = $GetroomDetails->room_floor;
                    $BookingRoom->room_price = $room_price;
                    $BookingRoom->room_cal_price = $room_cal_price;

                    $BookingRoom->save();

                    DB::table('rooms')->where('id', $new_room_id)
                        ->update(['booking_status' => 1]);
                }
            }
        }

       return redirect()->route('booking.index', ['user_branch_id' => $BookingData->branch_id])->with('update', 'Updated booking information has been added to your list.');
    }

    public function delete($id)
    {
        $data = Booking::findOrFail($id);
        $data->soft_delete = 1;
        $data->update();

        $BookingRooms = BookingRoom::where('booking_id', '=', $id)->get();
        foreach ($BookingRooms as $key => $BookingRooms_arr) {
            $bookingroom_data = BookingRoom::findOrFail($BookingRooms_arr->id);
            $bookingroom_data->soft_delete = 1;
            $bookingroom_data->update();
        }

        return redirect()->route('booking.index')->with('soft_destroy', 'Successfully deleted the booking record !');
    }

    public function destroy($id)
    {
        $data = Booking::findOrFail($id);

        $data->delete();

        return redirect()->route('booking.index')->with('destroy', 'Successfully erased the booking record !');
    }

    public function checkout(Request $request, $id)
    {
        $data = Booking::findOrFail($id);

        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $data->out_time = $request->get('out_time');
        $data->out_date = $request->get('out_date');
        $data->check_out_staff = $request->get('check_out_staff');
        $status = 2;
        $data->status = $status;

        $data->update();

        $customer_name = $data->customer_name;
        $whatsapp = $data->whats_app_number;

        foreach ($request->get('room_id') as $key => $room_id) {
            DB::table('rooms')->where('id', $room_id)
            ->update(['booking_status' => 0]);
        }


        return redirect()->back()->with('checkout', 'Checkout information has been updated to your list');

        //$message_key = 'Dear%20'.$customer_name.'%0a%0aThank%20you%20for%20choosing%20Sri%20Maruthi%20Inn%20for%20your%20recent%20stay.%20We%20hope%20you%20had%20a%20great%20experience%20with%20us.%20We%20would%20love%20to%20hear%20your%20thoughts%20and%20feedback%20on%20your%20stay.%20Please%20take%20a%20moment%20to%20complete%20our%20short%20survey%20using%20the%20link%20below.%20Your%20feedback%20is%20valuable%20to%20us%20and%20will%20help%20us%20improve%20our%20services%20for%20future%20guests.%0a%0aThank%20you%20for%20your%20time,%20and%20we%20look%20forward%20to%20seeing%20you%20again%20soon!%0a%0aFeedback%20link%20:%20https://srimaruti.com/feedback';
        //$access_token_key = env('WHATSAPP_ACCESS_TOKEN');
        //$instance_id_key = env('WHATSAPP_INSTANCE_ID');

        //$response = Http::post('https://smstool.in/api/send.php?number=91'.$whatsapp.'&type=text&message='.$message_key.'&instance_id='.$instance_id_key.'&access_token='.$access_token_key.'');

        //if($response->successful()){
        //    return redirect()->back()->with('checkout', 'Checkout information has been updated to your list, and notification send to customer.');
        //} else {
        //    return redirect()->back()->with('checkout', 'Checkout information has been updated to your list');
        //}
    }

    public function pay_balance(Request $request, $id)
    {
        $paid_date = Carbon::now()->format('Y-m-d');

        $BookingPayment = new BookingPayment;
        $BookingPayment->booking_id = $id;
        $BookingPayment->term = $request->get('payment_term');
        $BookingPayment->payable_amount = $request->get('payable_amount');
        $BookingPayment->paid_date = $paid_date;
        $BookingPayment->payment_method = $request->get('payment_method');
        $BookingPayment->save();

        $payableAmount = $request->get('payable_amount');
        $data = Booking::findOrFail($id);
        $total_paid_amount = $data->total_paid + $payableAmount;
        $balance = $data->grand_total - $total_paid_amount;
        $data->total_paid = $total_paid_amount;
        $data->balance_amount = $balance;
        $data->update();

        return redirect()->back()->with('update', 'Updated booking payment information has been added to your list.');
    }

    public function view($id)
    {
        $data = Booking::findOrFail($id);
        $today = Carbon::now()->format('d M Y');
        $roomsbooked = BookingRoom::where('booking_id', '=', $id)->get();
        $branch = Branch::findOrFail($data->branch_id);

        $room_list = [];
        foreach ($roomsbooked as $key => $rooms_booked) {
            $Rooms = Room::findOrFail($rooms_booked->room_id);
            $room_list[] = array(
                'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                'room_price' => $rooms_booked->room_price,
                'days' => $data->days,
                'room_cal_price' => $rooms_booked->room_cal_price,
            );
        }

        return view('pages.backend.booking.view', compact('data', 'branch', 'room_list', 'today'));
    }

    public function bookingbillview($id)
    {
        $data = Booking::findOrFail($id);
        $today = Carbon::now()->format('d M Y');
        $roomsbooked = BookingRoom::where('booking_id', '=', $id)->get();
        $branch = Branch::findOrFail($data->branch_id);

        $room_list = [];
        foreach ($roomsbooked as $key => $rooms_booked) {
            $Rooms = Room::findOrFail($rooms_booked->room_id);
            $room_list[] = array(
                'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                'room_price' => $rooms_booked->room_price,
                'days' => $data->days,
                'room_cal_price' => $rooms_booked->room_cal_price,
            );
        }

        return view('pages.backend.booking.bookingbillview', compact('data', 'branch', 'room_list', 'today'));
    }

    public function datefilter(Request $request, $user_branch_id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $from_date = $request->get('from_date');
        $timenow = Carbon::now()->format('H:i');
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        $checkins = Booking::where('check_in_date', '=', $from_date)->where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->count();
        $checkouts = Booking::where('out_date', '=', $from_date)->where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->count();
        $availablerooms = Room::where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->where('booking_status', '!=', 1)->count();
        $totalrooms = Room::where('soft_delete', '!=', 1)->where('branch_id', '=', $user_branch_id)->count();

        $checkin_Array = [];
        $room_list = [];
        $terms = [];

        $check_in_date = Booking::where('check_in_date', '=', $from_date)->orwhere('out_date', '=', $from_date)->where('branch_id', '=', $user_branch_id)->where('soft_delete', '!=', 1)->get();

            foreach ($check_in_date as $key => $check_in_dates) {
                $branch = Branch::findOrFail($check_in_dates->branch_id);
                $roomsbooked = BookingRoom::where('booking_id', '=', $check_in_dates->id)->get();
                foreach ($roomsbooked as $key => $rooms_booked) {
                    $Rooms = Room::findOrFail($rooms_booked->room_id);
                    $room_list[] = array(
                        'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                        'booking_id' => $check_in_dates->id,
                        'booking_room_price' => $rooms_booked->room_price,
                        'room_cal_price' => $rooms_booked->room_cal_price,
                        'id' => $rooms_booked->id,
                        'room_id' => $rooms_booked->room_id,
                    );
                }

                $payment_data = BookingPayment::where('booking_id', '=', $check_in_dates->id)->get();
                foreach ($payment_data as $key => $payment_datas) {

                    $terms[] = array(
                        'booking_id' => $check_in_dates->id,
                        'term' => $payment_datas->term,
                        'payable_amount' => $payment_datas->payable_amount,
                        'id' => $payment_datas->id,
                        'payment_method' => $payment_datas->payment_method,
                    );
                }

                $checkin_Array[] = array(
                        'customer_name' => $check_in_dates->customer_name,
                        'room_list' => $room_list,
                        'branch' => $branch->name,
                        'chick_in_date' => $check_in_dates->check_in_date,
                        'chick_in_time' => $check_in_dates->check_in_time,
                        'id' => $check_in_dates->id,
                        'chick_out_date' => $check_in_dates->check_out_date,
                        'out_date' => $check_in_dates->out_date,
                        'chick_out_time' => $check_in_dates->check_out_time,
                        'phone_number' => $check_in_dates->phone_number,
                        'grand_total' => $check_in_dates->grand_total,
                        'total_paid' => $check_in_dates->total_paid,
                        'balance_amount' => $check_in_dates->balance_amount,
                        'days' => $check_in_dates->days,
                        'gst_per' => $check_in_dates->gst_per,
                        'gst_amount' => $check_in_dates->gst_amount,
                        'disc_per' => $check_in_dates->disc_per,
                        'disc_amount' => $check_in_dates->disc_amount,
                        'additional_amount' => $check_in_dates->additional_amount,
                        'additional_notes' => $check_in_dates->additional_notes,
                        'total' => $check_in_dates->total,
                        'terms' => $terms,
                        'status' => $check_in_dates->status,
                        'extended_date' => $check_in_dates->extended_date,
                        'extended_time' => $check_in_dates->extended_time,
                        'out_date' => $check_in_dates->out_date,
                        'out_time' => $check_in_dates->out_time,
                        'booking_invoiceno' => $check_in_dates->booking_invoiceno,
                );
            }

        return view('pages.backend.booking.datefilter', compact('totalrooms', 'checkins', 'checkouts', 'availablerooms', 'timenow', 'staff', 'today', 'checkin_Array', 'from_date', 'user_branch_id'));
    }

    public function autocomplete(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Booking::select ("phone_number")
                    ->where('phone_number', 'LIKE', "%{$query}%")->distinct()->get();
            $output = '<ul class="dropdown-menu form-control" style="display:block; position:relative; padding: 9px;background: #9ddbdb2e;">';
            foreach($data as $row)
            {
                $output .= '<li><a href="#" style="color:black;padding:5px;">'.$row->phone_number.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function getoldCustomers($phone_no)
    {
        $GetCustomer = Booking::select('*')->where('phone_number', $phone_no)->get();
        $userData['data'] = $GetCustomer;
        echo json_encode($userData);
    }

    public function extend(Request $request, $id)
    {
        $data = Booking::findOrFail($id);

        $data->check_out_date = $request->get('extended_date');
        $data->check_out_time = $request->get('extended_time');
        // $data->extended_date = $request->get('extended_date');
        // $data->extended_time = $request->get('extended_time');
        $data->days = $request->get('no_of_days');
        $data->total = $request->get('total_calc_price');
        $data->gst_amount = $request->get('gst_amount');
        $data->gst_per = $request->get('gst_percentage');
        $data->disc_amount = $request->get('discount_amount');
        $data->disc_per = $request->get('discount_percentage');
        $data->additional_amount = $request->get('additional_charge');
        $data->additional_notes = $request->get('additional_charge_notes');
        $data->grand_total = $request->get('grand_total');
        $data->total_paid = $request->get('payable_amount');
        $data->balance_amount = $request->get('balance_amount');
        $status = 1;
        $data->status = $status;
        $data->update();

        if($request->get('balance_amount') > 0){

            $paiddate = Carbon::now()->format('Y-m-d');

            $BookingPayment = new BookingPayment;
            $BookingPayment->booking_id = $request->get('booking_id');
            $BookingPayment->term = $request->get('payment_term');
            $BookingPayment->payable_amount = $request->get('balance_amount');
            $BookingPayment->paid_date = $paiddate;
            $BookingPayment->payment_method = $request->get('payment_method');
            $BookingPayment->save();

            $payableAmount = $request->get('balance_amount');

            $booking_data = Booking::findOrFail($id);
            $total_paid_amount = $booking_data->total_paid + $payableAmount;
            $balance = $booking_data->grand_total - $total_paid_amount;
            $booking_data->total_paid = $total_paid_amount;
            $booking_data->balance_amount = $balance;
            $booking_data->update();

            foreach ($request->get('room_auto_id') as $key => $room_auto_id) {

                $ids = $room_auto_id;
                $bookingID = $request->get('booking_id');
                $booking_room_price = $request->booking_room_price[$key];
                $booking_room_cal_price = $request->booking_room_cal_price[$key];
                $room_id = $request->room_id[$key];
                DB::table('booking_rooms')->where('id', $ids)
                    ->update(['room_price' => $booking_room_price,  'room_cal_price' => $booking_room_cal_price]);
            }
        }

        return redirect()->back()->with('update', 'Updated booking information has been added to your list.');
    }

    public function pricing($id)
    {
        $data = Booking::findOrFail($id);
        return view('pages.backend.booking.checkout', compact('data'));
    }

    public function exportaspdf()
    {
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.components.exportaspdf', compact('branch', 'staff'));
    }

    public function printexportpdf(Request $request)
    {

        $manager_id = $request->get('manager_id');
        $branch_id = $request->get('branch_id');
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');

        $branch = Branch::findOrFail($branch_id);
        $manager = Staff::findOrFail($manager_id);

        $checkin_Data = Booking::whereBetween('check_in_date', [$from_date, $to_date])
                                ->where('branch_id', '=', $branch_id)
                                ->where('check_in_staff', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->orderBy('check_in_date', 'asc')
                                ->get();
        $checkin_Array = [];
        $room_list = [];
        foreach ($checkin_Data as $key => $checkin_Datas) {
            $roomsbooked = BookingRoom::where('booking_id', '=', $checkin_Datas->id)->get();
                    foreach ($roomsbooked as $key => $rooms_booked) {
                        $Rooms = Room::findOrFail($rooms_booked->room_id);
                        $room_list[] = array(
                            'roomno' => 'No. '. $Rooms->room_number,
                            'roomtype' => $rooms_booked->room_type,
                            'booking_room_price' => $rooms_booked->room_price,
                            'booking_id' => $checkin_Datas->id,
                        );
                    }

                    $payment_data_arr = BookingPayment::where('booking_id', '=', $checkin_Datas->id)->get();

                    foreach ($payment_data_arr as $key => $payment_data_array) {

                        $cash_paymentmethod = $payment_data_array->payment_method;
                        if($cash_paymentmethod == 'Cash'){
                            $cash_income = $checkin_Datas->total;
                            $case_income_gst = $checkin_Datas->gst_amount;
                        }else{
                            $cash_income = '-';
                            $case_income_gst = '-';
                        }


                        if($cash_paymentmethod == 'Online Payment'){
                            $online_income = $checkin_Datas->total;
                            $online_income_gst = $checkin_Datas->gst_amount;
                        }else{
                            $online_income = '-';
                            $online_income_gst = '-';
                        }
                    }




                    $checkin_Array[] = array(
                        'room_list' => $room_list,
                        'days' => $checkin_Datas->days,
                        'grand_total' => $checkin_Datas->grand_total,
                        'id' => $checkin_Datas->id,
                        'check_in_date' => $checkin_Datas->check_in_date,
                        'total' => $checkin_Datas->total,
                        'gst_amount' => $checkin_Datas->gst_amount,
                        'booking_invoiceno' => $checkin_Datas->booking_invoiceno,
                        'check_out_date' => $checkin_Datas->out_date,
                        'check_out_time' => $checkin_Datas->out_time,
                        'cash_income' => $cash_income,
                        'case_income_gst' => $case_income_gst,
                        'online_income' => $online_income,
                        'online_income_gst' => $online_income_gst,
                    );
        }

        $checkout_Data = Booking::whereBetween('out_date', [$from_date, $to_date])
                                ->where('branch_id', '=', $branch_id)
                                ->where('check_out_staff', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->orderBy('out_date', 'asc')
                                ->get();
        $checkout_Array = [];
        $ch_oroom_list = [];
        foreach ($checkout_Data as $key => $checkout_Datas) {

                $coroomsbooked = BookingRoom::where('booking_id', '=', $checkout_Datas->id)->get();
                    foreach ($coroomsbooked as $key => $corooms_booked) {
                        $Rooms = Room::findOrFail($corooms_booked->room_id);
                        $ch_oroom_list[] = array(
                            'roomno' => 'No. '. $Rooms->room_number,
                            'roomtype' => $corooms_booked->room_type,
                            'booking_room_price' => $corooms_booked->room_price,
                            'booking_id' => $checkout_Datas->id,
                        );
                    }




                    $checkout_Array[] = array(
                        'room_list' => $ch_oroom_list,
                        'days' => $checkout_Datas->days,
                        'grand_total' => $checkout_Datas->grand_total,
                        'id' => $checkout_Datas->id,
                        'check_out_date' => $checkout_Datas->check_out_date,
                        'total' => $checkout_Datas->total,
                        'gst_amount' => $checkout_Datas->gst_amount,
                        'booking_invoiceno' => $checkout_Datas->booking_invoiceno,
                    );
        }

        $income = Income::whereBetween('date', [$from_date, $to_date])->where('branch_id', '=', $branch_id)
                                ->where('staff_id', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->orderBy('date', 'asc')
                                ->get();

        $expence = Expense::whereBetween('date', [$from_date, $to_date])->where('branch_id', '=', $branch_id)
                                ->where('staff_id', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->orderBy('date', 'asc')
                                ->get();

        $income_total = Income::whereBetween('date', [$from_date, $to_date])->where('branch_id', '=', $branch_id)
                                ->where('staff_id', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->sum('amount');

        $expence_total = Expense::whereBetween('date', [$from_date, $to_date])->where('branch_id', '=', $branch_id)
                                ->where('staff_id', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->sum('amount');



        $Total_room_income = Booking::whereBetween('check_in_date', [$from_date, $to_date])
                                ->where('branch_id', '=', $branch_id)
                                ->where('check_in_staff', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->get();
        $room_cash_income = 0;
        foreach ($Total_room_income as $key => $Total_room_income_arr) {
            $payment_data_arr = BookingPayment::where('booking_id', '=', $Total_room_income_arr->id)
                                            ->where('payment_method', '=', 'Cash')
                                            ->get();

            foreach ($payment_data_arr as $key => $payment_data_array) {

                if($payment_data_array->booking_id == $Total_room_income_arr->id){
                    $room_cash_income += $Total_room_income_arr->grand_total;
                }
            }
        }

        $room_online_income = 0;
        foreach ($Total_room_income as $key => $Total_room_income_array) {
            $payment_onlinedata_arr = BookingPayment::where('booking_id', '=', $Total_room_income_array->id)
                                            ->where('payment_method', '=', 'Online Payment')
                                            ->get();

            foreach ($payment_onlinedata_arr as $key => $payment_onlinedata_array) {

                if($payment_onlinedata_array->booking_id == $Total_room_income_array->id){
                    $room_online_income += $Total_room_income_array->grand_total;
                }
            }
        }



        return view('pages.backend.booking.components.printexportpdf', compact('income_total', 'expence_total', 'income', 'expence', 'branch', 'manager', 'from_date', 'to_date', 'checkin_Array', 'checkout_Array', 'room_cash_income', 'room_online_income'));
    }
}
