<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\AfricanGlobalMarket;
use App\CompanyProfile;
use App\CorporateResult;
use App\DividendBonus;
use App\FixedIncome;
use App\FullHalfYearReport;
use App\MarketSummary;
use App\Presentation;
use App\PriceList;
use App\ResearchReport;
use App\Ticker;
use App\PortalData;
use App\StockData;

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
    	/*$companyName = $this->getCompanyName($id);
    	//$news = simplexml_load_file('http://news.google.com/news?q='.$companyName.'&cf=all&topic=b&hl=en&pz=1&ned=en_ng&output=rss');
        //dd($news);
    	//$news = simplexml_load_file('https://news.google.com.ng/news/section?q='.$companyName.'cf=all&pz=1&topic=b&siidp=5b6cc03e55be9f185cd80842218a8bcd9703&ict=ln&pog=false&output=rss');
        try {

             $news = simplexml_load_file('https://news.google.com/news/section?cf=all&hl=en&pz=1&ned=en_ng&tbm=nws&gl=ng&as_q='.$companyName .'&as_occt=any&as_qdr=a&authuser=0&output=rss');
            $c = 0; $limit = 10; $newsResult = [];  $i = 1;
            foreach ($news->channel->item as $item) {
                if ($c < $limit) {
                    $r = array(
                        'link' => strip_tags($item->link),
                        'title' => strip_tags($item->title),
                        'id' => $i++
                    );
                    array_push( $newsResult, $r);
                }
                $c +=1;
            }

        } catch (\ErrorException $e) {
            $newsResult = null;
        }
       

            return $newsResult;*/
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
        //$companyTicker = Ticker::findOrFail($id)->ticker;
return 0;
        //$url = "https://portal.cardinalstone.com/broker/stest_cors/public/api/symbols?source=rp";
        //$content = file_get_contents($url);
        //dd($content);
        //dd( file_get_contents('http://intranet.cardinalstone.com/intranet/api_price_highlights.php')   );
        //dd($json);
    }

    /**
     * Returns the daily price of a particular stock. It pulls data from the price_list_for_api table in the DB
     * @param $ticker  The ticker of the stock whose data is required
     * @return Array $stockData an array of arrays containing the date and price of the stock
     */
    public function getStockData($ticker)
    {
        $stockData = StockData::where('ticker',$ticker)->get()->toArray();
        $values = [];
        foreach ($stockData as $data) {
            array_push($values, [ strtotime($data['date'])*1000, $data['close']  ]);
        }
        return $values;

    }

    public function getStockLastSevenDayTrades($ticker)
    {
        $stockData = StockData::where('ticker',$ticker)->orderBy('id', 'desc')->take(7)->get();
        return $stockData;
    }


}
