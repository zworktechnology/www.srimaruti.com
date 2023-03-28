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
        'days',
        'branch_id',

        'proofs',
        'proof_type',
        'proof_image',
        'd_prooftype',
        'd_proofimage',
        'customer_photo',

        'chick_in_date',
        'chick_in_time',

        'total',
        'gst_per',
        'gst_amount',
        'disc_per',
        'disc_amount',
        'additional_amount',
        'additional_notes',
        'grand_total',
        'payment_method',
        'status',
        'soft_delete'
    ];


    public function branch()
    {
        return $this->hasMany(Branch::class, 'branch_id');
    }
}
