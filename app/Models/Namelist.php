<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namelist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'soft_delete'
    ];

    public function income()
    {
        return $this->hasMany(Income::class, 'namelist_id');
    }

    public function expense()
    {
        return $this->hasMany(Expense::class, 'namelist_id');
    }
}
