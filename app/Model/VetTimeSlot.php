<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VetTimeSlot extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'vet_id',
        'type',
        'available_date',
        'to',
        'from',
        'duration',
        'price',
    ]; 

}
