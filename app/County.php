<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = [
    	'county_name',
    	'code',

    ];

    public function constituencies()
    {
    	return $this->hasMany('App\Constituency');
    }
    public function subcounties()
    {
        return $this->hasMany('App\Subcounty');
    }
    public function wards()
    {
    	return $this->hasMany('App\Ward');
    }
    public function locations()
    {
    	return $this->hasMany('App\Location');
    }
    public function sublocations()
    {
    	return $this->hasMany('App\Sublocations');
    }
    public function members()
    {
    	return $this->hasMany('App\Member');
    }
    
}

