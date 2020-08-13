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
        'house_number',
        'street',
        'city',
        'postal_code',
        'loc_lat',
        'loc_long',
        'vet_offer_id',
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

    public function vetOffers()
    {
        return $this->hasMany('App\Model\VetOffer');
    }

    public function vetOfferAccepted()
    {
        return $this->belongsTo('App\Model\VetOffer','vet_offer_id');
    }
}
