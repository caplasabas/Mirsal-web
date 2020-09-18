<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'seller_id',
        'address_id',
        'status',
        'type',
        'is_vipe',
        'description',
        'duration_id',
        'price',
        'image_id',
        'contact_phone',
        'contact_email',
        'iban',
        'accepted_client_offer_id',
        'image_id',
        'quantity',
    ];  

    public function seller()
    {
        return $this->belongsTo('App\User','seller_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Model\Address', 'address_id');
    }

    public function duration()
    {
        return $this->belongsTo('App\Model\Duration');
    }

    public function imageFile()
    {
        return $this->belongsTo('App\Model\ImageFile');
    }

    public function clientOffers()
    {
        return $this->hasMany('App\Model\ClientOffer');
    }

    // public function acceptedClientOffer()
    // {
    //     return $this->belongsTo('App\Model\ClientOffer', 'accepted_client_offer_id');
    // }

    // public function driverRequest()
    // {
    //     return $this->belongsTo('App\Model\DriverRequest');
    // }

    public function image()
    {
        return $this->belongsTo('App\Model\ImageFile');
    }
}
