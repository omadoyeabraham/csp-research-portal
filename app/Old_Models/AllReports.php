<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CorporateResult;
use App\FullHalfYearReport;
use App\ResearchReport;

class AllReports extends Model
{
	/**
	 * Returns a collection of all the reports types [corporate results, full & half year report, research report].
	 * This collection is sorted by the date updated at field
	 * @return Collection [description]
	 */
    public function getAllReports()
    {
    	 $reports = ResearchReport::all()->toArray();
         $fullHalfYearReports = FullHalfYearReport::all()->toArray();
         $corporateResults = CorporateResult::all()->toArray();

         $allReports = array_merge($reports, $fullHalfYearReports, $corporateResults);
         $allReports = collect( $allReports );
         $allReports = $allReports->sortBy('updated_at')->reverse();
//dd($allReports);
         return $allReports;
    }
}
