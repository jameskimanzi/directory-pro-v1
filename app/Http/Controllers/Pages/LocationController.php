<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\County;
use App\Subcounty;
use App\Location;
use App\Sublocation;
use Validator;
class LocationController extends Controller
{
    public function sublocations($id){
      $subcounty=Subcounty::find($id);
    	$location=Location::find($id);
    	$sublocations=$location->sublocations()->get();
    	return view('sublocations.index',compact('sublocations','location','subcounty'));

    }
    public function create_sublocations($id){
    	$location=Location::find($id);
    	return view('sublocations.create',compact('sublocation','location'));

    }
    public function store_sublocation(Request $request){
     // dd($request->all());
      Sublocation::create(array_merge($request->all()));
      return redirect()->back()->with('success','Sublocation has been created!');
    }
    
    public function destroy($id){
      $location=Location::find($id);
      return view('subcounties.index',compact('county'));
    }
    public function edit_sublocation($id,$sub_id){
      $location = Location::find($id);
      $sublocation = Sublocation::find($sub_id);
      
    return view('sublocations.edit', compact('sublocation','location'));
    }
    public function update_sublocation(Request $request, $id,$sub_id)
    {
        
        $sublocation = Sublocation::find($sub_id);
        //'code' =>$request->input('code');
        
        $sublocation->sublocation_name = $request->get('sublocation_name');
        // 'county_name' => $request->input('county_name');

            
     
        $sublocation->save();
        return redirect()->back()->with('success','Sublocation has been updated!');
    }
    
}
