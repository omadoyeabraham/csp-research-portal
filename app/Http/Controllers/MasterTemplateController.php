<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MasterTemplate;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests\storeMasterTemplateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use lluminate\Support\Collection;

use Excel;

class MasterTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $mastertemplate = MasterTemplate::paginate(25);

        return view('master-template.index', compact('mastertemplate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('master-template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storeMasterTemplateRequest $request)
    {

        //Check if the file meets the required template
        //Take file, Load its data into different variables / objects
        // use these variables to populate the DB
        
        $requestData = $request->all();
        $masterTemplate = new MasterTemplate;

        //Ensuring that the file meets the prescribed standard before moving forward
        if (!$masterTemplate->isValidTemplate($requestData['file']) )
        {
            session()->flash('statusDanger', 'The File updated does not conform to the predefined template');
            return redirect()->back()->withInput();
        }

        //Reads data from the excel file and updates the database with the values.
         return $masterTemplate->updateDatabaseValues( $requestData );
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
        $mastertemplate = MasterTemplate::findOrFail($id);

        return view('master-template.show', compact('mastertemplate'));
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
        $mastertemplate = MasterTemplate::findOrFail($id);

        return view('master-template.edit', compact('mastertemplate'));
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
        

if ($request->hasFile('file')) {
    $uploadPath = public_path('/uploads/');

    $extension = $request->file('file')->getClientOriginalExtension();
    $fileName = rand(11111, 99999) . '.' . $extension;

    $request->file('file')->move($uploadPath, $fileName);
    $requestData['file'] = $fileName;
}

        $mastertemplate = MasterTemplate::findOrFail($id);
        $mastertemplate->update($requestData);

        Session::flash('statusSuccess', 'MasterTemplate updated!');

        return redirect('master-template');
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
        MasterTemplate::destroy($id);

        Session::flash('statusSuccess', 'MasterTemplate deleted!');

        return redirect('master-template');
    }
}
