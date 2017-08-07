<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use App\Ticker;

class FullHalfYearReport extends Report
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'full_half_year_reports';

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
    protected $fillable = ['id', 'file_url', 'report_type', 'date', 'report_name', 'report_preview'];

     /**
     * populates a new half/full year report from the form
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Request $request [with some data added to the array]
     */
    public function populateNew(Request $request)
    {
        $requestData = $request->all();
        $fileInstance = $requestData['file'];
        $fileOriginalName = $fileInstance->getClientOriginalName();
        $requestData['file_url'] = $this->reportGetFileURL("FullHalfYearReport", $fileOriginalName );
       
         return $requestData;
    }
    
}
