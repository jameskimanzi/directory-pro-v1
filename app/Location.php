<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    
  
protected $guarded = [];


    public function sublocations()
    {
    	return $this->hasMany('App\Sublocation');
    }
    public function county()
    {
    	return $this->belongsTo('App\County','county_id');
    }
    public function subcounty()
    {
    return $this->belongsTo('App\Subcounty','subcounty_id');
   }
    public function members()
    {
    	return $this->hasMany('App\Member');
    }
    public function groups()
    {
    	return $this->hasMany('App\Group');
    }
    public function ward()
    {
    	return $this->belongsTo('App\Ward');
    }
}
