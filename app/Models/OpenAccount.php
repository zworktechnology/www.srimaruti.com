<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'amount',
        'branch_id',
        'soft_delete'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
