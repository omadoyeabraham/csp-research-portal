<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Session;

use App\Models\Ticker;
use App\Http\Requests\storeCompanyProfileRequest;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companyprofile = CompanyProfile::paginate(25);

        return view('company-profile.index', compact('companyprofile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company-profile.create',[
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
    public function store( storeCompanyProfileRequest $request)
    {
        $companyProfile = new CompanyProfile;
        $requestData = $companyProfile->populateNew($request);

        
        CompanyProfile::create($requestData);

        Session::flash('statusSuccess', 'CompanyProfile added!');

        return redirect('company-profile');
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
        $companyprofile = CompanyProfile::findOrFail($id);

        return view('company-profile.show', compact('companyprofile'));
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
        $companyprofile = CompanyProfile::findOrFail($id);

        return view('company-profile.edit', [
            'companyprofile' => $companyprofile, 
            'tickers' => Ticker::all()
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
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $companyprofile = CompanyProfile::findOrFail($id);
        $companyprofile->update($requestData);

        Session::flash('statusSuccess', 'CompanyProfile updated!');

        return redirect('company-profile');
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
        CompanyProfile::destroy($id);

        Session::flash('statusSuccess', 'CompanyProfile deleted!');

        return redirect('company-profile');
    }
}
