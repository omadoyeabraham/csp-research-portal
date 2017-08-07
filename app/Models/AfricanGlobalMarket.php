<?php

namespace App\Models;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Excel;

class AfricanGlobalMarket extends Report
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'african_global_markets';

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
    protected $fillable = ['date', 'JAISH_INDEX', 'JAISH_CHANGE', 'NSE_ASI_INDEX', 'NSE_ASI_CHANGE', 'GGSECI_INDEX', 'GGSECI_CHANGE', 'EGX30_INDEX', 'EGX30_CHANGE', 'SP_500_INDEX', 'SP_500_CHANGE', 'DJIA_INDEX', 'DJIA_CHANGE', 'FTSE_INDEX', 'FTSE_CHANGE', 'NIKKEL_INDEX', 'NIKKEL_CHANGE'];

    /**
     * Creates a new template by inserting values from the uploaded file into the DB
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createTemplate($request)
    {
        if ( !($this->isCorrectTemplateFormat($request['file']) ) ) 
        {
            session()->flash('statusDanger', 'The uploaded template differs from the standard required template.');
            return redirect('african-global-market');
        }
        
        try {
              $this->storeTemplateFile($request['file']);
              $this->updateDB($request['file'], $request['date'] );

        } catch (\Exception $e) {

             session()->flash('statusDanger', 'An error occured while uploading the file. Please ensure that this file matches the designed excel template. ');
             return redirect('african-global-market');
        }
        //
      
        //dd($request);
    }

     /**
     * Ascertains whether the uploaded template adheres to the template structure designed
     * @param  File $templateInstance
     * @return Boolean
     */
    public function isCorrectTemplateFormat($templateInstance)
    {
        return true;
    }

    /**
     * Store the template file on a disk on the server.
     * This file will be deleted once the DB update is done
     * @return [type] [description]
     */
    public function storeTemplateFile($fileInstance)
    {
        //dd($fileInstance);
        try {
            Storage::disk('excelTemplates')->put($fileInstance->getClientOriginalName(), file_get_contents($fileInstance->getRealPath() ) );
        } catch (Exception $e) {
            session()->flash('statusDanger', 'There was an error saving the template on the server.');
            return redirect('african-global-market')->withInput();
        }
    }

    /**
     * update the database with the values from the excel file
     * @param  File $templateInstance 
     * @return [type]                   [description]
     */
    public function updateDB($templateInstance, $date)
    {
            $templateOriginalName = $templateInstance->getClientOriginalName();

            //Returns an error if we try to read from a file that has not been stored on our storage disk.
            if ( !(Storage::disk('excelTemplates')->exists($templateOriginalName )  ) )
            {
                session()->flash('statusDanger', 'An error occured, System tried to read a file that does not exist');
                return redirect('admin-upload-templates')->withInput();
            }

            //Had to use substr, because of a prependended '/' returned from the call to Storage::url
            $fileUrl = $this->reportGetFileURL('Excel Template', $templateOriginalName);
            $fileUrl = substr($fileUrl, 1);
            //dd($fileUrl);
            //Container variables used to transfer info from the excelsheets to the application
            $africanMarkets = new \Maatwebsite\Excel\Collections\CellCollection;
            $globalMarkets = new \Maatwebsite\Excel\Collections\CellCollection;

            //Assign the values to $this
            $this->assignDBValues($fileUrl);
            $this->assignDate($date);

            try {
                 $this->save();

            } catch (\Illuminate\Database\QueryException  $e) {
                $oldReport = AfricanGlobalMarket::where('date', '=', $date)->first();
                //This fixes the issue of wrong template
                if($oldReport == null)
                {
                    session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
                   return redirect()->back()->withInput();
                }

                //This uploads a new file for a date that already has a file
                if($oldReport != null)
                {
                    $oldReport->assignDBValues($fileUrl);
                    $oldReport->save();
                }
                
            }
               
          
                  //dd($fileUrl);
                //dd($e);
                //$oldReport = AfricanGlobalMarket::where('date', '=', $date)->first();
               // $oldReport->assignDBValues($fileUrl);
                //$oldReport->save();
            
            
            session()->flash('statusSuccess', 'The template has been successfully uploaded');
            return redirect('');
    }


    /**
     * Assigns the values from the excel file to $this. Does'nt try to save and it does not assign the date also.
     * @return [type] [description]
     */
    public function assignDBValues($fileUrl)
    {
        //dd($fileUrl);
            try {
                            //Loading the first sheet and getting the values for the african markets
                            Excel::selectSheetsByIndex(0)->load($fileUrl, function($reader) {

                                    //Getting the first sheet in the workbook.This is for African markets
                                    $results = $reader->first();

                                    //Getting the rows in the  
                                    foreach ($results as $singleSheet) 
                                    {   
                                        $this->JAISH_INDEX = $singleSheet->jaish_index;
                                        $this->JAISH_CHANGE = $singleSheet->jaish_change;
                                        $this->NSE_ASI_INDEX = $singleSheet->nse_asi_index;
                                        $this->NSE_ASI_CHANGE = $singleSheet->nse_asi_change;
                                        $this->GGSECI_INDEX = $singleSheet->ggseci_index;
                                        $this->GGSECI_CHANGE = $singleSheet->ggseci_change;
                                        $this->EGX30_INDEX = $singleSheet->egx30_index;
                                        $this->EGX30_CHANGE = $singleSheet->egx30_change;
                                    }
                            });

                            //Loading the second sheet and getting the values for the global markets
                            Excel::selectSheetsByIndex(1)->load($fileUrl, function($reader){

                                //Getting the first sheet in the workbook.This is for Global markets
                             $results = $reader->first();

                                //Getting the rows in the  
                                foreach ($results as $singleSheet) 
                                {   
                                    $this->SP_500_INDEX = $singleSheet->sp_500_index;
                                    $this->SP_500_CHANGE = $singleSheet->sp_500_change;
                                    $this->DJIA_INDEX = $singleSheet->djia_index;
                                    $this->DJIA_CHANGE = $singleSheet->djia_change;
                                    $this->FTSE_INDEX = $singleSheet->ftse_index;
                                    $this->FTSE_CHANGE = $singleSheet->ftse_change;
                                    $this->NIKKEL_INDEX = $singleSheet->nikkel_index;
                                    $this->NIKKEL_CHANGE = $singleSheet->nikkel_change;
                                }
                        });



            } catch (\Exception $e) {
               //dd($e->getMessage());
                session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed excel template');
                return redirect('african-global-market');
            }
             

            
    }


    /**
     * Assigns the date to the report 
     * @param  Date $date 
     * @return 
     */
    public function assignDate($date)
    {
        $this->date = $date;
    }


}
