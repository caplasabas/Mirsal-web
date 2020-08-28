<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'vet_offer_id',
        'reference_id',
        'amount_paid',
        'payment_gateway',
        'payment_status',
    ]; 

    public function client()
    {
        return $this->belongsTo('App\User','client_id');
    }

    public function vetOffer()
    {
        return $this->belongsTo('App\Model\VetOffer','vet_offer_id');
    }
}
