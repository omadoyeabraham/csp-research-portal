<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MarketSummary;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests\storeMarketSummaryRequest;

class MarketSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $marketsummary = MarketSummary::paginate(25);

        return view('market-summary.index', compact('marketsummary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('market-summary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storeMarketSummaryRequest $request)
    {
        $marketSummary = new MarketSummary;
        $requestData = $marketSummary->populateNew($request);

        $marketSummary->reportStoreFile('Market Summary', $requestData['file']);

        try {
            MarketSummary::create($requestData);
        } catch (\Illuminate\Database\QueryException $e) {
            
             session()->flash('statusDanger', 'A market-summary has already been uploaded for this date. You can either edit that market-summary, or delete it and create a new market-summary for the day in question');
             return redirect('market-summary');
        }
        
        Session::flash('statusSuccess', 'MarketSummary added!');

        return redirect('market-summary');
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
        $marketsummary = MarketSummary::findOrFail($id);

        return view('market-summary.show', compact('marketsummary'));
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
        $marketsummary = MarketSummary::findOrFail($id);

        return view('market-summary.edit', compact('marketsummary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $marketsummary = MarketSummary::findOrFail($id);
        $fileUrl = $marketsummary->file_url;

        $marketsummary->reportDeleteFile("Market Summary", $fileUrl );
        $requestData = $marketsummary->populateNew($request);
        $marketsummary->reportStoreFile('Market Summary', $requestData['file']);

        $marketsummary->update($requestData);

        Session::flash('statusSuccess', 'MarketSummary updated!');

        return redirect('market-summary');
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
        $marketSummary = MarketSummary::findOrFail($id);
        $fileUrl = $marketSummary->file_url;

        $marketSummary->reportDeleteFile("Market Summary", $fileUrl );
        MarketSummary::destroy($id);

        Session::flash('statusSuccess', 'MarketSummary deleted!');

        return redirect('market-summary');
    }
}
