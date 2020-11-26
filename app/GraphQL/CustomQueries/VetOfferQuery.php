<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Invoice;
use App\Model\VetOffer;
use App\Model\VetRequest;

class VetOfferQuery
{
    public function __invoke($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $vetOfferQuery = VetOffer::query();
        $vetRequestQuery = VetRequest::query();
        // echo json_encode($args); exit;
        if(isset($args['client_id'])){
            $vetRequestQuery = $vetRequestQuery->where("client_id", $args['client_id']);
        }

        if(isset($args['exclude_client_id'])){
            $vetRequestQuery = $vetRequestQuery->where("client_id", "!=", $args['exclude_client_id']);  
        }

        if(isset($args['type'])){
            $vetRequestQuery = $vetRequestQuery->where("type",$args['type']);
        }

        if(isset($args['created_with_vet'])){
            $vetRequestQuery = $vetRequestQuery->where("created_with_vet", $args['created_with_vet']);  
        }

        if(isset($args['vet_id'])){
            $vetOfferQuery = $vetOfferQuery->where("vet_id",$args['vet_id']);
        }

        if(isset($args['exclude_vet_id'])){
            $vetOfferQuery = $vetOfferQuery->where("vet_id", "!=", $args['exclude_vet_id']);  
        }

        if(isset($args['type']) || isset($args['client_id']) || isset($args['exclude_client_id']) || isset($args['created_with_vet'])){
            $vetRequestIds = $vetRequestQuery->pluck("id");
            $vetOfferQuery = $vetOfferQuery->whereIn('vet_request_id', $vetRequestIds);
        }
        if(isset($args['status'])){
            $vetOfferQuery = $vetOfferQuery->where("status",$args['status']);
        }
        
        return $vetOfferQuery;
    }

}