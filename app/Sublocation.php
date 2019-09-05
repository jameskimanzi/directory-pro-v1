<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sublocation extends Model
{
     
    //protected $guarded = [];
    protected $fillable = [
        'sublocation_name',
        'location_id',
    ];


public function location()
{
    return $this->belongsTo('App\Location','location_id');
}
 public function members()
    {
    	return $this->hasMany('App\Member');
    }

}
