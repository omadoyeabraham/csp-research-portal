<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Exception;
use Redirect;

use Excel;

class Report extends Model
{
	   protected $table = "reports_table";
	   protected $fillable = ['report_file_link',
	   						  'report_date_published',
	   						  'report_type'
	   						 ];

	   /**
	    * Stores a report file in the appropriate folder
	    * @param  String $reportType   [description]
	    * @param  File $fileInstance [description]
	    * @return 
	    */
	   public function reportStoreFile($reportType, $fileInstance)
	   {

	   		$storageDisk = $this->getStorageDisk( $reportType );

	   		try {

	   			Storage::disk($storageDisk)->put( $fileInstance->getClientOriginalName() , file_get_contents($fileInstance->getRealPath() ) );	

	   		} catch (Exception $e) {
	   			
	   			session()->flash('statusDanger','There was an error uploading the file. Please contact your IT Administrator');
		    	return Redirect::back()->withInput();
	   		}
	   }

	   /**
	    * Deletes a file from the server
	    * @param  String $reportType 
	    * @param  String $fileUrl  
	    */
	   public function reportDeleteFile($reportType, $fileUrl)
	   {
	   		$storageDisk = $this->getStorageDisk( $reportType );
	   		
	   		$x = strrpos($fileUrl, '/');
	   		$fileName = substr($fileUrl, $x + 1);
	   		//dd($fileName);
	   		try {

	   			Storage::disk($storageDisk)->delete($fileName);	

	   		} catch (Exception $e) {
	   			
	   			session()->flash('statusDanger','There was an error deleting the file. Please contact your IT Administrator');
		    	 return redirect()->back()->withInput();
	   		}
	   }

	   /**
	    * Assign needed values to the DB and save them.
	    * @param  [type] $request [description]
	    * @return [type]          [description]
	    */
	   public function reportAssignDBValues($request)
	   {
	   		$file_url = $this->reportGetFileURL($request->reportType, $request->reportFile->getClientOriginalName() );
	   		
	   		try {
	   			$this->file_url = $file_url;
	   			$this->file_date = $request->reportDate;
	   			$this->report_name = $request->reportFile->getClientOriginalName();
	   			$this->report_type = $request->reportType;
	   			$this->save();
	   		} catch (\Illuminate\Database\QueryException $e) {
	   			/**
	 			 * When uploading multiple files for the same date, the database is updated with the new fileLink,
	 			 * If both files have the same name, the new file overrides the old file, else the old file is deleted*/
	   			$this->updateExistingReport($file_url);
	   		}
	   }

	   /**
	   	 * Returns the disk name for a particular type of report
	   	 * @param  String $reportType 
	   	 * @return String storage disk name
	   	 */
	   	public function getStorageDisk($reportType)
	   	{
		   		switch ($reportType) {
		   			case 'Price List':
		   				$storageDisk = 'priceList';
		   				break;
		   			case 'Market Summary':
		   				$storageDisk = 'marketSummary';
		   				break;
		   			case 'Corporate Result':
		   				$storageDisk = 'corporateResults';
		   				break;
		   			case 'Excel Template':
		   				$storageDisk = 'excelTemplates';
		   				break;
		   			case 'FullHalfYearReport':
		   				$storageDisk = 'fullHalfYearReport';
		   				break;
		   			case 'Presentation':
		   				$storageDisk = 'presentation';
		   				break;
		   			case 'Research Report':
		   				$storageDisk = 'researchReport';
		   				break;
		   			case 'Master Template':
		   				$storageDisk = 'masterTemplate';
		   				break;
		   			default:
		   				# code...
		   				break;
		   		}

		   		return $storageDisk;
	   	}

	   	/**
	   	 * Get the URL of file to be stored in the database
	   	 * @param  String $reportType 
	   	 * @param  String $fileName  
	   	 * @return [type]             [description]
	   	 */
	   	public function reportGetFileURL($reportType, $fileName)
	   	{
	   		switch ($reportType) {
	   			case 'Price List':
	   					return Storage::url('PriceLists/' . $fileName);
	   				break;
	   			case 'Market Summary':
	   					return Storage::url('MarketSummaries/' . $fileName);
	   				break;
	   			case 'Corporate Result':
	   					return Storage::url('CorporateResults/'. $fileName);
	   				break;
	   			case 'Excel Template':
	   					return Storage::url('ExcelTemplates/'. $fileName);
	   				break;
	   			case 'FullHalfYearReport':
	   					return Storage::url('FullHalfYearReports/'. $fileName);
	   				break;
	   			case 'Presentation':
	   					return Storage::url('Presentations/'. $fileName);
	   				break;
	   			case 'Research Report':
	   					return Storage::url('ResearchReport/'. $fileName);
	   				break;
	   			case 'Master Template':
	   					return Storage::url('MasterTemplate/'. $fileName);
	   				break;

	   			default:
	   					return null;
	   				break;
	   		}
	   	}

	   	/**
	   	 * Returns an array of objects with each object being the sheet data from an uploaded excel file
	   	 * @param  String $fileUrl   The url where the file has been stored
	   	 * @param  [type] $noOfSheets   number of sheets in the excel file
	   	 * @return [type]               [description]
	   	 */
	   	public function reportGetFileData($fileUrl, $noOfSheets)
	   	{
	   		$templateData = [];


	   		for ($i=0; $i < $noOfSheets ; $i++) 
	   		{ 
	   			Excel::selectSheetsByIndex(0)->load($fileUrl, function($reader) use($templateData) {
	   				  $results = $reader->first();

	   				  $x = array_merge( $templateData, $results[0]->toArray() );
	   				return $templateData;
	   		 	});
	   			//dd($templateData);
	   		}
	   		// 
	   	}


}
