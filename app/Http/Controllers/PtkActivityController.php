<?php

namespace App\Http\Controllers;

use App\Models\PtkActivityModel;
use Illuminate\Http\Request;

class PtkActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = PtkActivityModel::all();
        return view('ManagePtkActivity.UserActivityMenu')->with('activities', $activities);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ManagePtkActivity.AddActivity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        PtkActivityModel::create($input);
        return redirect('PtkActivity')->with('flash_message', 'Activity Added!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = PtkActivityModel::find($id);
        return view('ManagePtkActivity.ViewActivity')->with('activities', $activity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = PtkActivityModel::find($id);
        
        return view('ManagePtkActivity.EditActivity')->with('activities', $activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activity = PtkActivityModel::find($id);
        $input = $request->all();
        $activity->update($input);
    
        return redirect('PtkActivity')->with('flash_message', 'activity Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PtkActivityModel::destroy($id);
        return redirect('PtkActivity')->with('flash_message', 'activity deleted!'); 
    }
}


