<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\DriverOffer;
use App\Model\DriverRequest;

class DriverRequestCustom
{
    public function excludes($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $driver_id = $args['driver_id'];
        $driverRequestIds = DriverOffer::where("driver_id", $driver_id)->pluck('driver_request_id');
        
        $driverRequest = DriverRequest::whereNotIn('id',$driverRequestIds);

        return $driverRequest;
    }
}