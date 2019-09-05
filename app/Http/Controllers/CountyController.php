<?php

namespace App\Http\Controllers;
use App\County;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counties= County::all();
       // $rows=DB::table('counties')->get();
       // $subcounties=DB::table('counties')
        //->join('subcounties','subcounties.county_id','counties.id')
        //->select('counties.*','subcounties.subcounty_name as subcounty')
       // ->where('counties.id',1)->get();
        // dd($rows);
        // $subcounties=County::find(1)->subcounties()->get();
       // dd($subcounties);
        return view('counties.index', compact('counties'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('counties.create');
           
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $counties = County::create([
            'code' =>$request->input('code'),
            'county_name' => $request->input('county_name'),

               
           ]);
           $counties->save();
        //    return redirect('counties')->with('success', 'County created Successfully!');
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
        $county = County::find($id);
        //$locations = Location::all();
      return view('counties.edit', compact('county'));
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
        $county = County::find($id);
           //'code' =>$request->input('code');
           $county->code = $request->get('code');
           $county->county_name = $request->get('county_name');
           // 'county_name' => $request->input('county_name');
           $county->save();
           return redirect('counties')->with('success', 'County updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counties = County::find($id);
        $counties->delete();

        return redirect('counties')->with('success', 'County has been deleted Successfully');
    }
}
