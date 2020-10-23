<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Invoice;
use App\Model\DriverOffer;
use App\Model\DriverRequest;

class DriverOffersByClient
{
    public function byClient($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $client_id = $args['client_id'];
        $status = $args['status'];
        $vetRequestIds = DriverRequest::where("client_id", $client_id)->pluck('id');
        $driverOffers = DriverOffer::where("status", $status);
        return $driverOffers;
    }
}