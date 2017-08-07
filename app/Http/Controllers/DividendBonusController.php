<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DividendBonus;
use Illuminate\Http\Request;
use Session;

use App\Models\Ticker;
use App\Http\Requests\storeDividendBonusRequest;

class DividendBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dividendbonus = DividendBonus::paginate(25);

        return view('dividend-bonus.index', compact('dividendbonus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dividend-bonus.create',[
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
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $companyName = Ticker::find( $requestData['ticker_id'] )->ticker;

        $requestData['company_name'] = $companyName;
        

        DividendBonus::create($requestData);

        Session::flash('statusSuccess', 'DividendBonus added!');

        return redirect('dividend-bonus');
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
        $dividendbonus = DividendBonus::findOrFail($id);

        return view('dividend-bonus.show', compact('dividendbonus'));
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
        $dividendbonus = DividendBonus::findOrFail($id);

        return view('dividend-bonus.edit', compact('dividendbonus'));
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
        
        $dividendbonus = DividendBonus::findOrFail($id);
        $dividendbonus->update($requestData);

        Session::flash('statusSuccess', 'DividendBonus updated!');

        return redirect('dividend-bonus');
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
        DividendBonus::destroy($id);

        Session::flash('statusSuccess', 'DividendBonus deleted!');

        return redirect('dividend-bonus');
    }
}
