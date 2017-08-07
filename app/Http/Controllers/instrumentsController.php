<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\instrumentData;
use App\Models\Ticker;
use JavaScript;

class instrumentsController extends Controller
{
	/**
	 * Show the homepage for an instrument
     * 
	 * @param  Request $request 
	 * @return Response
	 */
    public function showHomePage(Request $request)
    {

    	$id = (int)$request->instrument_id;
        
    	$instrumentData = new InstrumentData;
        $ticker = Ticker::findOrFail($id)->ticker;

        $security_id = Ticker::where('ticker' , $ticker)
                        ->first()->security_id;
        $security_id = is_numeric($security_id) ? $security_id : null;
        
    	$companyName = $instrumentData->getCompanyName($id);
    	$newsFeed = $instrumentData->getNewsFeed($id);
    	$companyProfile = $instrumentData->getCompanyProfile($id);
    	$corporateReports = $instrumentData->getCorporateReports($id);
    	$researchReports = $instrumentData->getResearchReports($id);
    	$presentations = $instrumentData->getPresentations($id);
    	$dividendsBonuses = $instrumentData->getdividendsBonuses($id);
        $companyStockData = $instrumentData->getCompanyStockData($id);
        $sevenDayTrades = $instrumentData->getStockLastSevenDayTrades($security_id);


         JavaScript::put([
                'instrumentName' => $ticker,
              ]);

    	return view('pages.instrument-search', [
    		'companyName' => $companyName,
    		'newsFeed' => $newsFeed,
    		'companyProfile' => $companyProfile,
    		'corporateReports' => $corporateReports,
    		'researchReports' => $researchReports,
    		'presentations' => $presentations,
    		'dividendsBonuses' => $dividendsBonuses,
            'companyStockData' => $companyStockData,
            'sevenDayTrades' => $sevenDayTrades,
    	]);
    }

    public function getStockData( $ticker)
    {
        $security_id = Ticker::where('ticker' , $ticker)
                        ->first()->security_id;
        $security_id = is_numeric($security_id) ? $security_id : null;
        
        $instrumentData = new InstrumentData;
        return $instrumentData->getStockData($security_id);
        
    }

    
}
