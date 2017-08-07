<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Ticker;

class CorporateResult extends Report
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'corporate_results';

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
    protected $fillable = ['report_date', 'report_period', 'turnover', 'dividend', 'pbt', 'pat', 'file_date', 'file_url', 'company_name', 'ticker_id', 'date'];

    /**
     * populates a new corporate result from the form
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Request $request [with some data added to the array]
     */
    public function populateNew(Request $request)
    {
        $requestData = $request->all();
        $fileInstance = $requestData['file'];
        $fileOriginalName = $fileInstance->getClientOriginalName();
        $companyName = Ticker::find( $requestData['ticker_id'] )->ticker;

        $requestData['company_name'] = $companyName;
        $requestData['file_url'] = $this->reportGetFileURL("Corporate Result", $fileOriginalName );
        
        return $requestData;
    }

}
