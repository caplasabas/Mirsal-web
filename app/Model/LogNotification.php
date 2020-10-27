<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogNotification extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'user_id_to_notify',
        'type',
        'message',
        'read',
    ];
}
