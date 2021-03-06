<?php

namespace App\Models;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Excel;


class MasterTemplate extends Report
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'master_templates';

    protected $fillable = ['file'];

    

    /**
     * Checks the uploaded master template to see if it conforms to the predefined template
     * @return boolean 
     */
    public function isValidTemplate()
    {
        return true;
    }

    /**
     * Reads data from the excel file and updates the database with those values
     * @param  Request $requestData The request data from the upload form
     * @return [type]              [description]
     */
    public function updateDatabaseValues($requestData)
    {
        $date = $requestData['date'];
        $fileInstance = $requestData['file'];

        $this->storeTemplateFile($fileInstance);

         //Had to use substr, because of a prependended '/' returned from the call to Storage::url
         $fileUrl = $this->reportGetFileURL('Master Template', $fileInstance->getClientOriginalName() );
         $fileUrl = substr($fileUrl, 1);
        
        //Takes the excel file and uses its data to populate the class properties.
         return $this->populateClassProperties($fileUrl, $date);

        //store the file
        //get its location
        //use location to populate model properties
        //update DB using model properties
    }

    /**
     * Store the template file on a disk on the server.
     * This file will be deleted once the DB update is done
     * @param File $fileInstance The file object uploaded by the admin user
     * @return [type] [description]
     */
    public function storeTemplateFile($fileInstance)
    {
    
        try {
            Storage::disk('masterTemplate')->put($fileInstance->getClientOriginalName(), file_get_contents($fileInstance->getRealPath() ) );
        } catch (Exception $e) {
            session()->flash('statusDanger', 'There was an error saving the template on the server.');
            return redirect('master-template/create')->withInput();
        }
    }

    /**
     * Used to get all the Data from the excel template and store them into the Class Properties
     * @param File $fileInstance  Link to the master template which has beeen stored on the server
     * @param Date $date  The date selected by the user when uploading the template
     * @return Array Data gotten from the template
     */
    public function populateClassProperties($fileUrl, $date)
    {
        /**
         *The populate methods are seperate from the save methods, so the system can check if a template
         *has already been updated for the $date, if yes, it then updates that entry instead of creating a brand new record in the database  
         */
       
        $africanGlobalMarket = $this->populateAfricanGlobalMarkets($fileUrl, $date);
        $this->saveAfricanGlobalMarkets( $africanGlobalMarket );

        $tBills = $this->populateTBills($fileUrl, $date);
        $this->saveTBills( $tBills );

        $exchangeRate = $this->populateExchangeRate($fileUrl, $date);
        $this->saveExchangeRate( $exchangeRate );

        $nseAsi = $this->populateNseAsi($fileUrl, $date);
        $this->saveNseAsi( $nseAsi );

        $marketData = $this->populateMarketData($fileUrl, $date);
        $this->saveMarketData( $marketData );

        $topGainers = $this->populateTopGainers($fileUrl, $date);
        $this->saveTopGainers( $topGainers );

        $topLosers = $this->populateTopLosers($fileUrl, $date);
        $this->saveTopLosers( $topLosers );

        /**
         * Decided to call the saveBonds method inside the populateBonds method, because I have to loop through rows of bonds,
         * and save/update each one. Therefore the saveBonds method had to be called inside the foreach loop in the populateBonds method.
         */
        $this->populateBonds($fileUrl, $date);
       
        session()->flash('statusSuccess', 'The research portal data template has been successfully updated');
        return redirect('master-template/create');
    }

    public function populateNseAsi($fileUrl, $uploadDate)
    {
        $nseAsi = new NseAsi;

        Excel::selectSheetsByIndex(0)->load($fileUrl, function($reader) use($uploadDate, $nseAsi) {

                    $results = $reader->first();
                    
                    foreach ($results as $singleRow) 
                    {                           
                        //Saving NseAsi to be used for large NseAsi graph on homepage
                        $nseAsi->nse_asi = $singleRow->nse_asi_index;
                        $nseAsi->date = \Carbon\Carbon::parse($uploadDate)->format('d/m/y');;
                        
                    }
                   
            });

        return $nseAsi;
    }

    /**
     * [saveAfricanGlobalMarkets description]
     * @param  [type] $date    [description]
     * @param  [type] $fileUrl [description]
     * @return [type]          [description]
     */
    public function saveNseAsi($nseAsi)
    {
        //To catch same date records, because the date field is unique. It then updates the record with the $date instead of creating a new record
        try {
            $nseAsi->save();
        } catch (\Illuminate\Database\QueryException $e) {
             //dd($e);
            $oldReport = NseAsi::where('date', '=',$nseAsi->date)->first();

            //Just Incase a wrong template is uploaded
            if($oldReport == null)
            {
                session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
                return redirect()->back()->withInput();
            }

            $oldReport->nse_asi = $nseAsi->nse_asi;
            $oldReport->save();
          
        }
    }

    /**
     * Loads the African/Global market data from the master template and assigns it to the appropriate class properties.
     * @param  [type] $fileUrl Link to the master template stored on the server
     * @param Date $uploadDate   The date selected by the user when uploading the file
     * @return N/A
     */
    public function populateAfricanGlobalMarkets($fileUrl, $uploadDate)
    {
         $africanGlobalMarket = new AfricanGlobalMarket;
        
         Excel::selectSheetsByIndex(0)->load($fileUrl, function($reader) use($uploadDate, $africanGlobalMarket) {

                    $results = $reader->first();
                    
                    foreach ($results as $singleRow) 
                    {                           
                        $africanGlobalMarket->JAISH_INDEX = $singleRow->jaish_index;
                        $africanGlobalMarket->JAISH_CHANGE = $singleRow->jaish_change;
                        $africanGlobalMarket->NSE_ASI_INDEX = $singleRow->nse_asi_index;
                        $africanGlobalMarket->NSE_ASI_CHANGE = $singleRow->nse_asi_change;
                        $africanGlobalMarket->GGSECI_INDEX = $singleRow->ggseci_index;
                        $africanGlobalMarket->GGSECI_CHANGE = $singleRow->ggseci_change;
                        $africanGlobalMarket->EGX30_INDEX = $singleRow->egx30_index;
                        $africanGlobalMarket->EGX30_CHANGE = $singleRow->egx30_change;
                        $africanGlobalMarket->SP_500_INDEX = $singleRow->sp_500_index;
                        $africanGlobalMarket->SP_500_CHANGE = $singleRow->sp_500_change;
                        $africanGlobalMarket->DJIA_INDEX = $singleRow->djia_index;
                        $africanGlobalMarket->DJIA_CHANGE = $singleRow->djia_change;
                        $africanGlobalMarket->FTSE_INDEX = $singleRow->ftse_index;
                        $africanGlobalMarket->FTSE_CHANGE = $singleRow->ftse_change;
                        $africanGlobalMarket->NIKKEL_INDEX = $singleRow->nikkel_index;
                        $africanGlobalMarket->NIKKEL_CHANGE = $singleRow->nikkel_change;
                        $africanGlobalMarket->date = \Carbon\Carbon::parse($uploadDate)->format('Y/m/d'); //used this format bcus of error thrown with other formats by mysql
                    }
                   
            });

            return $africanGlobalMarket;
    }

    /**
     * [saveAfricanGlobalMarkets description]
     * @param  [type] $date    [description]
     * @param  [type] $fileUrl [description]
     * @return [type]          [description]
     */
    public function saveAfricanGlobalMarkets($africanGlobalMarket)
    {
        //To catch same date records, because the date field is unique. It then updates the record with the $date instead of creating a new record
        try {
            $africanGlobalMarket->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            $oldReport = AfricanGlobalMarket::where('date', '=',$africanGlobalMarket->date)->first();

            //Just Incase a wrong template is uploaded
            if($oldReport == null)
            {
                session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
                return redirect()->back()->withInput();
            }

            $oldReport->JAISH_INDEX = $africanGlobalMarket->JAISH_INDEX;
            $oldReport->JAISH_CHANGE = $africanGlobalMarket->JAISH_CHANGE;
            $oldReport->NSE_ASI_INDEX = $africanGlobalMarket->NSE_ASI_INDEX;
            $oldReport->NSE_ASI_CHANGE = $africanGlobalMarket->NSE_ASI_CHANGE;
            $oldReport->GGSECI_INDEX = $africanGlobalMarket->GGSECI_INDEX;
            $oldReport->GGSECI_CHANGE = $africanGlobalMarket->GGSECI_CHANGE;
            $oldReport->EGX30_INDEX = $africanGlobalMarket->EGX30_INDEX;
            $oldReport->EGX30_CHANGE = $africanGlobalMarket->EGX30_CHANGE;
            $oldReport->SP_500_INDEX = $africanGlobalMarket->SP_500_INDEX;
            $oldReport->SP_500_CHANGE = $africanGlobalMarket->SP_500_CHANGE;
            $oldReport->DJIA_INDEX = $africanGlobalMarket->DJIA_INDEX;
            $oldReport->DJIA_CHANGE = $africanGlobalMarket->DJIA_CHANGE;
            $oldReport->FTSE_INDEX = $africanGlobalMarket->FTSE_INDEX;
            $oldReport->FTSE_CHANGE = $africanGlobalMarket->FTSE_CHANGE;
            $oldReport->NIKKEL_INDEX = $africanGlobalMarket->NIKKEL_INDEX;
            $oldReport->NIKKEL_CHANGE = $africanGlobalMarket->NIKKEL_CHANGE;
            $oldReport->save();
          
        }
    }

    /**
     * Loads the Tbills data from the master template and assigns it to the appropriate class properties.
     * @param  [type] $fileUrl Link to the master template stored on the server
     * @param Date $uploadDate   The date selected by the user when uploading the file
     * @return $tBill TreasuryBill Class Instance
     */
    public function populateTBills($fileUrl, $uploadDate)
    {
        $tBill = new TreasuryBill;

        Excel::selectSheetsByIndex(2)->load( $fileUrl, function($reader) use($uploadDate, $tBill){

            //Returns a collection of the rows in the sheet
            $results = $reader->first();

            //Returns a row from the excel file
            foreach ($results as $singleRow)
            {
                $tBill->FI_90D_opening_bid = $singleRow->fi_90d_opening_bid;
                $tBill->FI_90D_closing_bid = $singleRow->fi_90d_closing_bid;
                $tBill->FI_90D_change = $singleRow->fi_90d_change;
                $tBill->FI_180D_opening_bid = $singleRow->fi_180d_opening_bid;
                $tBill->FI_180D_closing_bid = $singleRow->fi_180d_closing_bid;
                $tBill->FI_180D_change = $singleRow->fi_180d_change;
                $tBill->FI_360D_opening_bid = $singleRow->fi_360d_opening_bid;
                $tBill->FI_360D_closing_bid = $singleRow->fi_360d_closing_bid;
                $tBill->FI_360D_change = $singleRow->fi_360d_change;
                $tBill->date = \Carbon\Carbon::parse($uploadDate)->format('Y/m/d'); //used this format bcus of error thrown with other formats by mysql
            }
           
        });

        return $tBill;
    }

    /**
     * tries to save the $tBills parameter, if there is an integrity constraint exception(bcus of unique date) it then updates the existing record instead of saving a new one.
     * @param  TreasuryBill::CLASS  $tBills  Contains data that needs to be saved/updated as necessary.
     * @return [type]         [description]
     */
    public function saveTBills($tBills)
    {
         //To catch same date records, because the date field is unique. It then updates the record with the $date instead of creating a new record
        try {
            $tBills->save();
        } catch (\Illuminate\Database\QueryException $e) {
             dd($e);
            $oldReport = TreasuryBill::where('date', '=', $tBills->date)->first();
          
            //Just Incase a wrong template is uploaded
            if($oldReport == null)
            {
                session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
               return redirect()->back()->withInput();
            }
           
            $oldReport->FI_90D_opening_bid = $tBills->FI_90D_opening_bid;
            $oldReport->FI_90D_closing_bid = $tBills->FI_90D_closing_bid;
            $oldReport->FI_90D_change = $tBills->FI_90D_change;
            $oldReport->FI_180D_opening_bid = $tBills->FI_180D_opening_bid;
            $oldReport->FI_180D_closing_bid = $tBills->FI_180D_closing_bid;
            $oldReport->FI_180D_change = $tBills->FI_180D_change;
            $oldReport->FI_360D_opening_bid = $tBills->FI_360D_opening_bid;
            $oldReport->FI_360D_closing_bid = $tBills->FI_360D_closing_bid;
            $oldReport->FI_360D_change = $tBills->FI_360D_change;
            $oldReport->save();

        }
    }

    /**
     * Loads the bonds data from the master template and assigns it to the appropriate class properties.
     * @param String $fileUrl Link to the master template stored on the server
     * @param Date $upload  The date selected by the user when uploading the file
     * @return N/A
     */
    public function populateBonds($fileUrl, $uploadDate)
    {
       

        Excel::selectSheetsByIndex(1)->load($fileUrl, function($reader) use($uploadDate){

                    //Returns a sheet collection with just one sheet [Bonds sheet]
                    $results = $reader->all();
                  
                    //Returns a row collection of all Rows in the Bonds sheet
                    foreach ($results as $rows) 
                    {   
                        //Loops through the row collection and returns a single row each time
                        foreach ($rows as $singleRow)
                         {
                            $bond = new Bonds;
                           
                            $bond->bond_name = $singleRow->bond_symbol;
                            $bond->bond_id = $singleRow->bond_id;
                            $bond->bond_series = $singleRow->bond_series;
                            $bond->issue_date = $singleRow->issue_date;
                            $bond->maturity_date = $singleRow->maturity_date;
                            $bond->tenor = $singleRow->tenor;
                            $bond->coupon = $singleRow->coupon;
                            $bond->ttm = $singleRow->ttm;
                            $bond->duration = number_format($singleRow->duration, 2);
                            $bond->bid_price = $singleRow->bid_price;
                            $bond->offer_price = $singleRow->offer_price;
                            $bond->bid_ytm = $singleRow->bid_ytm * 100;
                            $bond->offer_ytm = $singleRow->offer_ytm *100;
                            $bond->benchmark_bond = $singleRow->benchmark_bond;
                            $bond->date = \Carbon\Carbon::parse($uploadDate)->format('m/d/Y');

                            $savingTheBonds = $this->saveBonds( $bond );
                           
                         }
                        
                    }
                   
            });
            
    }

    /**
     * tries to save the $bond parameter, if there is an integrity constraint exception(bcus of unique date) it then updates the existing record instead of saving a new one.
     * @param  Bonds::CLASS  $tBills  Contains data that needs to be saved/updated as necessary.
     * @return [type]         [description]
     */
    public function saveBonds( $bond )
    {
         //To catch same date records, because the date field is unique. It then updates the record with the $date instead of creating a new record
        try {
            $bond->save();
           // dd($bond);
        } catch (\Illuminate\Database\QueryException $e) {
             dd($e);
            $oldReport = Bonds::where('date', '=', $bond->date)->first();

            //Just Incase a wrong template is uploaded
            if($oldReport == null)
            {
                session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
               return redirect()->back()->withInput();
            }
           
             $oldReport->bond_name = $bond->bond_name;
             $oldReport->bond_id = $bond->bond_id;
             $oldReport->bond_series = $bond->bond_series;
             $oldReport->issue_date = $bond->issue_date;
             $oldReport->maturity_date = $bond->maturity_date;
             $oldReport->tenor = $bond->tenor;
             $oldReport->coupon = $bond->coupon;
             $oldReport->ttm = $bond->ttm;
             $oldReport->duration = $bond->duration;
             $oldReport->bid_price = $bond->bid_price;
             $oldReport->offer_price = $bond->offer_price;
             $oldReport->bid_ytm = $bond->bid_ytm;
             $oldReport->offer_ytm = $bond->offer_ytm;
             $oldReport->save();
          
        }
    }



    /**
     * Loads the exchange rate data from the master template and assigns it to the appropriate class properties.
     * @param String $fileUrl Link to the master template stored on the server
     * @param Date $upload  The date selected by the user when uploading the file
     * @return N/A
     */
    public function populateExchangeRate($fileUrl, $uploadDate)
    {
        
        $exchangeRate = new ExchangeRate;

        Excel::selectSheetsByIndex(3)->load($fileUrl, function($reader) use($uploadDate, $exchangeRate){

                    //Returns a sheet collection with only one sheet and takes the first/only sheet
                    $results = $reader->first();
                    
                    //Returns a row collection of all Rows in the  sheet
                    foreach ($results as $row) 
                    {    
                        $exchangeRate->ngn_gbp_parallel = $row->ngn_gbp_parallel;
                        $exchangeRate->ngn_usd_parallel = $row->ngn_usd_parallel;
                        $exchangeRate->ngn_eur_parallel = $row->ngn_eur_parallel;
                         $exchangeRate->ngn_gbp_official = $row->ngn_gbp_official;
                        $exchangeRate->ngn_usd_official = $row->ngn_usd_official;
                        $exchangeRate->ngn_eur_official = $row->ngn_eur_official;
                        $exchangeRate->date = \Carbon\Carbon::parse($uploadDate)->format('Y/m/d'); //used this format bcus of error thrown with other formats by mysql
                         

                    }
            });

        return $exchangeRate;
    }

    /**
     * tries to save the $exchangeRate parameter, if there is an integrity constraint exception(bcus of unique date) it then updates the existing record instead of saving a new one.
     * @param  ExchangeRate::CLASS  $tBills  Contains data that needs to be saved/updated as necessary.
     * @return [type]         [description]
     */
    public function saveExchangeRate( $exchangeRate )
    {
        //To catch same date records, because the date field is unique. It then updates the record with the $date instead of creating a new record
        try {
            $exchangeRate->save();
        } catch (\Illuminate\Database\QueryException $e) {
             dd($e);
             $oldReport = ExchangeRate::where('date', '=', $exchangeRate->date)->first();

             //Just Incase a wrong template is uploaded
            if($oldReport == null)
            {
                session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
               return redirect()->back()->withInput();
            }

             $oldReport->ngn_gbp_parallel = $exchangeRate->ngn_gbp_parallel;
             $oldReport->ngn_usd_parallel = $exchangeRate->ngn_usd_parallel;
             $oldReport->ngn_eur_parallel = $exchangeRate->ngn_eur_parallel;
             $oldReport->ngn_gbp_official = $exchangeRate->ngn_gbp_official;
             $oldReport->ngn_usd_official = $exchangeRate->ngn_usd_official;
             $oldReport->ngn_eur_official = $exchangeRate->ngn_eur_official;
             $oldReport->save();
        }
    }

    /**
     * Loads the market data from the master template, and assigns it to the appropriate class properties
     * @param  String $fileUrl Link to the master template stored on the server
     * @param  Date $upload  The date selected by the user when uploading the file
     * @returns N/A
     */
    public function populateMarketData($fileUrl, $uploadDate)
    {
        $marketData = new MarketData;
        

         Excel::selectSheetsByIndex(4)->load($fileUrl, function($reader) use($uploadDate, $marketData){

             //Returns a sheet collection with only one sheet and takes the first/only sheet
            $results = $reader->first();

            foreach ($results as $row) {
                
                $marketData->date =  \Carbon\Carbon::parse($uploadDate)->format('m/d/Y');
                $marketData->nse_asi = $row->nse_asi ;
                $marketData->market_cap = $row->market_cap ;
                $marketData->volume_traded = $row->volume_traded ;
                $marketData->value_traded = $row->value_traded ;
                $marketData->no_of_deals = $row->no_of_deals ;
                $marketData->daily_change = $row->daily_change ;
                $marketData->qtd = $row->qtd ;
                $marketData->ytd = $row->ytd ;
                
            }

         });

         return $marketData;
    }

    /**
     * tries to save the $marketData parameter, if there is an integrity constraint exception(bcus of unique date) it then updates the existing record instead of saving a new one.
     * @param   MarketData::CLASS  $marketData  Contains data that needs to be saved/updated as necessary.
     * @return [type]             [description]
     */
    public function saveMarketData( $marketData )
    {

        //To catch same date records, because the date field is unique. It then updates the record with the $date instead of creating a new record
        try {
            $marketData->save();
        } catch (\Illuminate\Database\QueryException $e) {
             dd($e);
            $oldReport = MarketData::where('date', '=', $marketData->date)->first();

         //Just Incase a wrong template is uploaded
        if($oldReport == null)
        {
            session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
           return redirect()->back()->withInput();
        }

            //Updating the values in the old report without changing the date.
            $oldReport->nse_asi = $marketData->nse_asi;
            $oldReport->market_cap = $marketData->market_cap;
            $oldReport->volume_traded = $marketData->volume_traded;
            $oldReport->value_traded = $marketData->value_traded;
            $oldReport->no_of_deals = $marketData->no_of_deals;
            $oldReport->daily_change = $marketData->daily_change;
            $oldReport->qtd = $marketData->qtd;
            $oldReport->ytd = $marketData->ytd;
            $oldReport->save();

        }

    }

    /**
     * Populate an instance of the TopGainers model to be saved. This model is populated with data from the master template
     * @param  String $fileUrl Link to the master template stored on the server
     * @param  Date $upload  The date selected by the user when uploading the file
     * @return [type] [description]
     */
    public function populateTopGainers($fileUrl, $uploadDate)
    {
        $topGainers = new TopGainers;

         Excel::selectSheetsByIndex(5)->load($fileUrl, function($reader) use($uploadDate, $topGainers){

             //Returns a sheet collection with only one sheet and takes the first/only sheet
            $results = $reader->first();

            foreach ($results as $row) {
               $topGainers->date = \Carbon\Carbon::parse($uploadDate)->format('d/m/Y');;
               $topGainers->gainer_one = $row->gainer_one ; 
               $topGainers->gainer_one_change = $row->gainer_one_change ;
               $topGainers->gainer_two = $row->gainer_two ;
               $topGainers->gainer_two_change = $row->gainer_two_change ;
               $topGainers->gainer_three = $row->gainer_three ;
               $topGainers->gainer_three_change = $row->gainer_three_change ;
               $topGainers->gainer_four = $row->gainer_four ;
               $topGainers->gainer_four_change = $row->gainer_four_change ;
               $topGainers->gainer_five = $row->gainer_five ;
               $topGainers->gainer_five_change = $row->gainer_five_change ; 
            }

         });

         return  $topGainers;
    } 

     /**
     * tries to save the $topGainers parameter, if there is an integrity constraint exception(bcus of unique date) it then updates the existing record instead of saving a new one.
     * @param   TopGainers::CLASS  $marketData  Contains data that needs to be saved/updated as necessary.
     * @return [type] [description]
     */
    public function saveTopGainers( $topGainers )
    {
         //To catch same date records, because the date field is unique. It then updates the record with the $date instead of creating a new record
        try {
            $topGainers->save();
        } catch (\Illuminate\Database\QueryException $e) {
             dd($e);
            $oldReport = TopGainers::where('date', '=', $topGainers->date)->first();

             //Just Incase a wrong template is uploaded
            if($oldReport == null)
            {
                session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
               return redirect()->back()->withInput();
            }

            //Updating the values in the old report without changing the date.
            $oldReport->gainer_one = $topGainers->gainer_one;
            $oldReport->gainer_one_change = $topGainers->gainer_one_change;
            $oldReport->gainer_two = $topGainers->gainer_two;
            $oldReport->gainer_two_change = $topGainers->gainer_two_change;
            $oldReport->gainer_three = $topGainers->gainer_three;
            $oldReport->gainer_three_change = $topGainers->gainer_three_change;
            $oldReport->gainer_four = $topGainers->gainer_four;
            $oldReport->gainer_four_change = $topGainers->gainer_four_change;
            $oldReport->gainer_five = $topGainers->gainer_five;
            $oldReport->gainer_five_change = $topGainers->gainer_five_change;
             $oldReport->save();

        }  

    }


    /**
     * Populate an instance of the TopLosers model to be saved. This model is populated with data from the master template
     * @param  String $fileUrl Link to the master template stored on the server
     * @param  Date $upload  The date selected by the user when uploading the file
     * @return [type] [description]
     */
    public function populateTopLosers($fileUrl, $uploadDate)
    {
        $topLosers = new TopLosers;

         Excel::selectSheetsByIndex(6)->load($fileUrl, function($reader) use($uploadDate, $topLosers){

             //Returns a sheet collection with only one sheet and takes the first/only sheet
            $results = $reader->first();

            foreach ($results as $row) {
               $topLosers->date = \Carbon\Carbon::parse($uploadDate)->format('d/m/Y');;
               $topLosers->loser_one = $row->loser_one ; 
               $topLosers->loser_one_change = $row->loser_one_change ;
               $topLosers->loser_two = $row->loser_two ;
               $topLosers->loser_two_change = $row->loser_two_change ;
               $topLosers->loser_three = $row->loser_three ;
               $topLosers->loser_three_change = $row->loser_three_change ;
               $topLosers->loser_four = $row->loser_four ;
               $topLosers->loser_four_change = $row->loser_four_change ;
               $topLosers->loser_five = $row->loser_five ;
               $topLosers->loser_five_change = $row->loser_five_change ; 
            }

         });

         return  $topLosers;
    } 

     /**
     * tries to save the  $topLosers parameter, if there is an integrity constraint exception(bcus of unique date) it then updates the existing record instead of saving a new one.
     * @param   TopLosers::CLASS  $marketData  Contains data that needs to be saved/updated as necessary.
     * @return [type] [description]
     */
    public function saveTopLosers( $topLosers )
    {
         //To catch same date records, because the date field is unique. It then updates the record with the $date instead of creating a new record
        try {
             $topLosers->save();
        } catch (\Illuminate\Database\QueryException $e) {
             dd($e);
            $oldReport = TopLosers::where('date', '=',  $topLosers->date)->first();

             //Just Incase a wrong template is uploaded
            if($oldReport == null)
            {
                session()->flash('statusDanger', 'An error occured while updating the values in the uploaded file. Please ensure that this file matches the designed template');
               return redirect()->back()->withInput();
            }

            //Updating the values in the old report without changing the date.
            $oldReport->loser_one =  $topLosers->loser_one;
            $oldReport->loser_one_change =  $topLosers->loser_one_change;
            $oldReport->loser_two =  $topLosers->loser_two;
            $oldReport->loser_two_change =  $topLosers->loser_two_change;
            $oldReport->loser_three =  $topLosers->loser_three;
            $oldReport->loser_three_change =  $topLosers->loser_three_change;
            $oldReport->loser_four =  $topLosers->loser_four;
            $oldReport->loser_four_change =  $topLosers->loser_four_change;
            $oldReport->loser_five =  $topLosers->loser_five;
            $oldReport->loser_five_change =  $topLosers->loser_five_change;
             $oldReport->save();

        }  

    }



}
