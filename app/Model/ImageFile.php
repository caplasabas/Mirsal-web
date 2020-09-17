<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageFile extends Model
{
    public function getPathAttribute()
    {
        return asset("storage/animal_images/".$this->image_name);
    }
}
