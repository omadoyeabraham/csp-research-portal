<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception; 


// use App\AfricanGlobalMarket;
// use App\CompanyProfile;
// use App\CorporateResult;
// use App\DividendBonus;
// use App\FixedIncome;
// use App\FullHalfYearReport;
// use App\MarketSummary;
// use App\Presentation;
// use App\PriceList;
// use App\ResearchReport;
// use App\NseAsi;


class portalData extends Model
{

  private $cspApi = "http://api.cardinalstone.com/";
  private $zanibalMDS = 'http://mds.zanibal.com/mds/rest/api/v1/research/get-security-overview/symbol?x=NSE&s=';
  

	/**
	 * Returns the corporate results to be used on the homepage.
	 * @return [type] [description]
	 */
    public function getCorporateResults()
    {
      try {
          return  CorporateResult::where('id' , '>', 0)->orderBy('id', 'desc')->take(7)->get();
      } catch (Exception $e) {
          return new \stdClass();
      }
    	
    }

    /**
     * Returns the african global markets to be used on the homepage
     * @return [type] [description]
     */
    public function getafricanGlobalMarkets()
    {
      try {
            return AfricanGlobalMarket::where('id' , '>', 0)->orderBy('date', 'desc')->take(1)->get()[0];
      } catch (Exception $e) {
             return new \stdClass();
      }
    	 
    }

    /**
     * Return the treasury bill data to be displayed on the homepage
     * @return [type] [description]
     */
    public function getTreasuryBill()
    {
        try {
            return TreasuryBill::where('id' , '>', 0)->orderBy('date','desc')->take(1)->get()[0];
        } catch (Exception $e) {
             return new \stdClass();
        }
           
    }

    /**
     * Return the benchmark bonds to be displayed on the homepage
     * @return [type] [description]
     */
    public function getBenchMarkBonds()
    {

        try {
              $fiveYearBonds = Bonds::where('benchmark_bond', '=', '5 Year')->orderBy('date', 'desc')->take(2)->get();

              $bond1 = $fiveYearBonds[1];
              $bond2 = $fiveYearBonds[0];

              $closing_yield = $bond2->offer_ytm * 100;
              $opening_yield = $bond1->offer_ytm * 100;
              $change = $closing_yield - $opening_yield;

              $fiveYearBond = new \stdClass();
              $fiveYearBond->closing_yield = $closing_yield;
              $fiveYearBond->opening_yield = $opening_yield;
              $fiveYearBond->change = $change;
            
        } catch (Exception $e) {
         
            $fiveYearBond = new \stdClass();
        }

         try {

              $tenYearBonds = Bonds::where('benchmark_bond', '=', '10 Year')->orderBy('date', 'desc')->take(2)->get();
              
              $bond1 = $tenYearBonds[1];
              $bond2 = $tenYearBonds[0];

              $closing_yield = $bond2->offer_ytm * 100;
              $opening_yield = $bond1->offer_ytm * 100;
              $change = $closing_yield - $opening_yield;

              $tenYearBond = new \stdClass();
              $tenYearBond->closing_yield = $closing_yield;
              $tenYearBond->opening_yield = $opening_yield;
              $tenYearBond->change = $change;

        } catch (Exception $e) {
            $tenYearBond = new \stdClass();
        }

         try {

              $twentyYearBonds = Bonds::where('benchmark_bond', '=', '20 Year')->orderBy('date', 'desc')->take(2)->get();
              
              $bond1 = $twentyYearBonds[1];
              $bond2 = $twentyYearBonds[0];

              $closing_yield = $bond2->offer_ytm * 100;
              $opening_yield = $bond1->offer_ytm * 100;
              $change = $closing_yield - $opening_yield;

              $twentyYearBond = new \stdClass();
              $twentyYearBond->closing_yield = $closing_yield;
              $twentyYearBond->opening_yield = $opening_yield;
              $twentyYearBond->change = $change;

        } catch (Exception $e) {
            $twentyYearBond = new \stdClass();
        }

       $benchMarkBonds = [$fiveYearBond, $tenYearBond, $twentyYearBond];
       return $benchMarkBonds;

    }

    /**
     * Return the stock gainers and losers data to be used on the homepage
     * @return [type] [description]
     */
    public function getStockGainersLosers()
    {
        try {

            $stockGainersLosers = file_get_contents("https://portal.cardinalstone.com/broker/desktop/public/stockGainerLosers.json");
            $stockGainersLosers = json_decode($stockGainersLosers);

        } catch (\Exception $e) {

            $stockGainersLosers = null;
        }
    	
        return $stockGainersLosers;
    }

    /**
     * Returns the exchange rate data to be used on the homepage
     * @return [type] [description]
     */
    public function getExchangeRate()
    {  
        try {
             return ExchangeRate::where('id' , '>', 0)->orderBy('date','desc')->take(1)->get()[0];
        } catch (Exception $e) {
            return new \stdClass;
        }
       
    }

