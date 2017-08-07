<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PriceList;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests\storePriceListRequest;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pricelist = PriceList::paginate(25);

        return view('price-list.index', compact('pricelist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('price-list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storePriceListRequest $request)
    {
        $priceList = new PriceList;
        $requestData = $priceList->populateNew($request);

        $priceList->reportStoreFile('Price List', $requestData['file']);

        try {
            PriceList::create($requestData);
        } catch (\Illuminate\Database\QueryException $e) {
            
             session()->flash('statusDanger', 'A pricelist has already been uploaded for this date. You can either edit that pricelist, or delete it and create a new pricelist for the day in question');
             return redirect('price-list');
        }
        
        Session::flash('statusSuccess', 'PriceList added!');

        return redirect('price-list');
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
        $pricelist = PriceList::findOrFail($id);

        return view('price-list.show', compact('pricelist'));
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
        $pricelist = PriceList::findOrFail($id);

        return view('price-list.edit', compact('pricelist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, storePriceListRequest $request)
    {
        
        $requestData = $request->all();
        
        $priceList = PriceList::findOrFail($id);
        $fileUrl = $priceList->file_url;

        $priceList->reportDeleteFile("Price List", $fileUrl );
        $requestData = $priceList->populateNew($request);
        $priceList->reportStoreFile('Price List', $requestData['file']);

        $priceList->update($requestData);
         
        Session::flash('statusSuccess', 'PriceList updated!');

        return redirect('price-list');
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
        $priceList = PriceList::findOrFail($id);
        $fileUrl = $priceList->file_url;

        $priceList->reportDeleteFile("Price List", $fileUrl );
        PriceList::destroy($id);

        Session::flash('statusSuccess', 'PriceList deleted!');

        return redirect('price-list');
    }
}
