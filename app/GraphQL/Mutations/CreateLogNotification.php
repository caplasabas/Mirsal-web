<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use App\Model\LogNotification;

class CreateLogNotification
{

    
    public function createLogNotification($root, array $args)
    {
        $logNotification = new LogNotification();
        $logNotification->role = $args['role'];
        $logNotification->name = $args['name'];
        $logNotification->type = $args['type'];
        $logNotification->phone = $args['phone'];
        $logNotification->save();

        return $logNotification;

    }


}
