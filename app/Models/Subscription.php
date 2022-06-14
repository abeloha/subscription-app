<?php

namespace App\Models;

use App\Mail\PostPublished;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }


    public function notify($post){
        Mail::to($this->email)
        ->queue(new PostPublished($post));
    }
}
