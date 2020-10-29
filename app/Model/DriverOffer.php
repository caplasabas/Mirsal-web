<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverOffer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'driver_id',
        'driver_request_id',
        'price',
        'status',
        'payment_status',
        'first_payment_price',
        'tax_price',
        'total',
        'rating_id',

    ]; 

    protected $dispatchesEvents = [
        'saving' => DriverOfferSaving::class, 
        'created' => DriverOfferCreated::class, 
    ];

    public function driver()
    {
        return $this->belongsTo('App\User','driver_id','id')->withTrashed();;
    }
    
    public function driverRequest()
    {
        return $this->belongsTo('App\Model\DriverRequest');
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
