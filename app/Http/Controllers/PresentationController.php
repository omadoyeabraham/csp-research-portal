<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Session;

use App\Models\Ticker;
use App\Http\Requests\storePresentationRequest;
use App\Http\Requests\updatePresentationRequest;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $presentation = Presentation::paginate(25);

        return view('presentation.index', compact('presentation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('presentation.create',[
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
    public function store(storePresentationRequest $request)
    {
        $presentation = new Presentation;
        $requestData = $presentation->populateNew($request);
        
        if(isset($requestData['file']))
        {
            $presentation->reportStoreFile('Presentation', $requestData['file']);
        }

        Presentation::create($requestData);

        Session::flash('statusSuccess', 'Presentation added!');

        return redirect('presentation');
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
        $presentation = Presentation::findOrFail($id);

        return view('presentation.show', compact('presentation'));
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
        $presentation = Presentation::findOrFail($id);
       
        $oldFileName = substr(strrchr($presentation->file_url, "/"), 1);

        return view('presentation.edit', [
            'tickers' => Ticker::all(), 
            'presentation' => $presentation,
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
    public function update($id, updatePresentationRequest $request)
    {
        $requestData = $request->all();
        
        $presentation = Presentation::findOrFail($id);
        $fileUrl = $presentation->file_url;

        //If the Admin uploads a new file, delete the old file and update the record to reflect the new upload
        if($request->exists('file'))
        {
            $presentation->reportDeleteFile("Presentation", $fileUrl );
            $requestData = $presentation->populateNew($request);
            $presentation->reportStoreFile('Presentation', $requestData['file']);

        }else{
            $requestData = $presentation->populateFromEdit($request, $fileUrl);
        }

        $presentation->update($requestData);

        Session::flash('statusSuccess', 'Presentation updated!');

        return redirect('presentation');
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
        $presentation = Presentation::findOrFail($id);
        $fileUrl = $presentation->file_url;

        $presentation->reportDeleteFile("Presentation", $fileUrl );
        Presentation::destroy($id);

        Session::flash('statusSuccess', 'Presentation deleted!');

        return redirect('presentation');
    }
}
