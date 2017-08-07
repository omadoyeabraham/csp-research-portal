<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AfricanGlobalMarket;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests\storeAfricanGlobalMarketRequest;

class AfricanGlobalMarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $africanglobalmarket = AfricanGlobalMarket::paginate(25);

        return view('african-global-market.index', compact('africanglobalmarket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('african-global-market.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storeAfricanGlobalMarketRequest $request)
    {
        
        $requestData = $request->all();
       
       $africanGlobalMarket = new AfricanGlobalMarket;
       try {
             $africanGlobalMarket->createTemplate($requestData);
       } catch (\Exception $e) {
           //dd("caughte");
       }
     

        //Session::flash('statusSuccess', 'AfricanGlobalMarket added!');

        return redirect('african-global-market');
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
        $africanglobalmarket = AfricanGlobalMarket::findOrFail($id);

        return view('african-global-market.show', compact('africanglobalmarket'));
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
        $africanglobalmarket = AfricanGlobalMarket::findOrFail($id);

        return view('african-global-market.edit', compact('africanglobalmarket'));
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
        
        $africanglobalmarket = AfricanGlobalMarket::findOrFail($id);

        try {
             $africanglobalmarket->update($requestData);
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('statusDanger', 'Error: Please ensure that all fields (except date) are numeric');
            return redirect()->back()->withInput();
        }

        Session::flash('statusSuccess', 'AfricanGlobalMarket updated!');
        
        return redirect('african-global-market');
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
        AfricanGlobalMarket::destroy($id);

        Session::flash('statusDanger', 'AfricanGlobalMarket deleted!');

        return redirect('african-global-market');
    }
}
