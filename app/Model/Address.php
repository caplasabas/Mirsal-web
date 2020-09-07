<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'house_number',
        'street',
        'city',
        'postal_code',
        'loc_lat',
        'loc_long',
        'vet_offer_id',
    ];


    public function getCompleteAddressAttribute()
    {
        return $this->house_number.", ".$this->street.", ".$this->city.", ".$this->postal_code;
    }

}