    /**
     * Used by task scheduler to update google news feed 
     * @return [type] [description]
     */
    public function updateGoogleNewsFeed()
    {
         try {
                    $news = simplexml_load_file('http://news.google.com/news?pz=1&cf=all&ned=en_ng&hl=en&topic=b&output=rss');
                    $c = 0; $limit = 5; $newsResult = [];  $i = 1;
                    foreach ($news->channel->item as $item)
                     {
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

                } catch (\Exception $e) {
                     $newsResult = null;
                }

                if( !is_null($newsResult) )
                {
                    $fileLocation = base_path('resources/data-files/google-news-feed.txt');
                    $newsFile = fopen($fileLocation, "w+");
                    fwrite($newsFile, serialize($newsResult) );
                    fclose($newsFile);
                }
    }

    /**
     * Returns the newsFeed to be displayed on the homepage.
     * 
     * @return [type] [description]
     */
    public function getNewsFeed()
    {
       // $fileLocation = base_path('resources/data-files/google-news-feed.txt');
       // $newsResult = file_get_contents( $fileLocation );
       // $newsResult = unserialize($newsResult);
       // return $newsResult;     
         $news = simplexml_load_file('http://news.google.com/news?pz=1&cf=all&ned=en_ng&hl=en&topic=b&output=rss');

        $c = 0;
        $limit = 7;
        // echo $limit; die();
        $result = array();
        $i = 1;
        foreach ($news->channel->item as $item) {
            if ($c < $limit) {
                $r = array(
                    'link' => strip_tags($item->link),
                    'title' => strip_tags($item->title),
                    'id' => $i++
                );
                array_push($result, $r);
            }
            $c +=1;
        }
        return  $result;
    }

    /**
     * Returns the NseAsi data used to plot the graph on the homepage
     * @return [type] [description]
     */
    public function getNseAsiData()
    {
      // try {
          
      //      //$nseAsi = file_get_contents("https://portal.cardinalstone.com/broker/desktop/public/highlights.json");
      //     $nseAsi = file_get_contents($this->cspApi . 'highlights');
      //     $nseAsi = json_decode($nseAsi);

      //      foreach ($nseAsi as $data) {
      //         $data->market_index = (float) str_replace("," , "",  $data->market_index);
      //     }

      // } catch (\Exception $e) {
      //     $nseAsi = null;
      // }
  	   //   //dd($nseAsi);
      //     return $nseAsi;

      try {

            $nseAsi = file_get_contents($this->cardinalStoneApi . "nse-five-day-data");
            $nseAsi = json_decode($nseAsi);

             foreach ($nseAsi as $data) {
                $data->market_index = (float) str_replace("," , "",  $data->market_index);
            }


        } catch (\Exception $e) {
          
            $nseAsi = null;
        }

        return $nseAsi;

    }

    /**
     * Returns the stock highlights to be used for the webticker
     * @return JSON $stockHighlights
     */
    public static function getWebTickers()
    {
        
        $url = "https://portal.cardinalstone.com/broker/stest_cors/public/api/symbols?source=rp";

          function getFormattedWebTicker( $webTicker )
          {
            $formattedWebTicker = new \stdClass();

            $priceChange = floatval( $webTicker->priceGainPercent );

            $formattedWebTicker->symbol = $webTicker->name;
            $formattedWebTicker->percentageChange = $webTicker->priceGainPercent;
            $formattedWebTicker->percentageChange = number_format( abs($priceChange), 2 );
            $formattedWebTicker->closePrice = $webTicker->closingPrice;

            if( $priceChange < 0 ){
              $formattedWebTicker->percentageChangeStatus = "text-danger-custom";
              $formattedWebTicker->percentageChangeImage = "glyphicon-arrow-down";
            }
            if( $priceChange == 0 ){
              $formattedWebTicker->percentageChangeStatus = "text-primary";
              $formattedWebTicker->percentageChangeImage = "glyphicon-minus";
            }
            if( $priceChange > 0 ){
              $formattedWebTicker->percentageChangeStatus = "text-success-custom";
              $formattedWebTicker->percentageChangeImage = "glyphicon-arrow-up";
            }

            return $formattedWebTicker;
          }


          try {
              $ch = curl_init();

              if (FALSE === $ch)
                  throw new Exception('failed to initialize');

              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
             
              $symbols = curl_exec($ch);

              if (FALSE === $symbols)
                  throw new Exception(curl_error($ch), curl_errno($ch));

          } catch(Exception $e) {

              trigger_error(sprintf(
                  'Curl failed with error #%d: %s',
                  $e->getCode(), $e->getMessage()),
                  E_USER_ERROR);

          }
          $webTickers = json_decode($symbols);
          $formattedWebTickers = [];

          foreach ($webTickers->symbols as $webTicker) {
            array_push( $formattedWebTickers, getFormattedWebTicker($webTicker)  );
          }

          return $formattedWebTickers;

    }

    /**
     * Returns the data used to plot the large NSE ASI graph on the homepage
     * @return Array 
     */
    public function getNseAsiHistoricalData()
    {
        $nseAsiData = NseAsi::all()->toArray();
        $values = [];
        foreach ($nseAsiData as $data) {

            //Since nse_asi is stored as a string in the DB, this converts it into a number
            $nse_asi = intval( str_replace("," , "", $data['nse_asi']) );
        
            array_push($values, [ strtotime($data['date'])*1000,  $nse_asi  ]);
        }
        return $values;
    }


}
