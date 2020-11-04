<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Rating;

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
        'latitude',
        'longitude',
        'formatted_address',
        'national_id_url',
        
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



    public function getPhoneFormattedAttribute(){
        $trimmed_phone = substr($this->phone, 1); 
        $new_phone_format = "+966".$trimmed_phone;
        return $new_phone_format;
    }
    
    public function vetTimeSlots()
    {
        return $this->hasMany('App\Model\VetTimeSlot','vet_id');
    }

    public function getSummaryRatingAttribute()
    {
        $summaryRating = 0;

        $ratings = Rating::where("rated_user_id", $this->id);
        if(!$ratings->get()->isEmpty()){
            $arr_val = $ratings->pluck('star_rating')->all();
            $count = sizeof($arr_val);
            $sum = array_sum($arr_val);
            $summaryRating = $sum / $count;
        }

        return $summaryRating;
    }

    public function getVetStatusArAttribute()
    {
        return $this->vetStatusTranslate($this->vet_status);
    }

    // REJECTED مرفوضة
    public function vetStatusTranslate($vet_status)
    {   
        $value = "";
        switch ($vet_status) {
            case 'REJECTED':
                $value = "مرفوضة";
                break;
            case 'PENDING':
                $value = "قيد الانتظار";
                break;
            case 'ACCEPTED':
                $value = "تم قبولها";
                break;
        }

        return $value;
    }



}
