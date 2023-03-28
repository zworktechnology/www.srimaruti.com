<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'room_id',
        'room_type',
        'room_floor',
        'room_price',
        'room_cal_price',
        'soft_delete'
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class, 'booking_id');
    }

    public function room()
    {
        return $this->hasMany(Room::class, 'room_id');
    }
}
