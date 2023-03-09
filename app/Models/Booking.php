<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_customer_name',
        'proof_type',
        'proof_image',
        'customer_photo',
        'booking_date',
        'chick_in_date',
        'chick_in_time',
        'chick_out_date',
        'chick_out_time',
        'phone_number',
        'whats_app_number',
        'email_id',
        'status',
        'soft_delete'
    ];
}
