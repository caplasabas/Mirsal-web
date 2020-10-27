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

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function userToNotify()
    {
        return $this->belongsTo('App\User','user_id_to_notify','id');
    }
}
