<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VetRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'type',
        'animal_id',
        'size_id',
        'description',
        'address_id',
        'vet_offer_id',
        'prefered_date',
        'prefered_time',
        'image_id',
        'vet_time_slot_id',
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

    public function address()
    {
        return $this->belongsTo('App\Model\Address','address_id','id');
    }

    public function vetOffers()
    {
        return $this->hasMany('App\Model\VetOffer');
    }

    public function vetOfferAccepted()
    {
        return $this->belongsTo('App\Model\VetOffer','accepted_vet_offer_id');
    }

    public function image()
    {
        return $this->belongsTo('App\Model\ImageFile');
    }

    public function vetTimeSlot()
    {
        return $this->belongsTo('App\Model\VetTimeSlot');
    }
}
