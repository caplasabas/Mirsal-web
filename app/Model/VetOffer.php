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
    ]; 

    public function veterenarian()
    {
        return $this->belongsTo('App\User','vet_id');
    }
    
    public function vetRequest()
    {
        return $this->belongsTo('App\Model\VetRequest');
    }
}
