<?php

namespace App;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Excel;

class FixedIncome extends Report
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fixed_incomes';

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
    protected $fillable = ['date', 
       'FI_5Y_opening_yield', 'FI_5Y_closing_yield', 'FI_5Y_change', 
       'FI_10Y_opening_yield', 'FI_10Y_closing_yield', 'FI_10Y_change',
       'FI_20Y_opening_yield', 'FI_20Y_closing_yield','FI_20Y_change', 
       'FI_90D_opening_bid', 'FI_90D_closing_bid', 'FI_90D_change', 
       'FI_180D_opening_bid', 'FI_180D_closing_bid', 'FI_180D_change', 
       'FI_360D_opening_bid', 'FI_360D_closing_bid', 'FI_360D_change'];


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
            return redirect('fixed-income');
        }

        try {
            $this->storeTemplateFile($request['file']);
            $this->updateDB($request['file'], $request['date'] );

        } catch (\Exception $e) {
                session()->flash('statusDanger', 'An error occured while uploading the file. Please ensure that this file matches the designed excel template. ');
                return redirect('fixed-income');
        }
        

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
            return redirect('fixed-income')->withInput();
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
                return redirect('fixed-income')->withInput();
            }

            //Had to use substr, because of a prependended '/' returned from the call to Storage::url
            $fileUrl = $this->reportGetFileURL('Excel Template', $templateOriginalName);
            $fileUrl = substr($fileUrl, 1);
            
            //Assign the values to $this
            $this->assignDBValues($fileUrl);
            $this->assignDate($date);

            try {
               
                $this->save();

            } catch (\Illuminate\Database\QueryException  $e) {

                $oldReport = FixedIncome::where('date', '=', $date)->first();

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
            
            session()->flash('statusSuccess', 'The template has been successfully uploaded');
            return redirect('fixed-income');
    }

    /**
     * Assigns the values from the excel file to $this. Does'nt try to save and it does not assign the date also.
     * @return [type] [description]
     */
    public function assignDBValues($fileUrl)
    {

            try {
                    
                     //Loading the first sheet and getting the values for the bonds
                    Excel::selectSheetsByIndex(0)->load($fileUrl, function($reader) {

                            //Getting the first sheet in the workbook.This is for bonds
                            $results = $reader->first();
                           // dd($results);
                            //Getting the rows in the  sheet
                            foreach ($results as $singleSheet) 
                            {   
                                $this->FI_5Y_opening_yield = $singleSheet->fi_5y_opening_yield;
                                $this->FI_5Y_closing_yield = $singleSheet->fi_5y_closing_yield;
                                $this->FI_5Y_change = $singleSheet->fi_5y_change;
                                $this->FI_10Y_opening_yield = $singleSheet->fi_10y_opening_yield;
                                $this->FI_10Y_closing_yield = $singleSheet->fi_10y_closing_yield;
                                $this->FI_10Y_change = $singleSheet->fi_10y_change;
                                $this->FI_20Y_opening_yield = $singleSheet->fi_20y_opening_yield;
                                $this->FI_20Y_closing_yield = $singleSheet->fi_20y_closing_yield;
                                $this->FI_20Y_change = $singleSheet->fi_20y_change;
                            }
                    });

                    //Loading the second sheet and getting the values for the tbills
                    Excel::selectSheetsByIndex(1)->load($fileUrl, function($reader){

                            //Getting the first sheet in the workbook.This is for tbills
                            $results = $reader->first();

                            //Getting the rows in the  sheet
                            foreach ($results as $singleSheet) 
                            {   
                                $this->FI_90D_opening_bid = $singleSheet->fi_90d_opening_bid;
                                $this->FI_90D_closing_bid = $singleSheet->fi_90d_closing_bid;
                                $this->FI_90D_change = $singleSheet->fi_90d_change;
                                $this->FI_180D_opening_bid = $singleSheet->fi_180d_opening_bid;
                                $this->FI_180D_closing_bid = $singleSheet->fi_180d_closing_bid;
                                $this->FI_180D_change = $singleSheet->fi_180d_change;
                                $this->FI_360D_opening_bid = $singleSheet->fi_360d_opening_bid;
                                $this->FI_360D_closing_bid = $singleSheet->fi_360d_closing_bid;
                                $this->FI_360D_change = $singleSheet->fi_360d_change;
                            }
                    });

            } catch (\Exception $e) {
                     session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
                     return redirect()->back()->withInput();
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
