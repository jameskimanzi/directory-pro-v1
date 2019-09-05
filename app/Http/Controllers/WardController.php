<?php

namespace App\Http\Controllers;
use App\Ward;
use App\Constituency;
use Illuminate\Http\Request;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $wards= Ward::all();
        $constituencies= Constituency::all();
        return view('wards.index', compact('wards', 'constituencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $constituencies=Constituency::all();
        return view('wards.create',compact('constituencies'));
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
    // Subcounty::create(array_merge($request->all()));

    $ward=new Ward();
    $ward->constituency_id=$request->constituency_id;
    $ward->ward_name=$request->ward_name;
    $ward->save();


     // $subcounties = Subcounty::create([
     //    'constituency' => $request->input('subcounty_name'),
     //    'subcounty_name' => $request->input('subcounty_name'),

           
     //   ]);
       //$counties->save();
       return redirect('wards')->with('success', 'Ward  created Successfully!');
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
        $constituency = Constituency::find($id);
        $ward = Ward::find($id);
        //$ls = Location::all();
      return view('wards.edit', compact('ward','constituencies'));
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
        
        $ward = Ward::find($id);
        //'code' =>$request->input('code');
        
        $ward->ward_name = $request->get('ward_name');
        // 'county_name' => $request->input('county_name');

            
     
        $ward->save();
        return redirect('wards')->with('success', 'Ward updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wards= Ward::find($id);
        $wards->delete();

        return redirect()->back()->with('success','Ward has been deleted!');
    }
}
