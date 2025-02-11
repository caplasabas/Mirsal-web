<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
	use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\User');
    }
}
