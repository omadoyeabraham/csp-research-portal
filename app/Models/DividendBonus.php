<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DividendBonus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dividend_bonuses';

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
    protected $fillable = ['ticker_id', 'period', 'dividend', 'bonus', 'company_name', 'closure_of_register', 'agm_date','payment_date'];

    
}
