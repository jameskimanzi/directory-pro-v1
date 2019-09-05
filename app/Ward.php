<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    
    protected $fillable = [
    	'ward_name',
    	'constituency_id',
    	
    	

    ];

    public function locations()
    {
    	return $this->hasMany('App\Location');
    }
    public function sublocations()
    {
    	return $this->hasMany('App\Sublocations');
    }
    public function constituency()
    {
    	return $this->belongsTo('App\Constituency','constituency_id');
    }
    public function members()
    {
    	return $this->hasMany('App\Member');
    }
}
