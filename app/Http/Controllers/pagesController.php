<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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

class pagesController extends Controller
{
        
        /**
         * Returning the homepage
         */
        public function showHomePage()
        {
            $portalData = new portalData;
            
                $reports = ResearchReport::all();
                $corporateResults = $portalData->getCorporateResults();
                $africanGlobalMarkets = $portalData->getAfricanGlobalMarkets();
                $treasuryBill = $portalData->getTreasuryBill();
                $benchMarkBonds = $portalData->getBenchMarkBonds();
                $stockGainersLosers = $portalData->getStockGainersLosers();
                $exchangeRate = $portalData->getExchangeRate();
                $newsFeed = $portalData->getNewsFeed();
                $nseAsi = $portalData->getNseAsiData();
                $webTickers = $portalData->getWebTickers();

                //dd($stockGainersLosers);
                //Used to only select the latest bonds under watch & to avoid duplication
                $bonds = [];
                $maxBondId = DB::table('bonds_table')->max('bond_id');
                for($i = 1; $i <= $maxBondId; $i++){
                     $bond = DB::table('bonds_table')->where('bond_id', '=', $i)->orderBy('id' , 'desc')->take(1)->get()[0];
                     array_push($bonds, $bond);
                }
                
              JavaScript::put([
                'nseAsi' => $nseAsi,
                'baseUrl' => url("/"),
              ]);

        	return view('pages.homePage2',[
                'corporateResults' => $corporateResults,
                'africanGlobalMarkets' => $africanGlobalMarkets,
                'treasuryBill' => $treasuryBill,
                'benchMarkBonds' => $benchMarkBonds,
                'stockGainersLosers' => $stockGainersLosers ,
                'exchangeRate' => $exchangeRate,
                'news' =>  $newsFeed,
                'tickers' => Ticker::all(),
                'webTickers' => $webTickers,
                'bonds' => $bonds,
            ]);
        }

        /**
         * Returning the reports page
         */
        public function showReportsPage(Request $request)
        {

            //Try to determine if a button for filtering was clicked, else use an empty string to filter i.e don't filter
            try {
                  $filterParameter = $request->all()['filterParameter'];
            } catch ( \ErrorException $e) {
                $filterParameter = "";
            }
                
             JavaScript::put([
                'reportsTableFilter' =>  $filterParameter,
              ]);
            
             $allReports = new AllReports;
             $allReports = $allReports->getAllReports();
            
        	return view('pages.reportsPage', [
                'allReports' => $allReports,
            ]);
        }
        
          public function showTestPage()
        {
            return view('pages.test');
        }

        /**
         * Returns the corporate results page (Angular mini app)
         * @return View    pages.corporateResults
         */
        public function showCorporateResultsPage()
        {
            return view('pages.corporateResults');
        }

        public function showLoginPage()
        {
            return view('pages.login2');
        }

        public function showRegisterPage()
        {
            return view('pages.register2');
        }

        public function showMarketDataPage()
        {
            return view('pages.marketData');
        }

        public function showPriceListPage()
        {
           /*JavaScript::put([
                'rootUrl' => url(''),
           ]);*/
            $priceLists = PriceList::all();
            return view('pages.priceList', compact('priceLists'));
        }

        public function showMarketSummaryPage()
        {
            $marketSummaries = MarketSummary::all();
            return view('pages.marketSummary', [
                'marketSummaries' => $marketSummaries
            ]);
        }

        public function showAdminUploadsPage()
        {
            return view('pages.adminPages.uploadsPage');
        }

        public function showCorporateResultsUploadPage()
        {
            return view('pages.adminPages.corporateResultsUploadPage');
        }

        public function showAdminHomePage()
        {
            $portalData = new portalData;
           
            return view('pages.adminPages.homepage',[
                
            ]);
        }

       

        public function getWebTickers()
        {
            $portalData = new portalData;
             $stockHighlights =  $portalData->getWebTickers();
             return $stockHighlights;
        }

        public function getNseAsiData()
        {
            $portalData = new portalData;
            $nseAsiData = $portalData->getNseAsiData();
            
            return $nseAsiData;
        }

        /**
         * Creates and stores a new subscriber to the newsletter
         * @param  Request $request
         * @return View   View to a success page
         */
        public function createNewSubscriber(Request $request)
        {
            $requestData = $request->all();
            $subscriber = new NewsLetterSubscribers;

            if( isset( $requestData['name'])  )
            {
                 $subscriber->name = $requestData['name'];
            }else{
                 $subscriber->name = "N/A";
            }

            $subscriber->email = $requestData['email'];
            $subscriber->save();

            return view('pages.subscription-successful');
        }


        public function showInstrumentSearchPage($id)
        {
            $instrumentsController = new instrumentsController;

            if(Ticker::where('ticker', $id)->first())
            {
                  $ticker_id = Ticker::where('ticker', $id)->first()->id;
              }else{
               return view('pages.stockNotCovered', [
                    'stockName' => $id
                ]);
              }
          
            $request = new Request;
            $request->merge(['instrument_id' => $ticker_id]);

           return $instrumentsController->showHomePage($request);
        }

        /**
         * Used by task scheduler to update the google news feed
         * @return [type] [description]
         */
        public function updateGoogleNewsFeed()
        {
            $portalData = new PortalData;
            $portalData->updateGoogleNewsFeed();
        }

        /**
         * Shows the page that contains the main NSE-ASI graph
         * @return View  pages.nse-asi.blade.php
         */
        public function showNseAsiPage()
        {
            return view('pages.nse-asi');
        }

        /**
         * Returns the data that is used to plot the Large popup NSE ASI graph on the homepage
         */
        public function getNseAsiHistoricalData()
        {
             $portalData = new PortalData;
             return $portalData->getNseAsiHistoricalData();
        }

        /**
         * Shows the details page for a selected bond
         * @param  Request $request [description]
         * @return [type]           [description]
         */
        public function showBondPage(Request $request)
        {
              JavaScript::put([
                'baseUrl' => url("/"),
              ]);
              $requestData = $request->all();

           $bonds = Bonds::where('bond_id', $requestData['bond_id'])->get();
          
           $bondName = $bonds[0]['bond_name'];
           $bondTenor = $bonds[0]['tenor'];
           $bondIssueDate = $bonds[0]['issue_date'];
           $bondMaturityDate = $bonds[0]['maturity_date'];
          
            return view('pages.bondPage', [
                'bonds' => $bonds, 
                'bondName' => $bondName,
                'bondTenor' => $bondTenor,
                'bondIssueDate' => $bondIssueDate, 
                'bondMaturityDate' => $bondMaturityDate,
              ]);
        }
}
