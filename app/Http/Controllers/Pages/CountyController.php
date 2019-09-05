<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\County;
use App\Subcounty;
use App\Location;
class CountyController extends Controller
{
    public function sub_counties($id){
    	$county=County::find($id);
    	$sub_counties=$county->subcounties()->get();
    	return view('subcounties.index',compact('sub_counties','county'));

    }
       public function create_sub_counties($id){
    	$county=County::find($id);
      return view('subcounties.create',compact('county'));

    }
    public function store_subcounty(Request $request,$id){
      $county=County::find($id);
      $sub_counties=$county->subcounties()->get();
      Subcounty::create(array_merge($request->all()));
      //return view('subcounties.index',compact('sub_counties','county'));
      return redirect()->back()->with('success','Subcounty has been updated!');

    }
    public function edit_subcounty(Request $request,$id,$subc_id){
    $county=County::find($id);
    $subcounty=Subcounty::find($subc_id);
    return view('subcounties.edit',compact('subcounty','county'));
  }
  public function update_subcounty(Request $request, $id,$subc_id){
    $county=County::find($id);
    $subcounty=Subcounty::find($subc_id);
    $subcounty->subcounty_name = $request->get('subcounty_name');
         // 'county_name' => $request->input('county_name');

             
      
         $subcounty->save();
         return redirect()->back()->with('success','Subcounty has been updated!');

  }
    
    public function destroy($id){
      $county=County::find($id);
      return view('subcounties.index',compact('county'));}
    
}
