<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcounty extends Model
{

   protected $guarded = [];

    public function locations()
  {
    	return $this->hasMany('App\Location');
   }
    public function county()
    {
    	return $this->belongsTo('App\County','county_id');
    }
   
}
