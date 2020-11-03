<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'star_rating',
        'rated_user_id',
        'rated_by_user_id',
        'service_type',
    ];

    public function vetOffer()
    {   
        return $this->hasOne('App\Model\VetOffer');
    }

    public function driverOffer()
    {   
        return $this->hasOne('App\Model\DriverOffer');
    }

    public function ratedUser()
    {
        return $this->belongsTo('App\User','rated_user_id');
    }

    public function ratedBy()
    {
        return $this->belongsTo('App\User','rated_by_user_id');
    }

}
