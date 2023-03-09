<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'amount',
        'note',
        'namelist_id',
        'branch_id',
        'soft_delete'
    ];

    public function namelist()
    {
        return $this->belongsTo(Namelist::class, 'namelist_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
