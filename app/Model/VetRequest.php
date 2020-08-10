<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VetRequest extends Model
{
    protected $fillable = [
        'type',
        'animal_id',
        'size_id',
        'description',
    ]; 

    public function client()
    {
        return $this->belongs('App\User');
    }

    public function animal()
    {
        return $this->belongsTo('App\Model\Animal');
    }

    public function size()
    {
        return $this->belongsTo('App\Model\Size');
    }

    public function vetOffers()
    {
        return $this->hasMany('App\Model\VetOffer');
    }

    public function vetOfferAccepted()
    {
        return $this->belongsTo('App\Model\VetOffer','vet_offer_id');
    }
}
