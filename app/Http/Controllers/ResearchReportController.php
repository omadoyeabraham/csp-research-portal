<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ResearchReport;
use Illuminate\Http\Request;
use Session;

use App\Models\Ticker;
use App\Http\Requests\storeResearchReportRequest;
use App\Http\Requests\updateResearchReportRequest;

class ResearchReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $researchreport = ResearchReport::paginate(25);

        return view('research-report.index', compact('researchreport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('research-report.create',[
            'tickers' => Ticker::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storeResearchReportRequest $request)
    {
         $researchReport = new ResearchReport;
        $requestData = $researchReport->populateNew($request);   
        
        if (isset($requestData['file']))
        {
            $researchReport->reportStoreFile('Research Report', $requestData['file']);
        }
        
        ResearchReport::create($requestData);

        Session::flash('statusSuccess', 'ResearchReport added!');

        return redirect('research-report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $researchreport = ResearchReport::findOrFail($id);

        return view('research-report.show', compact('researchreport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $researchreport = ResearchReport::findOrFail($id);
        $oldFileName = substr(strrchr($researchreport->file_url, "/"), 1);

        $reportTypes = [
                            'Company Update',
                            'Sector Report',
                            'Economic Update',
                       ];
        return view('research-report.edit', [
            'tickers' => Ticker::all(),
            'researchreport' => $researchreport,
            'reportTypes' => $reportTypes,
            'oldFileName' => $oldFileName,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, updateResearchReportRequest $request)
    {
        
        $requestData = $request->all();
        
        $researchreport = ResearchReport::findOrFail($id);
        $fileUrl = $researchreport->file_url;

        //Check to ensure that Admin users are not forced to reupload a file when editing an entry
        if($request->exists('file'))
        {
              $researchreport->reportDeleteFile("Research Report", $fileUrl );
              $requestData = $researchreport->populateNew($request);
              $researchreport->reportStoreFile('Research Report', $requestData['file']);
        }else{
                $requestData = $researchreport->populateFromEdit($request, $fileUrl);
        }
        

        $researchreport->update($requestData);

        Session::flash('statusSuccess', 'Research Report updated!');

        return redirect('research-report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $researchreport = ResearchReport::findOrFail($id);
        $fileUrl = $researchreport->file_url;

         $researchreport->reportDeleteFile("Research Report", $fileUrl );
        ResearchReport::destroy($id);

        Session::flash('statusSuccess', 'ResearchReport deleted!');

        return redirect('research-report');
    }
}
