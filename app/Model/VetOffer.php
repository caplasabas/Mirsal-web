<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VetOffer extends Model
{
    protected $fillable = [
        'vet_id',
        'vet_request_id',
        'price',
    ]; 
}
