<?php

namespace App\Http\Controllers;
use App\Subcounty;
use App\County;
use Illuminate\Http\Request;

class SubcountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //    $subcounties= Subcounty::all();
    //     return view('subcounties.index', compact('subcounties'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties=County::all();
        return view('subcounties.create',compact('counties'));
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

        $subcounty=new Subcounty();
        $subcounty->county_id=$request->county_id;
        $subcounty->subcounty_name=$request->subcounty_name;
        $subcounty->save();


         // $subcounties = Subcounty::create([
         //    'county_id' => $request->input('subcounty_name'),
         //    'subcounty_name' => $request->input('subcounty_name'),

               
         //   ]);
           //$counties->save();
           return redirect('subcounties')->with('success', 'SubCounty created Successfully!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcounties = Subcounty::find($id);
        $subcounties->delete();

        return redirect()->back()->with('success','SubCounty has been deleted!');
    }
}
