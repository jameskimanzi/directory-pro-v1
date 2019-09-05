<?php

namespace App\Http\Controllers;

use App\Subcounty;
use App\County;
use App\Location;
use App\Sublocation;
use Illuminate\Http\Request;

class SublocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sublocations= Sublocation::all();
        return view('sublocations.index', compact('sublocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $locations=Location::all();
        return view('sublocations.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
    // sublocation::create(array_merge($request->all()));

        $sublocation=new Sublocation();
        $sublocation->location_id=$request->location_id;
        $sublocation->sublocation_name=$request->sublocation_name;
        $sublocation->save();


         // $subcounties = sublocation::create([
         //    'county_id' => $request->input('subcounty_name'),
         //    'subcounty_name' => $request->input('subcounty_name'),

               
         //   ]);
           //$counties->save();
           return redirect('sublocations')->with('success', 'sublocation created Successfully!');
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
        $location = Location::find($id);
        $sublocation = Sublocation::find($id);
        //$ls = Location::all();
      return view('sublocations.edit', compact('sublocation','location'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sublocation = Sublocation::find($id);
        //'code' =>$request->input('code');
        
       
        $sublocation->sublocation_name = $request->get('sublocation_name');
        // 'county_name' => $request->input('county_name');

            
     
        $sublocation->save();
        return redirect('sublocations')->with('success', 'Sublocation updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sublocations = Sublocation::find($id);
        $sublocations->delete();

        return redirect()->back()->with('success','Sublocation has been deleted!');
    }
}
