<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Events\MessageCreated;

use App\Model\LogNotification;

class CreateLogNotification
{

    
    public function createLogNotification($root, array $args)
    {   
        $input = $args['input'];

        $logNotification = new LogNotification();
        $logNotification->user_id_to_notify = $input['user_id_to_notify'];
        $logNotification->user_id = $input['user_id'];
        $logNotification->message = $input['message'];
        $logNotification->type = $input['type'];
        $logNotification->save();

        event(new MessageCreated($logNotification));

        return $logNotification;

    }


}
