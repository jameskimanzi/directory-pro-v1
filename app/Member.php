<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded=[];

    public function group()
    {
    	return $this->belongsTo('App\Group');
    }
    public function administrations()
    {
    	return $this->belongsTo('App\Administration');
    }
    public function county()
    {
    	return $this->belongsTo('App\County','county_id');
    }
    public function subcounty()
    {
    	return $this->belongsTo('App\Subcounty','subcounty_id');
    }
    public function location()
    {
    	return $this->belongsTo('App\Location','location_id');
    } public function sublocation()
    {
        return $this->belongsTo('App\Sublocation','sublocation_id');
    }
    public function ward()
    {
    	return $this->belongsTo('App\Ward','ward_id');
    }
    public function constituency()
    {
    	return $this->belongsTo('App\Constituency','constituency_id');
    }
}
