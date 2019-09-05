<?php

namespace App\Http\Controllers;

use App\Administration;
use Illuminate\Http\Request;
use Validator;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $administrations= Administration::all();
        return view('administrations.index', compact('administrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                
                'county' => 'required',
                'county' => 'required',
                'constituency' => 'required',
                'ward' => 'required',
                'location' => 'required',
                'chief_name' => 'required',
                'chief_phone' => 'required',
                
            ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $administration = Administration::create([
            'county' => $request->input('county'),
            'constituency' => $request->input('constituency'),
            
            'ward' => $request->input('ward'),
            'location' => $request->input('location'),
            'chief_name' => $request->input('chief_name'),
            'chief_phone' => $request->input('chief_phone'),
           
        ]);
        $administration->save();
        return redirect('administrations')->with('success', 'Structure created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administration = Administration::find($id);
        return view('administrations.show', compact('administration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $administration = Administration::find($id);

        return view('administrations.edit', compact('administration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'county' => 'required',
            'constituency' => 'required',
            'ward' => 'required',
            'location' => 'required',
            'chief_name' => 'required',
            'chief_phone' => 'required',
        ]);
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    $administration = Administration::find($id);
    $administration->county = $request->get('county');
    $administration->constituency = $request->get('constituency');
    $administration->ward = $request->get('ward');
    $administration->location = $request->get('location');
    $administration->chief_name = $request->get('chief_name');
    $administration->chief_phone = $request->get('chief_phone');
    $administration->save();

    return redirect('administrations')->with('success', 'Administration updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $administration = Administration::find($id);
      $administration->delete();

        return redirect('administrations')->with('success', 'Adminstration has been deleted Successfully');
    }
}
