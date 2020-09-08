<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Model\ImageFile;
use App\Model\AdminSetting;

class ImageUpload
{

    
    public function imageUpload($root, array $args)
    {
        if(isset($args['image']))
        {
            $file = $args['image'];
            if($file)
            {
                $fileName = '_animal_images'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('animal_images',$fileName);
                $image = new ImageFile;
                $image->image_name = $fileName;
                $image->save();

                return array(
                    "status" => 1,
                    "message" => "Success",
                    "imageFile" => $image
                );
            }
        }

        return array(
            "status" => 0,
            "message" => "No image upload!",
            "imageFile" => null
        );


    }


}
