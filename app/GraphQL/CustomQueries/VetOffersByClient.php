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

class VetOffersByClient
{
    public function byClient($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $vetOfferQuery = VetOffer::query();
        $vetRequestQuery = VetRequest::query();
        // echo json_encode($args); exit;
        if(isset($args['client_id'])){
            $vetRequestQuery = $vetRequestQuery->where("client_id",$args['client_id']);
        }

        if(isset($args['created_with_vet'])){
            $vetRequestQuery = $vetRequestQuery->where("created_with_vet",$args['created_with_vet']);  
        }

        if(isset($args['created_with_vet']) || isset($args['client_id'])){
            $vetRequestIds = $vetRequestQuery->pluck("id");
            $vetOfferQuery = $vetOfferQuery->whereIn('vet_request_id', $vetRequestIds);
        }
        if(isset($args['status'])){
            $vetOfferQuery = $vetOfferQuery->where("status",$args['status']);
        }
        return $vetOfferQuery;
    }

    public function excludeWithVet($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {

        $vetOfferQuery = VetOffer::query();
        $vetRequestQuery = VetRequest::query();
        if(isset($args['vet_request_id'])){
            $vetRequestQuery = $vetRequestQuery->where("id",$args['vet_request_id']);
        }
        if(isset($args['created_with_vet'])){
            $vetRequestQuery = $vetRequestQuery->where("created_with_vet",$args['created_with_vet']);
        }
        if(isset($args['created_with_vet']) || isset($args['vet_request_id'])){
            $vetRequestIds = $vetRequestQuery->pluck("id");
            $vetOfferQuery = $vetOfferQuery->whereIn("vet_request_id",$vetRequestIds);
        }
        if(isset($args['vet_id'])){
            $vetOfferQuery = $vetOfferQuery->where("vet_id",$args['vet_id']);
        }
        if(isset($args['status'])){
            $vetOfferQuery = $vetOfferQuery->where("status",$args['status']);
        }

        return $vetOfferQuery;
    }
}