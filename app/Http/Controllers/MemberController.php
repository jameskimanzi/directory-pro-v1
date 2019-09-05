<?php

namespace App\Http\Controllers;

use App\Member;
use App\Group;
use App\County;
use App\Constituency;
use App\Ward;
use App\Location;
use App\Sublocation;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members= Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        $counties = \App\County::all();
        $constituencies = \App\Constituency::all();
        $locations = \App\Location::all();
        $subcounties = \App\Subcounty::all();
       
        $wards = \App\Ward::all();
       // dd($groups);
        return view('members.create', compact('groups','counties','constituencies','locations','wards'));
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
                'fname' => 'required',
                'sname' => 'required',
                // 'other_name' => 'required',
                //'phone' => 'required',
                'phone' => 'unique:members',
                'email' => 'unique:members',
                'gender' => 'required',
                'marital_status' => 'required',
                'bs_nature' => 'required',
                'bs_permit' => 'required',
                'chief_name' => 'required',
                'chief_phone' => 'required',
            ]);
            try{
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
         Member::create(array_merge($request->all()));
        return redirect('/members')->with('success', 'Member registerd Successfully!');
    } 
catch (\Exception $e){ 
    return redirect()->back()->with('error', 'Phone number already exists,please try again!');}}


    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        $groups = Group::all();
       $counties = \App\County::all();
        $constituencies = Constituency::all();
        $wards = Ward::all();
        $locations = Location::all();
        $sublocations = Sublocation::all();

        return view('members.edit', compact('member', 'groups','counties', 'constituencies', 'wards' ,'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        
        $member = Member::find($id);
        $member->fname = $request->get('fname');
        $member->sname = $request->get('sname');
        $member->other_name = $request->get('other_name');
        $member->phone = $request->get('phone');
        $member->gender = $request->get('gender');
        $member->bs_nature = $request->get('bs_nature');
        $member->bs_permit = $request->get('bs_permit');
        $member->constituency_id = $request->get('constituency_id');
        $member->location_id=$request->get('location_id');
       // $member->sublocation_id = $request->get('sublocation_id');
        $member->chief_name = $request->get('chief_name');
        $member->chief_phone = $request->get('chief_phone');
        $member->group_id = $request->get('group_id');
        $member->save();

        return redirect('members')->with('success', 'Member updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect('members')->with('success', 'Member has been deleted Successfully');
    }
}
