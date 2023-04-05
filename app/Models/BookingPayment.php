<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'term',
        'payable_amount',
        'paid_date',
        'payment_method',
        'soft_delete'
    ];


    public function booking()
    {
        return $this->hasMany(Booking::class, 'booking_id');
    }
}
