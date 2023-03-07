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
}
