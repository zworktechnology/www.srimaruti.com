<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'soft_delete'
    ];

    public function income()
    {
        return $this->hasMany(Income::class, 'staff_id');
    }

    public function expense()
    {
        return $this->hasMany(Expense::class, 'staff_id');
    }

    public function closeaccount()
    {
        return $this->hasMany(CloseAccount::class, 'closer_name');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'check_in_staff');
    }
}
