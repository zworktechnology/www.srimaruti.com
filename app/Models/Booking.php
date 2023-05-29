<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_invoiceno',
        'customer_name',
        'phone_number',
        'whats_app_number',
        'email_id',
        'address',
        'gst_number',

        'male_count',
        'female_count',
        'child_count',
        'check_in_date',
        'check_in_time',
        'check_out_date',
        'check_out_time',
        'extended_date',
        'extended_time',
        'days',
        'branch_id',

        'proofs',
        'prooftype_one',
        'proofimage_one',
        'prooftype_two',
        'proofimage_two',
        'customer_photo',

        'total',
        'gst_per',
        'gst_amount',
        'disc_per',
        'disc_amount',
        'additional_amount',
        'additional_notes',
        'grand_total',
        'total_paid',
        'balance_amount',
        'out_date',
        'out_time',
        'status',
        'soft_delete',

        'check_in_staff',
        'check_out_staff',
    ];


    public function branch()
    {
        return $this->hasMany(Branch::class, 'branch_id');
    }
}
