<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VetOffer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'vet_id',
        'vet_request_id',
        'price',
        'status',
        'payment_status',
    ]; 

    public function veterinarian()
    {
        return $this->belongsTo('App\User','vet_id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Model\Invoice');
    }
    
    public function vetRequest()
    {
        return $this->belongsTo('App\Model\VetRequest','vet_request_id');
    }

    public function vetRequestAccepted()
    {
        return $this->hasOne('App\Model\VetRequest','accepted_vet_offer_id');
    }

    public function rating()
    {
        return $this->belongsTo('App\Model\Rating','rating_id');
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2);
    }
}
