<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    protected $fillable = [
    	'county',
    	'constituency',
    	'ward',
    	'location',
    	'gender',
    	'chief_name',
    	'chief_phone'
    ];
	public function members()
    {
    	return $this->hasMany('App\Member');
    }


}
