<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'star_rating',
        'vet_id',
        'driver_id',
        'client_id',
        'service_type',
    ];

    public function vetOffer()
    {   
        return $this->hasOne('App\Model\VetOffer','vet_offer_id');
    }

    public function driverOffer()
    {   
        return $this->hasOne('App\Model\DriverOffer','driver_offer_id');
    }

    public function veterinarian()
    {
        return $this->belongsTo('App\User','vet_id');
    }

    public function driver()
    {
        return $this->belongsTo('App\User','driver_id');
    }

    public function client()
    {
        return $this->belongsTo('App\User','clien_id');
    }
}
