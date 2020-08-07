<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interest extends Model
{
	use SoftDeletes;

    public function users()
   	{
    	return $this->belongsToMany('App\User', 'user_interests', 'interest_id', 'user_id');
    }
}
