<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'ticker', 'ticker_full_name'];
}
