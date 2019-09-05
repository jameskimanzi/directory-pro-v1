<?php

namespace App\Http\Controllers;
use App\Location;
use App\Member;
use App\Group;

use Illuminate\Http\Request;
use Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups= Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations=Location::all();
        return view('groups.create', compact('locations'));
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
                'name' => 'required',
                'location_id' => 'required',
                'leader' => 'required',
                'leader_phone' => 'required',
                'members' => 'required',
                'agent_name' => 'required',
                'agent_no' => 'required',
            ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $code="GP-".rand(1000,8000);
       // $code=rand(1000,8000);
        $group = Group::create([
            'name' => $request->input('name'),
            'location_id' => $request->input('location_id'),
            'code' => $code,
            'leader' => $request->input('leader'),
            'leader_phone' => $request->input('leader_phone'),
            'members' => $request->input('members'),
            'agent_name' => $request->input('agent_name'),
            'agent_no' => $request->input('agent_no'),
        ]);
        $group->save();
        return redirect('groups')->with('success', 'Group created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
         return view('groups.show', compact('group','locations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
          $locations = Location::all();
        return view('groups.edit', compact('group','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                //'code' => 'required',
                'leader' => 'required',
                'leader_phone' => 'required',
                'members' => 'required',
                'agent_name' => 'required',
                'agent_no' => 'required',
            ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $group = Group::find($id);
       // $group->code = $request->get('code');
        $group->name = $request->get('name');
        $group->location_id = $request->get('location_id');
        $group->leader = $request->get('leader');
        $group->leader = $request->get('leader_phone');
        $group->members = $request->get('members');
        $group->agent_name = $request->get('agent_name');
        $group->agent_no = $request->get('agent_no');
        $group->location_id = $request->get('location_id');
        $group->save();

        return redirect('groups')->with('success', 'Group updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return redirect('groups')->with('success', 'Group has been deleted Successfully');
    }
}
