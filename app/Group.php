<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
    	'name',
    	'code',
    	'leader',
    	'leader_phone',
    	'members',
    	'agent_name',
    	'agent_no',
    	'location_id',
    ];

    public function members()
    {
    	return $this->hasMany('App\Member');
    }
    public function location()
    {
    	return $this->belongsTo('App\Location', 'location_id');
    }
}
