<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

use App\Models\CorporateResult;
use App\Models\Ticker;
use App\Http\Requests\storeCorporateResultRequest;

class CorporateResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $corporateresult = CorporateResult::paginate(25);

        return view('corporate-result.index', compact('corporateresult'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('corporate-result.create', [
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
    public function store(storeCorporateResultRequest $request)
    {
        $corporateResult = new CorporateResult;
        $requestData = $corporateResult->populateNew($request);

        $corporateResult->reportStoreFile('Corporate Result', $requestData['file']);
     
        CorporateResult::create($requestData); 

        Session::flash('statusSuccess', 'CorporateResult added!');

        return redirect('corporate-result');
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
        $corporateresult = CorporateResult::findOrFail($id);

        return view('corporate-result.show', compact('corporateresult'));
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
        $corporateresult = CorporateResult::findOrFail($id);

        return view('corporate-result.edit', [
            'tickers' => Ticker::all(), 
            'corporateresult' => $corporateresult,
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
    public function update($id, storeCorporateResultRequest $request)
    {
        
        $requestData = $request->all();
        
        $corporateresult = CorporateResult::findOrFail($id);

        $fileUrl = $corporateresult->file_url;

        $corporateresult->reportDeleteFile("Corporate Result", $fileUrl );

        $requestData = $corporateresult->populateNew($request);
        $corporateresult->reportStoreFile('Corporate Result', $requestData['file']);

        $corporateresult->update($requestData);

        Session::flash('statusSuccess', 'Corporate Result updated!');

        return redirect('corporate-result');
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
        $corporateResult = CorporateResult::findOrFail($id);
        $fileUrl = $corporateResult->file_url;

        $corporateResult->reportDeleteFile("Corporate Result", $fileUrl );
        CorporateResult::destroy($id);


        Session::flash('statusSuccess', 'CorporateResult deleted!');

        return redirect('corporate-result');
    }
}
