<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\DateArFomatter;

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
        'taken',
    ]; 

    public function getAvailableDateArAttribute()
    {
        $date = $this->available_date;
        return DateArFomatter::dateARFormat($date);
    }

}
