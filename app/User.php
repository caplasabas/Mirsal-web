<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'address_id',
    ]; 

    protected $hidden = [
        'password'
    ];

    public function devices()
    {
        return $this->hasMany('App\Model\Device');
    }

    public function interests()
    {
        return $this->belongsToMany('App\Model\Interest', 'user_interests', 'user_id', 'interest_id');
    }



}
