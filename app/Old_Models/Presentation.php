<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Ticker;

class Presentation extends Report
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'presentations';

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
    protected $fillable = ['ticker_id', 'date', 'report_name', 'company_name', 'file_url'];

     /**
     * populates a new presentation from the form
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Request $request [with some data added to the array]
     */
    public function populateNew(Request $request)
    {
         $requestData = $request->all();
         if( isset($requestData['file']) )
         {
            $fileInstance = $requestData['file'];
            $fileOriginalName = $fileInstance->getClientOriginalName();
             $requestData['file_url'] = $this->reportGetFileURL("Presentation", $fileOriginalName );
         }
        
        $companyName = Ticker::find( $requestData['ticker_id'] )->ticker;

        $requestData['company_name'] = $companyName;
       
        
        return $requestData;
    }

    /**
     * Edits the fields from a file and includes the filr URL from the old entry
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Request $request [with some data added to the array]
     */
    public function populateFromEdit(Request $request, $fileUrl)
    {
         $requestData = $request->all();
      
        $companyName = Ticker::find( $requestData['ticker_id'] )->ticker;

        $requestData['company_name'] = $companyName;
        $requestData['file_url'] = $fileUrl;
        
        return $requestData;
    }
}
