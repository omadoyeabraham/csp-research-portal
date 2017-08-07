<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetterSubscribers extends Model
{
    protected $table = "news_letter_subscribers";
    protected $fillable = ['name', 'email'];
}
