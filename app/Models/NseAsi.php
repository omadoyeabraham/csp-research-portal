<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NseAsi extends Model
{
    protected $table = "nse_asi_historical_data";
    protected $fillable = ['id', 'date', 'nse_asi'];
}
