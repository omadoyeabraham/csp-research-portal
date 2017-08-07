<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\FixedIncome;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests\storeFixedIncomeRequest;

class FixedIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $fixedincome = FixedIncome::paginate(25);

        return view('fixed-income.index', compact('fixedincome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('fixed-income.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storeFixedIncomeRequest $request)
    {
        
        $requestData = $request->all();
        
      $fixedIncome = new FixedIncome;
       

       try {
           $fixedIncome->createTemplate($requestData);
       } catch (Exception $e) {
           
       }
        //Session::flash('statusSuccess', 'FixedIncome added!');

        return redirect('fixed-income');
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
        $fixedincome = FixedIncome::findOrFail($id);

        return view('fixed-income.show', compact('fixedincome'));
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
        $fixedincome = FixedIncome::findOrFail($id);

        return view('fixed-income.edit', compact('fixedincome'));
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
        
        $fixedincome = FixedIncome::findOrFail($id);
        try {
             $fixedincome->update($requestData);
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('statusDanger', 'Error: Please ensure that all fields (except date) are numeric');
            return redirect()->back()->withInput();
        }
       

        Session::flash('statusSuccess', 'FixedIncome updated!');

        return redirect('fixed-income');
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
        FixedIncome::destroy($id);

        Session::flash('statusSuccess', 'FixedIncome deleted!');

        return redirect('fixed-income');
    }
}
