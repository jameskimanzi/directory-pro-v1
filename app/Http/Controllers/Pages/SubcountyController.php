<?php

namespace App\Http\Controllers\Pages;
use App\County;
use App\Subcounty;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcountyController extends Controller
{
     public function locations($id){
    	$county=County::find($id);
    	$subcounty=Subcounty::find($id);
    	$locations=$subcounty->locations()->get();
    	return view('locations.index',compact('locations','subcounty','county'));

    }
       public function create_locations($id){
    	$subcounty=Subcounty::find($id);
       return view('locations.create',compact('location','subcounty'));
      

    }
       public function update_location(Request $request, $id,$loc_id){
      $subcounty=Subcounty::find($id);
      $location=Location::find($loc_id);
      $location->location_name = $request->get('location_name');
           // 'county_name' => $request->input('county_name');

               
        
           $location->save();
           return redirect()->back()->with('success','Location has been updated!');

    }
       public function edit_locations($id,$loc_id){
       $subcounty=Subcounty::find($id);
       $location = Location::find($loc_id);
    	return view('locations.edit',compact('subcounty'));

    }
    public function store_location(Request $request,$id){
      $county=County::find($id);
      $subcounty=Subcounty::find($id);
      $locations=$subcounty->locations()->get();
      Location::create(array_merge($request->all()));
     // return view('locations.index',compact('locations','subcounty','county'));
     return redirect()->back()->with('success','Location has been created!');
    }
}
