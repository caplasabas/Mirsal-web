<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'type',
        'animal_id',
        'size_id',
        'description',
        'quantity',
        'driver_offer_id',
        'address_to_id',
        'address_from_id',
        'preferred_date',
        'preferred_time',
        'image_id',
        'image_uri',
    ]; 

    public function client()
    {
        return $this->belongsTo('App\User');
    }

    public function animal()
    {
        return $this->belongsTo('App\Model\Animal');
    }

    public function size()
    {
        return $this->belongsTo('App\Model\Size');
    }

    public function driverOffers()
    {
        return $this->hasMany('App\Model\DriverOffer');
    }

    public function driverOfferAccepted()
    {
        return $this->belongsTo('App\Model\DriverOffer','accepted_driver_offer_id');
    }

    public function addressFrom()
    {
        return $this->belongsTo('App\Model\Address','address_from_id','id');
    }

    public function addressTo()
    {
        return $this->belongsTo('App\Model\Address','address_to_id' ,'id');
    }

    public function image()
    {
        return $this->belongsTo('App\Model\ImageFile');
    }
}
