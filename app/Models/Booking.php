<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'phone_number',
        'whats_app_number',
        'email_id',
        'address',

        'male_count',
        'female_count',
        'child_count',
        'check_in_date',
        'check_in_time',
        'check_out_date',
        'check_out_time',
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
        'payable_amount',
        'balance_amount',
        'payment_method',
        'status',
        'soft_delete'
    ];


    public function branch()
    {
        return $this->hasMany(Branch::class, 'branch_id');
    }
}
