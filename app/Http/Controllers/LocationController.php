<?php

namespace App\Http\Controllers;
use App\County;
use App\Subcounty;
use App\Location;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcounties= Subcounty::all();
        $locations= Location::all();
        return view('locations.index', compact('locations','subcounties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcounties=Subcounty::all();
        return view('locations.create',compact('subcounties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location=new Location();
        $location->subcounty_id=$request->subcounty_id;
        $location->location_name=$request->location_name;
        $location->save();

        return redirect('locations')->with('success', 'Location created Successfully!');
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
        $subcounty = Subcounty::find($id);
        $location = Location::find($id);
        //$ls = Location::all();
      return view('locations.edit', compact('location','subcounty'));
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
       
        $location = Location::find($id);
           //'code' =>$request->input('code');
           
          
           $location->location_name = $request->get('location_name');
           // 'county_name' => $request->input('county_name');

               
        
           $location->save();
           return redirect('locations')->with('success', 'Location updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { $locations = Location::find($id);
        $locations->delete();

        return redirect()->back()->with('success','Location has been deleted!');
    }
}
