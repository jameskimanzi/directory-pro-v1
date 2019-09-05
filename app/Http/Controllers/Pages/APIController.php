<?php

namespace App\Http\Controllers\Pages;

use App\County;
use App\Constituency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    /**
     * @param County $county
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getConstituencies(County $county)
    {
        $counstituencis = $county->constituencies()->get();
        return $counstituencis;

    }
    /**
     * @param Constituency $constituency
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getWards(Constituency $constituency)
    {
        $wards = $constituency->wards()->get();
        return $wards;

    }
    public function getLocations(Ward $ward)
    {
        $locations = $wards->locations()->get();
        return $locations;

    }
}
