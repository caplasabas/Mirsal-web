<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientOffer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'buyer_id',
        'product_id',
        'offered_price',
        'status',
        'payment_status',
        'note',
    ]; 

    public function buyer()
    {
        return $this->belongsTo('App\User','buyer_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }

    public function getOfferedPriceAttribute($value)
    {
        return number_format($value, 2);
    }


}
