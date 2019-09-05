<?php

namespace App\Http\Controllers\Pages;
use App\Constituency;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConstituencyController extends Controller
{
     public function wards($id){
    	$constituency=Constituency::find($id);
    	$wards=$constituency->wards()->get();
    	return view('wards.index',compact('wards','constituency'));

    }
       public function create_wards($id){
    	$constituency=Constituency::find($id);
    	return view('wards.create',compact('constituency'));

    }
    public function store_ward(Request $request,$id){
     Ward::create(array_merge($request->all()));
      return redirect()->back()->with('success','Ward has been created!');
    }
    public function edit_ward($id,$ward_id){
     
      $constituency=Constituency::find($id);
      $ward=Ward::find($ward_id);
       return view('wards.edit', compact('ward','constituency'));
    }
    public function update_ward(Request $request,$id,$ward_id){
     
      $ward = Ward::find($ward_id);
      $ward->ward_name = $request->get('ward_name');
      $ward->save();
      return redirect()->back()->with('success','Ward has been updated!');
    }
    
        
        
}
