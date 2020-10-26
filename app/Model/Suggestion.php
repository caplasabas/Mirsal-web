<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'message',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
