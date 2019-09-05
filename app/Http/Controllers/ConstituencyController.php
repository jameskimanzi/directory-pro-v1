<?php

namespace App\Http\Controllers;
use App\County;

use App\Constituency;
use Illuminate\Http\Request;

class ConstituencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constituencies= Constituency::all();
        return view('constituencies.index', compact('constituencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties=County::all();
        $constituency=County::all();
        return view('constituencies.create',compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $constituency=new Constituency();
        $constituency->county_id=$request->county_id;
        $constituency->constituency_name=$request->constituency_name;
        $constituency->save();

        return redirect('constituencies')->with('success', 'Constituency created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $counties = County::all();
        $constituency = Constituency::find($id);
      
      return view('constituencies.edit', compact('constituency','counties'));
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
        $constituency = Constituency::find($id);
        //'code' =>$request->input('code');
        //$counties->county_name = $request->get('county_name');
        $constituency->constituency_name = $request->get('constituency_name');
        // 'county_name' => $request->input('county_name');

            
     
        $constituency->save();
        return redirect('constituencies')->with('success', 'Constituency Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  $constituency = Constituency::find($id);
        $constituency->delete();

        return redirect('constituencies')->with('success', 'Constituency has been deleted Successfully');
        //
    }
}
