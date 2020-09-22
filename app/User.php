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
        'avatar',
        'vet_status',
        'car_plate_number',
    ]; 

    protected $hidden = [
        'password'
    ];

    public function devices()
    {
        return $this->hasMany('App\Model\Device');
    }

    public function userFile()
    {
        return $this->hasOne('App\Model\UserFile');
    }

    public function interests()
    {
        return $this->belongsToMany('App\Model\Interest', 'user_interests', 'user_id', 'interest_id');
    }

    public function getAvatarAttribute($value)
    {
        return asset("storage/user_avatars/".$value);
    }

    public function getPhoneFormattedAttribute(){
        $trimmed_phone = substr($this->phone, 1); 
        $new_phone_format = "+966".$trimmed_phone;
        return $new_phone_format;
    }


}
