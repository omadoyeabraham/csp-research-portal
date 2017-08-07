<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InstrumentData extends Model
{

	/**
	 * Returns the comapany name for a given ticker id
	 * @param  INT $id ticker id for the instrument
	 * @return [type]     [description]
	 */
	public function getCompanyName($id)
	{
		$companyName = Ticker::findOrFail($id)->ticker_full_name;
		return $companyName;
	}


	/**
	 * Returns the news feed for a particular instrument
	 * @param  INT $id Ticker id
	 * @return [type]     [description]
	 */
    public function getNewsFeed($id)
    {

        $data = new PortalData;
        $news = $data->getNewsFeed();
        return $news;
    }


    /**
     * Returns the profile information for an instrument
     *  @param  INT $id Ticker id
     * @return [type]     [description]
     */
    public function getCompanyProfile($id)
    {
    	$companyProfile =  CompanyProfile::where('ticker_id', '=', $id)->first();
       
        if($companyProfile)
        {
           $companyProfile = $companyProfile->toArray();
        }
    	//dd($companyProfile);
    	return $companyProfile;
    }

    /**
     * Returns all the corporate Reports for a particular ticker
     * @param  INT $id the ticker_id
     * @return [type]     [description]
     */
    public function getCorporateReports($id)
    {
    	$corporateReports = CorporateResult::where('ticker_id', '=', $id)->get();
    	return $corporateReports;
    }


    /**
     * Returns all the Research Reports for a particular ticker
     * @param  INT $id the ticker_id
     * @return [type]     [description]
     */
    public function getResearchReports($id)
    {
    	$researchReports = ResearchReport::where('ticker_id', '=', $id)->get();
    	return $researchReports;
    }

    /**
     * Returns all the presentations for a particular ticker
     * @param  INT $id the ticker_id
     * @return [type]     [description]
     */
    public function getPresentations($id)
    {
    	$presentations = Presentation::where('ticker_id', '=', $id)->get();
    	return $presentations;
    }

    /**
     * Returns all the dividends/bonuses for a particular ticker
     * @param  INT $id the ticker_id
     * @return [type]     [description]
     */
    public function getDividendsBonuses($id)
    {
    	$dividendsBonuses = DividendBonus::where('ticker_id', '=', $id)->get();
    	return $dividendsBonuses;
    }

    /**
     * Returns the stock data for a particular instrument
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getCompanyStockData($id)
    {

        return 0;

    }

    /**
     * Returns the daily price of a particular stock. It pulls data from the price_list_for_api table in the DB
     *
     * @param $ticker  The ticker of the stock whose data is required
     * @return Array $stockData an array of arrays containing the date and price of the stock
     */
    public function getStockData( $security_id)
    {
       
        $stockData = file_get_contents($this->cardinalStoneApi . "stock-market-data/" . $security_id);
        $stockData = json_decode($stockData);
      
        return $stockData;

    }

    public function getStockLastSevenDayTrades($security_id)
    {
        $stockData = file_get_contents($this->cardinalStoneApi. "get-security-last-seven-days-data/" . $security_id);
        $stockData = json_decode($stockData);

        
        return $stockData;
    }


}
