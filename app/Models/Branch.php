<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'soft_delete'
    ];

    public function room()
    {
        return $this->hasMany(Room::class, 'branch_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'branch_id');
    }

    public function income()
    {
        return $this->hasMany(Income::class, 'branch_id');
    }

    public function expense()
    {
        return $this->hasMany(Expense::class, 'branch_id');
    }

    public function openaccount()
    {
        return $this->hasMany(OpenAccount::class, 'branch_id');
    }
}
