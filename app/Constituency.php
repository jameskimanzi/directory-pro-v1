<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $fillable = [
        'constituency_name',
        'county_id',
    	
    	
    	

    ];

   
    public function wards()
    {
    	return $this->hasMany('App\Ward');
    }
    public function locations()
    {
    	return $this->hasMany('App\Location');
    }
    public function county()
    {
    	return $this->belongsTo('App\County','county_id');
    }
    public function members()
    {
    	return $this->hasMany('App\Member');
    }
    
}
