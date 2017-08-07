<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Ticker;

class PriceList extends Report
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'price_lists';

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
    protected $fillable = ['file_url', 'report_type', 'report_name', 'date'];

     
    public function populateNew(Request $request)
    {
        $requestData = $request->all();
        $fileInstance = $requestData['file'];
        $fileOriginalName = $fileInstance->getClientOriginalName();
        
       $requestData['file_url'] = $this->reportGetFileURL("Price List", $fileOriginalName );
       return $requestData;

    }
}
