<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\FullHalfYearReport;
use Illuminate\Http\Request;
use Session;
use App\Models\Ticker;
use App\Http\Requests\storeFullHalfYearRequest;

class FullHalfYearReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $fullhalfyearreport = FullHalfYearReport::paginate(25);

        return view('full-half-year-report.index', compact('fullhalfyearreport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('full-half-year-report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storeFullHalfYearRequest $request)
    {
         $fullHalfYearReport = new FullHalfYearReport;
         $requestData = $fullHalfYearReport->populateNew($request);

        $fullHalfYearReport->reportStoreFile('FullHalfYearReport', $requestData['file']);

        FullHalfYearReport::create($requestData);

        Session::flash('statusSuccess', 'FullHalfYearReport added!');

        return redirect('full-half-year-report');
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
        $fullhalfyearreport = FullHalfYearReport::findOrFail($id);

        return view('full-half-year-report.show', compact('fullhalfyearreport'));
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
        $fullhalfyearreport = FullHalfYearReport::findOrFail($id);

        return view('full-half-year-report.edit', compact('fullhalfyearreport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, storeFullHalfYearRequest $request)
    {
        $requestData = $request->all();

        $fullHalfYearReport = FullHalfYearReport::findOrFail($id);
        $fileUrl = $fullHalfYearReport->file_url;

        $fullHalfYearReport->reportDeleteFile("FullHalfYearReport", $fileUrl );
        
        $requestData = $fullHalfYearReport->populateNew($request);
        $fullHalfYearReport->reportStoreFile('FullHalfYearReport', $requestData['file']);

        $fullHalfYearReport->update($requestData);

        Session::flash('statusSuccess', 'FullHalfYearReport updated!');

        return redirect('full-half-year-report');
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
        $fullHalfYearReport = FullHalfYearReport::findOrFail($id);
         $fileUrl = $fullHalfYearReport->file_url;

        $fullHalfYearReport->reportDeleteFile("FullHalfYearReport", $fileUrl );

        FullHalfYearReport::destroy($id);

        Session::flash('statusSuccess', 'FullHalfYearReport deleted!');

        return redirect('full-half-year-report');
    }
}
