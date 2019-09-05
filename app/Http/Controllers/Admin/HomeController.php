<?php

namespace App\Http\Controllers\Admin;
use App\Group;
use App\Member;
use App\User;

class HomeController
{
    public function index()
    {
    	$groups=Group::all();
    	$members=Member::all();
    	$users=User::all();
        return view('home', compact('groups', 'members', 'users'));
    }
}
