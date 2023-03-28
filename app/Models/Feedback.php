<?php

namespace App\Models;

use App\Mail\FeedbackMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message'
    ];

    public static function boot()
    {
        Parent::boot();

        static::created(function ($item) {

            $to_submited_author = $item->email;

            Mail::to($to_submited_author)->send(new FeedbackMail ($item));
        });
    }
}
