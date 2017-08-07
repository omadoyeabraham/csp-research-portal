<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Exception;
use JavaScript;
use Storage;
use DB;
use App\Models\portalData;
use App\Models\Ticker;
use App\Models\PriceList;
use App\Models\MarketSummary;
use App\Models\CorporateResult;
use App\Models\ResearchReport;
use App\Models\FullHalfYearReport;
use App\Models\AllReports;
use App\Models\NewsLetterSubscribers;
use App\Models\Bonds;
use App\Models\NseAsi;
use App\Models\MarketData;

use App\Models\User;
use Hash;
use JWTAuth;

class ApiController extends Controller
{

    /**
    * Return all corporate results from the database
    *	
    * @return	JSON  Array of objects or error message if an error occurs
    *
    */
    public function getAllCorporateResults ()
    {
        try{
            $allCorporateResults = CorporateResult::all();
        } catch (\Exception $e){
            $allCorporateResults = "No corporate results currently available";
        }
         return response()->json( $allCorporateResults, 200 );                               
    }

    /**
     * Returns the top 5 gainers/losers to be displayed on the sidebar
     * @return JSON Array of objects
     */
    public function getStockGainersLosers()
    {
       try{
           $stockGainersLosers = file_get_contents("https://portal.cardinalstone.com/broker/desktop/public/stockGainerLosers.json");
           $stockGainersLosers = json_decode($stockGainersLosers);
       }catch (\Exception $e) {
           $stockGainersLosers = null;
       }
       return response()->json( $stockGainersLosers, 200);
    }

    public function getWebTickers()
    {
        $webTickers = portalData::getWebTickers();
        return response()->json( $webTickers, 200);
    }

    /**
     * Get the NSE ASI data to be used to plot the 5-day chart.
     * This data is gotten from the Zanibal database
     * @return 
     */
    public function getNseAsiFiveDaysData()
    {
	
        try {

             $fiveDaysData = MarketData::select( 'date', 'nse_asi')->orderBy('id', 'desc')->take(5)->get();
             return json_encode($fiveDaysData);

        } catch (Exception $e) {
            return new \stdClass;
        }
       
    }

    /**
     * Returns the market data used on the client portal dashboard
     * @return [type] [description]
     */
    public function getMarketData()
    {
        try {

           $allMarketData =  MarketData::orderBy('id', 'desc')->take(2)->get();
           //return $allMarketData;
           $firstDay = $allMarketData[0];
           $secondDay = $allMarketData[1];
           $marketData = new \stdClass;
           return (float)($secondDay->volume_traded);
           $marketData->nse_asi_change = $secondDay->daily_change;
           $marketData->market_cap_change = floatval($secondDay->market_cap) - floatval($firstDay->market_cap);
          
           return json_encode($marketData);

        } catch (Exception $e) {
            return new \stdClass;
        }
    }


}
