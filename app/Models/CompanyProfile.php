<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

// use App\Ticker;

class CompanyProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'company_profiles';

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
    protected $fillable = ['ticker_id', 'company_name', 'ticker', 'market_classification', 'sector', 'sub_sector', 'address', 'telephone_fax', 'website', 'registrar', 'company_secretary', 'date_listed', 'date_of_incorporation', 'board_of_directors', 'market_cap', 'shares_outstanding', 'ownership_structure'];


     /**
     * populates a new company profile from the form
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Request $request [with some data added to the array]
     */
    public function populateNew(Request $request)
    {
        $requestData = $request->all();

        $companyName = Ticker::find( $requestData['ticker_id'] )->ticker;
        $ticker = Ticker::find( $requestData['ticker_id'] )->ticker;

        $requestData['company_name'] = $companyName;
         $requestData['ticker'] = $ticker;
        
        return $requestData;
    }
    
}
